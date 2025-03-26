<?php

// Genereer 32-byte AES key (256-bit) en 16-byte IV
$key = openssl_random_pseudo_bytes(32); // AES-256 key
$iv = openssl_random_pseudo_bytes(16);  // AES IV (128-bit voor AES-256-CBC)

// Opslaan in config/crypto/
$cryptoPath = __DIR__ . DIRECTORY_SEPARATOR . 'crypto';

if (!is_dir($cryptoPath)) {
    mkdir($cryptoPath, 0777, true);
}

file_put_contents($cryptoPath . DIRECTORY_SEPARATOR . 'key.txt', base64_encode($key));
file_put_contents($cryptoPath . DIRECTORY_SEPARATOR . 'iv.txt', base64_encode($iv));

echo "AES-256 key en IV gegenereerd!\n";
echo "Key length (bytes): " . strlen($key) . "\n";
echo "IV length (bytes): " . strlen($iv) . "\n";
