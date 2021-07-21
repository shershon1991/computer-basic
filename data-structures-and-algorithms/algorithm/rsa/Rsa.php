<?php


/***************************************************************************
 *
 * Copyright (c) 2021 doushen.com, Inc. All Rights Reserved
 *
 **************************************************************************/


class Rsa
{
    /**
     * Brief: 获取私钥
     * Author: work(tanxiaoshan@doushen.com)
     * DateTime: 2021/6/27 2:35 下午
     * @return false|resource
     */
    private static function getPrivateKey()
    {
        $abs_path = dirname(__FILE__) . '/rsa_private_key.pem';
        $content = file_get_contents($abs_path);
        return openssl_pkey_get_private($content);
    }

    /**
     * Brief: 获取公钥
     * Author: work(tanxiaoshan@doushen.com)
     * DateTime: 2021/6/27 2:36 下午
     * @return false|resource
     */
    private static function getPublicKey()
    {
        $abs_path = dirname(__FILE__) . '/rsa_public_key.pem';
        $content = file_get_contents($abs_path);
        return openssl_pkey_get_public($content);
    }

    /**
     * Brief: 私钥加密
     * Author: work(tanxiaoshan@doushen.com)
     * DateTime: 2021/6/27 2:39 下午
     * @param string $data
     * @return string|null
     */
    public static function privEncrypt($data = '')
    {
        if (!is_string($data)) {
            return null;
        }

        return openssl_private_encrypt($data, $encrypted, self::getPrivateKey()) ? base64_encode($encrypted) : null;
    }

    /**
     * Brief: 公钥加密
     * Author: work(tanxiaoshan@doushen.com)
     * DateTime: 2021/6/27 2:41 下午
     * @param string $data
     * @return string|null
     */
    public static function publicEncrypt($data = '')
    {
        if(!is_string($data)) {
            return null;
        }

        return openssl_public_encrypt($data, $encrypted, self::getPublicKey()) ? base64_encode($encrypted) : null;
    }

    /**
     * Brief: 私钥解密
     * Author: work(tanxiaoshan@doushen.com)
     * DateTime: 2021/6/27 2:43 下午
     * @param $encrypted
     * @return null
     */
    public static function privDecrypt($encrypted)
    {
        if(!is_string($encrypted)) {
            return null;
        }

        return openssl_private_decrypt(base64_decode($encrypted), $decrypted, self::getPrivateKey()) ? $decrypted : null;
    }

    /**
     * Brief: 公钥解密
     * Author: work(tanxiaoshan@doushen.com)
     * DateTime: 2021/6/27 2:45 下午
     * @param $encrypted
     * @return null
     */
    public static function publicDecrypt($encrypted)
    {
        if(!is_string($encrypted)) {
            return null;
        }

        return openssl_public_decrypt(base64_decode($encrypted), $decrypted, self::getPublicKey()) ? $decrypted : null;
    }
}