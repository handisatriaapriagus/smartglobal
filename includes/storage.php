<?php

declare(strict_types=1);

function database_connection(): ?PDO
{
    static $connection = false;

    if ($connection instanceof PDO) {
        return $connection;
    }
    if ($connection === null) {
        return null;
    }

    $host = getenv('SMART_GLOBAL_DB_HOST') ?: '127.0.0.1';
    $port = getenv('SMART_GLOBAL_DB_PORT') ?: '3306';
    $name = getenv('SMART_GLOBAL_DB_NAME') ?: 'smart_global';
    $user = getenv('SMART_GLOBAL_DB_USER') ?: 'root';
    $password = getenv('SMART_GLOBAL_DB_PASSWORD') ?: '';

    try {
        $connection = new PDO(
            "mysql:host={$host};port={$port};dbname={$name};charset=utf8mb4",
            $user,
            $password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );

        return $connection;
    } catch (Throwable) {
        $connection = null;

        return null;
    }
}
function persist_record(string $type, array $record): void
{
    $connection = database_connection();

    if ($connection !== null) {
        try {
            if ($type === 'newsletter') {
                $statement = $connection->prepare('INSERT INTO newsletter_subscribers (email, created_at) VALUES (:email, :created_at) ON DUPLICATE KEY UPDATE updated_at = CURRENT_TIMESTAMP');
                $statement->execute(['email' => $record['email'], 'created_at' => $record['created_at']]);

                return;
            }

            $statement = $connection->prepare('INSERT INTO assessment_requests (name, email, phone, company, country, services, budget, message, created_at) VALUES (:name, :email, :phone, :company, :country, :services, :budget, :message, :created_at)');
            $statement->execute([
                'name' => $record['name'],
                'email' => $record['email'],
                'phone' => $record['phone'],
                'company' => $record['company'],
                'country' => $record['country'],
                'services' => json_encode($record['services'], JSON_UNESCAPED_SLASHES),
                'budget' => $record['budget'],
                'message' => $record['message'],
                'created_at' => $record['created_at'],
            ]);

            return;
        } catch (Throwable) {
            // Keep the public form available if MySQL is not initialized yet.
        }
    }

    $storageDirectory = dirname(__DIR__) . '/storage';
    if (!is_dir($storageDirectory)) {
        mkdir($storageDirectory, 0775, true);
    }
    $file = $storageDirectory . '/' . ($type === 'newsletter' ? 'newsletter.jsonl' : 'assessment_requests.jsonl');
    file_put_contents($file, json_encode($record, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . PHP_EOL, FILE_APPEND | LOCK_EX);
}

function submission_notification_recipients(): array
{
    return [
        'info@smartglobalplatform.com',
        'info.drmoshehatta@gmail.com',
    ];
}

function send_submission_notification(string $type, array $record): bool
{
    $isNewsletter = $type === 'newsletter';
    $subject = $isNewsletter
        ? 'Smart Global Website: New Newsletter Subscription'
        : 'Smart Global Website: New Assessment Request';

    $lines = [
        'A new submission was received from smartglobalplatform.com.',
        '',
        'Submission: ' . ($isNewsletter ? 'Newsletter / E-Insights subscription' : 'Free assessment request'),
        'Submitted at: ' . (string) ($record['created_at'] ?? date(DATE_ATOM)),
    ];

    $fields = $isNewsletter
        ? ['Email' => 'email']
        : [
            'Name' => 'name',
            'Email' => 'email',
            'Phone / WhatsApp' => 'phone',
            'Company / Organization' => 'company',
            'Country' => 'country',
            'Services' => 'services',
            'Estimated budget' => 'budget',
            'Message' => 'message',
        ];

    foreach ($fields as $label => $key) {
        $value = $record[$key] ?? '';
        if (is_array($value)) {
            $value = implode(', ', $value);
        }

        $lines[] = $label . ': ' . ($value === '' ? '-' : (string) $value);
    }

    $headers = [
        'MIME-Version: 1.0',
        'Content-Type: text/plain; charset=UTF-8',
        'From: Smart Global Website <website@smartglobalplatform.com>',
    ];

    $replyTo = filter_var((string) ($record['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    if ($replyTo !== false) {
        $headers[] = 'Reply-To: ' . $replyTo;
    }

    $allSent = true;
    foreach (submission_notification_recipients() as $recipient) {
        if (!@mail($recipient, $subject, implode(PHP_EOL, $lines), implode(PHP_EOL, $headers))) {
            $allSent = false;
        }
    }

    if (!$allSent) {
        $storageDirectory = dirname(__DIR__) . '/storage';
        if (!is_dir($storageDirectory)) {
            @mkdir($storageDirectory, 0775, true);
        }

        @file_put_contents(
            $storageDirectory . '/mail_failures.log',
            date(DATE_ATOM) . ' | ' . $type . ' | PHP mail() returned false' . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );
    }

    return $allSent;
}

function assessment_auto_reply_html(): string
{
    return <<<'HTML'
<!doctype html>
<html lang="en">
<body style="margin:0;padding:0;background:#f4f7f9;color:#16293d;font-family:Arial,Helvetica,sans-serif;line-height:1.6;">
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f4f7f9;padding:28px 12px;">
<tr><td align="center">
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:680px;background:#ffffff;border:1px solid #dfe6ec;border-radius:14px;overflow:hidden;">
<tr><td style="height:8px;background:#dba63a;"></td></tr>
<tr><td style="padding:38px 42px;">
<p style="margin:0 0 10px;color:#b37b1f;font-size:12px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;">Free Assessment Request</p>
<h1 style="margin:0 0 24px;color:#031c35;font-size:30px;line-height:1.2;">Thank You for Your Request</h1>
<p>Thank you for submitting your <strong>Free Assessment Request</strong> to <strong>Smart Global Group</strong>.</p>
<p>We have successfully received your information, and our team will carefully review your requirements and the details you provided.</p>
<p><strong>Our Business Development Director will contact you within 48 hours</strong> to discuss your needs, answer any initial questions, and explore how Smart Global Group can support your goals with the right digital, AI, and business solutions.</p>
<h2 style="margin:28px 0 10px;color:#031c35;font-size:18px;">What Happens Next?</h2>
<ul style="margin:0 0 24px;padding-left:22px;">
<li>Our team reviews your assessment request.</li>
<li>We identify the key requirements and opportunities.</li>
<li>Our Business Development Director contacts you within <strong>48 hours</strong>.</li>
<li>We discuss the most suitable next steps for your project.</li>
</ul>
<p><strong>Your information is treated with strict confidentiality and used only to respond to your request.</strong></p>
<p style="margin-top:28px;">Thank you for choosing <strong>Smart Global Group</strong>.<br>We look forward to connecting with you and helping turn your ideas into practical, measurable opportunities.</p>
<p style="margin:28px 0 0;color:#031c35;"><strong>Smart Global Group</strong><br><em style="color:#647586;">Smart Solutions. Strategic Growth. Global Impact.</em></p>
</td></tr>
</table>
</td></tr>
</table>
</body>
</html>
HTML;
}

function send_assessment_auto_reply(array $record): bool
{
    $recipient = filter_var((string) ($record['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    if ($recipient === false) {
        return false;
    }

    $headers = [
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=UTF-8',
        'Content-Transfer-Encoding: 8bit',
        'From: Smart Global Group <info@smartglobalplatform.com>',
        'Reply-To: info@smartglobalplatform.com',
    ];

    $sent = @mail(
        $recipient,
        'Thank You for Your Free Assessment Request',
        assessment_auto_reply_html(),
        implode(PHP_EOL, $headers)
    );

    if (!$sent) {
        $storageDirectory = dirname(__DIR__) . '/storage';
        if (!is_dir($storageDirectory)) {
            @mkdir($storageDirectory, 0775, true);
        }

        @file_put_contents(
            $storageDirectory . '/mail_failures.log',
            date(DATE_ATOM) . ' | assessment_auto_reply | PHP mail() returned false' . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );
    }

    return $sent;
}
