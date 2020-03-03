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
 * Padding ENUM Class
 */
final class Padding
{
    const NO_PADDING         = OPENSSL_NO_PADDING;
    const ZERO_PADDING       = OPENSSL_ZERO_PADDING;
    const PKCS1_PADDING      = OPENSSL_PKCS1_PADDING;
    const SSLV23_PADDING     = OPENSSL_SSLV23_PADDING;
    const PKCS1_OAEP_PADDING = OPENSSL_PKCS1_OAEP_PADDING;
}
