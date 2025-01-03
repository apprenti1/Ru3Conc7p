<?php
require $basepath.'vendor/autoload.php';

use Dotenv\Dotenv;

class Bdd {
    private static $dotenv = null;
    private static $pdoInstance = null;

    public static function loadEnv() {
        if (self::$dotenv === null) {
            self::$dotenv = Dotenv::createImmutable(dirname(__DIR__));
        }
        self::$dotenv->load();
    }

    public static function setEnvValue($key, $value)
    {
        if (!file_exists(dirname(__DIR__).'\.env')) {
            throw new Exception("Le fichier .env n'existe pas.");
        }

        $envContents = file(dirname(__DIR__).'\.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $keyFound = false;

        foreach ($envContents as &$line) {
            if (strpos(trim($line), "$key=") === 0) {
                $line = "$key=\"$value\"";
                $keyFound = true;
                break;
            }
        }

        if ($keyFound) {
            file_put_contents(dirname(__DIR__).'\.env', implode(PHP_EOL, $envContents) . PHP_EOL);
        }

    }

    private static function parseDatabaseUrl($url) {
        $parsedUrl = parse_url($url);

        return [
            'driver' => $parsedUrl['scheme'],
            'host' => $parsedUrl['host'],
            'port' => isset($parsedUrl['port']) ? $parsedUrl['port'] : null,
            'username' => $parsedUrl['user'],
            'password' => isset($parsedUrl['pass']) ? $parsedUrl['pass'] : '',
            'dbname' => ltrim($parsedUrl['path'], '/'),
            'query' => isset($parsedUrl['query']) ? $parsedUrl['query'] : ''
        ];
    }

    public static function getBdd() {
        if (self::$pdoInstance === null) {
            $dbConfig = self::parseDatabaseUrl($_ENV['DATABASE_URL']);

            $dsn = "{$dbConfig['driver']}:host={$dbConfig['host']};dbname={$dbConfig['dbname']}";
            if (!empty($dbConfig['port'])) {
                $dsn .= ";port={$dbConfig['port']}";
            }
            if (!empty($dbConfig['query'])) {
                $dsn .= ";{$dbConfig['query']}";
            }

            try {
                self::$pdoInstance = new PDO($dsn, $dbConfig['username'], $dbConfig['password']);
                self::$pdoInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }

        return self::$pdoInstance;
    }

    public static function encrypt($value) {
        $ivLength = openssl_cipher_iv_length($_ENV['ENCRYPTION_ALGO']);
        $iv = openssl_random_pseudo_bytes($ivLength);
        $encryptedValue = openssl_encrypt($value, $_ENV['ENCRYPTION_ALGO'], $_ENV['ENCRYPTION_KEY'], 0, $iv);
        
        return base64_encode($iv . $encryptedValue);
    }

    public static function decrypt($encryptedValue) {
        $data = base64_decode($encryptedValue);
        $ivLength = openssl_cipher_iv_length($_ENV['ENCRYPTION_ALGO']);
        $iv = substr($data, 0, $ivLength);
        $encryptedValue = substr($data, $ivLength);
        
        return openssl_decrypt($encryptedValue, $_ENV['ENCRYPTION_ALGO'], $_ENV['ENCRYPTION_KEY'], 0, $iv);
    }

    public static function generateKey($length = 32) {
        if (empty($_ENV['ENCRYPTION_KEY'])) {
            $_ENV['ENCRYPTION_KEY'] = bin2hex(openssl_random_pseudo_bytes($length));
            self::setEnvValue('ENCRYPTION_KEY', $_ENV['ENCRYPTION_KEY']);
        }
    }

    public static function hash($value) {
        return password_hash($value, PASSWORD_DEFAULT);
    }
    
}

?>
