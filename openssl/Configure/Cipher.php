<?php

/**
 * Lightim Utils: OpenSSL
 * 
 * This repository is a part of the
 * Lightim Project, led by xtlsoft.
 * By xtlsoft, all rights reserved.
 * 
 * @author   Tianle Xu <xtl@xtlsoft.top>
 * @license  MIT
 * @package  lightim
 * @category im
 * @link     https://dev.lightim.pw
 */

namespace Lightim\Utils\OpenSSL\Configure;

/**
 * Cipher ENUM Class
 */
final class Cipher
{
    const RC2_40      = OPENSSL_CIPHER_RC2_40;
    const RC2_64      = OPENSSL_CIPHER_RC2_64;
    const RC2_128     = OPENSSL_CIPHER_RC2_128;
    const DES         = OPENSSL_CIPHER_DES;

    /**
     * Original: OPENSSL_CIPHER_3DES
     */
    const THREE_DES   = OPENSSL_CIPHER_3DES;

    const AES_128_CBC = OPENSSL_CIPHER_AES_128_CBC;
    const AES_192_CBC = OPENSSL_CIPHER_AES_192_CBC;
    const AES_256_CBC = OPENSSL_CIPHER_AES_256_CBC;
}
