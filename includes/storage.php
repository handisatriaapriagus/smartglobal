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
