<?php


/***************************************************************************
 *
 * Copyright (c) 2021 doushen.com, Inc. All Rights Reserved
 *
 **************************************************************************/

require_once './Rsa.php';

$rsa = new Rsa();
$data = ['name' => 'xiaoshan', 'age' => 30];

$privEncrypt = $rsa->privEncrypt(json_encode($data));
echo '私钥加密后: ' . $privEncrypt . PHP_EOL;

$publicDecrypt = $rsa->publicDecrypt($privEncrypt);
echo '公钥解密后: ' . $publicDecrypt . PHP_EOL;

$publicEncrypt = $rsa->publicEncrypt(json_encode($data));
echo '公钥加密后: ' . $publicEncrypt . PHP_EOL;

$privDecrypt = $rsa->privDecrypt($publicEncrypt);
echo '私钥解密后: ' . $privDecrypt . PHP_EOL;