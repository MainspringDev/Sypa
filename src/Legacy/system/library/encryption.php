<?php

namespace OpenCart\System\Library;

final class Encryption {
    /**
     * @param string $key
     * @param string $value
     * @return string
     */
    public function encrypt(string $key, string $value): string {
        return strtr(base64_encode(openssl_encrypt($value, 'aes-128-cbc', hash('sha256', $key, true))), '+/=', '-_,');
    }

    /**
     * @param string $key
     * @param string $value
     * @return string
     */
    public function decrypt(string $key, string $value): string {
        return trim(openssl_decrypt(base64_decode(strtr($value, '-_,', '+/=')), 'aes-128-cbc', hash('sha256', $key, true)));
    }
}
