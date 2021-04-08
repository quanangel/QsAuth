<?php

declare(strict_types=1);

/**
 * Author: Qs
 * Name:   the is AUTH Token class
 * Note:
 * Time:   2021/04/02 15:49
 */

namespace Qs\Auth;

class Token {
    // encryption key, if value change the token needs cheanged
    protected static string $_encryptionKey = 'Tx32133asaJYNGBUQOORAJYL';

    /**
     * Author: william
     * Name:   initialize function
     * Note:
     * Time:   2021/04/08 17:10
     * @param array $options
     */
    public static function initialize(array $options = []) {
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
     * Time:   2021/04/02 15:49
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
     * Name:   the build the token by password
     * Note:
     * Time:   2021/04/07 09:56
     * @param  string $password
     * @return string
     */
    public static function build_by_password(string $password): string {
        $length = strlen($password);
        if ($length <= 1) {
            $token = $password . self::$_encryptionKey;
        } else {
            $halfLength = (int)($length / 2);
            $token = substr($password, 0, $halfLength) . self::$_encryptionKey . substr($password, $halfLength, -1);
        }
        $token = md5($token);

        return $token;
    }

    /**
     * Author: william
     * Name:   analysis token and return token、user_id
     * Note:
     * Time:   2021/04/06 10:38
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
