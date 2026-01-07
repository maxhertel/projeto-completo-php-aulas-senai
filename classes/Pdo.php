<?php
use PDO;
use PDOException;
use RuntimeException;

/**
 * Simple PDO singleton for MySQL.
 *
 * Usage:
 *   $pdo = PdoSingleton::getInstance(); // reads env DB_* or uses defaults
 *   // or
 *   $pdo = PdoSingleton::getInstance([
 *       'host' => '127.0.0.1',
 *       'port' => '3306',
 *       'dbname' => 'mydb',
 *       'user' => 'root',
 *       'pass' => 'secret',
 *       'charset' => 'utf8mb4',
 *   ]);
 */
final class PdoSingleton
{
    private static ?PDO $instance = null;

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    /**
     * Return the single PDO instance. First call may accept a config array.
     *
     * Config keys: host, port, dbname, user, pass, charset, options
     */
    public static function getInstance(array $config = []): PDO
    {
        if (self::$instance !== null) {
            return self::$instance;
        }

        $host = $config['host'] ?? getenv('DB_HOST') ?: '127.0.0.1';
        $port = $config['port'] ?? getenv('DB_PORT') ?: '3306';
        $dbname = $config['dbname'] ?? getenv('DB_NAME') ?: 'senai';
        $user = $config['user'] ?? getenv('DB_USER') ?: 'root';
        $pass = $config['pass'] ?? getenv('DB_PASS') ?: 'root';
        $charset = $config['charset'] ?? getenv('DB_CHARSET') ?: 'utf8mb4';

        $dsn = sprintf('mysql:host=%s;port=%s;dbname=%s;charset=%s', $host, $port, $dbname, $charset);

        $defaultOptions = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $options = $config['options'] ?? $defaultOptions;

        try {
            self::$instance = new PDO($dsn, $user, $pass, $options);
            return self::$instance;
        } catch (PDOException $e) {
            throw new RuntimeException('Database connection failed: ' . $e->getMessage(), (int)$e->getCode(), $e);
        }
    }

    /**
     * Optional: close the connection (useful for tests).
     */
    public static function disconnect(): void
    {
        self::$instance = null;
    }
}