<?php

declare(strict_types=1);

/**
 * Author: Qs
 * Name:   the is AUTH Token class
 * Note:
 * TIme:   2021/04/02 15:49
 */

namespace Qs\Auth;

class Token {
    // encryption key, if value change the token needs cheanged
    protected static string $_encryptionKey = 'Tx32133asaJYNGBUQOORAJYL';

    public function __construct(array $options = []) {
        if (!empty($options)) {
            if (isset($options['encryption_key'])) {
                self::$_encryptionKey = $options['encryption_key'];
            }
        }
    }

    /**
     * Author: william
     * Name:   the build the token
     * Note:
     * TIme:   2021/04/02 15:49
     * @param  string $userId
     * @return string
     */
    public static function build(?string $userId): string {
        $token = self::$_encryptionKey . (string)microtime(true) . rand(0, 99999);
        if (null == $userId) {
            $token = md5($token);
        } else {
            $token = base64_encode(md5($token) . '_' . $userId);
        }

        return $token;
    }

    /**
     * Author: william
     * Name:   analysis token and return token、user_id
     * Note:
     * TIme:   2021/04/06 10:38
     * @param  string     $token
     * @return null|array
     */
    public static function analysis(string $token): ?array {
        $base64 = base64_decode($token);
        $tmp = explode('_', $base64);
        if (count($tmp) != 2) {
            return null;
        }

        return [
            'token' => $tmp[0],
            'user_id' => $tmp[1],
        ];
    }
}
