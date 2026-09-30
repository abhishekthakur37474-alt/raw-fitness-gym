<?php
/**
 * Franchise enquiry handler.
 *
 * Validates the submission (required fields, email, phone, CSRF, honeypot and
 * a minimum completion time), stores it and redirects back to the form with a
 * professional success/error state. No JavaScript alerts are used.
 */

require_once __DIR__ . '/includes/config.php';

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    header('Location: contact.php');
    exit;
}

$input = [
    'full_name'           => trim((string) ($_POST['full_name'] ?? '')),
    'phone'               => trim((string) ($_POST['phone'] ?? '')),
    'email'               => trim((string) ($_POST['email'] ?? '')),
    'city'                => trim((string) ($_POST['city'] ?? '')),
    'state'               => trim((string) ($_POST['state'] ?? '')),
    'property_size'       => trim((string) ($_POST['property_size'] ?? '')),
    'property_available'  => trim((string) ($_POST['property_available'] ?? '')),
    'investment_range'    => trim((string) ($_POST['investment_range'] ?? '')),
    'preferred_format'    => trim((string) ($_POST['preferred_format'] ?? '')),
    'message'             => trim((string) ($_POST['message'] ?? '')),
];

$honeypot = trim((string) ($_POST['website'] ?? ''));
$startedAt = (int) ($_POST['started_at'] ?? 0);
$csrf = (string) ($_POST['csrf_token'] ?? '');

$errors = [];

/* --- Spam protection ------------------------------------------------------ */
$tooFast = $startedAt > 0 && (time() - $startedAt) < 3;

if ($honeypot !== '' || $tooFast) {
    // Silently accept bots: show the success state without storing anything.
    $_SESSION['flash']['success'] = true;
    header('Location: contact.php');
    exit;
}

if (!hash_equals($_SESSION['csrf_token'] ?? '', $csrf)) {
    $errors['form'] = 'Your session expired. Please submit the form again.';
}

/* --- Required fields ------------------------------------------------------ */
$required = [
    'full_name'          => 'Please enter your full name.',
    'phone'              => 'Please enter your phone number.',
    'email'              => 'Please enter your email address.',
    'city'               => 'Please enter your city.',
    'state'              => 'Please enter your state.',
    'property_available' => 'Please select whether a property is available.',
    'investment_range'   => 'Please select an investment range.',
    'preferred_format'   => 'Please select a preferred format.',
];

foreach ($required as $field => $message) {
    if ($input[$field] === '') {
        $errors[$field] = $message;
    }
}

/* --- Field-level validation ---------------------------------------------- */
if ($input['full_name'] !== '' && str_length($input['full_name']) < 2) {
    $errors['full_name'] = 'Please enter a valid full name.';
}

if ($input['email'] !== '' && !filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address.';
}

if ($input['phone'] !== '' && !preg_match('/^[0-9+\-\s()]{7,18}$/', $input['phone'])) {
    $errors['phone'] = 'Please enter a valid phone number.';
}

if ($input['property_available'] !== '' && !in_array($input['property_available'], ['Yes', 'No'], true)) {
    $errors['property_available'] = 'Please select a valid option.';
}

if ($input['preferred_format'] !== '' && !in_array($input['preferred_format'], ['Prime', 'Luxury', 'Not Sure'], true)) {
    $errors['preferred_format'] = 'Please select a valid format.';
}

if (str_length($input['message']) > 1500) {
    $errors['message'] = 'Message is too long.';
}

/* --- On error: redirect back with old input ------------------------------- */
if (!empty($errors)) {
    $_SESSION['flash']['errors'] = $errors;
    $_SESSION['flash']['old'] = $input;
    header('Location: contact.php');
    exit;
}

/* --- Persist the enquiry --------------------------------------------------
 * Stored as JSON lines so the data survives without database or mail setup.
 * Wire this to email, CRM or a database before launch.
 * ------------------------------------------------------------------------- */
$storageDir = __DIR__ . '/storage';
if (!is_dir($storageDir)) {
    mkdir($storageDir, 0755, true);
}

$record = $input + [
    'ip'         => $_SERVER['REMOTE_ADDR'] ?? '',
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
    'received_at' => date('c'),
];

$file = $storageDir . '/enquiries-' . date('Y-m-d') . '.log';
@file_put_contents($file, json_encode($record, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND | LOCK_EX);

unset($_SESSION['csrf_token']);
$_SESSION['flash']['success'] = true;

header('Location: contact.php');
exit;
