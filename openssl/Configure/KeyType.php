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
 * KeyType ENUM Class
 */
final class KeyType
{
    const RSA = OPENSSL_KEYTYPE_RSA;
    const DSA = OPENSSL_KEYTYPE_DSA;
    const EC  = OPENSSL_KEYTYPE_EC;
    const DH  = OPENSSL_KEYTYPE_DH;
}
