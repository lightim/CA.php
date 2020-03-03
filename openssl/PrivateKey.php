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

namespace Lightim\Utils\OpenSSL;

use Lightim\Utils\OpenSSL\Configure\ConfigureArguments;

class PrivateKey
{
    /**
     * Private Key Resource
     *
     * @var resource|null
     */
    protected $resource = null;

    /**
     * Contructor
     *
     * @param resource $res
     */
    public function __construct($res)
    {
        if (!is_resource($res)) {
            throw new OpenSSLException("It is not a resource.");
        }
        $this->resource = $res;
    }

    /**
     * Get Resource
     *
     * @return resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Set Resource
     *
     * @param resource $res
     * @return self
     */
    public function setResource($res): self
    {
        if (!is_resource($res)) {
            throw new OpenSSLException("It is not a resource.");
        }
        $this->resource = $res;
        return $this;
    }

    /**
     * Export to string
     *
     * @param string $passphrase
     * @param array|ConfigureArguments $configargs
     * @return string
     */
    public function export(
        string $passphrase = null,
        $configargs = null
    ): string {
        if ($configargs instanceof ConfigureArguments) {
            $configargs = $configargs->toArray();
        }
        $rslt = '';
        openssl_pkey_export(
            $this->resource,
            $rslt,
            $passphrase,
            $configargs
        );
        return $rslt;
    }

    /**
     * Export to file
     *
     * @param string $file
     * @param string $passphrase
     * @param array|ConfigureArguments $configargs
     * @return self
     */
    public function exportToFile(
        string $file,
        string $passphrase = null,
        $configargs = null
    ): self {
        if ($configargs instanceof ConfigureArguments) {
            $configargs = $configargs->toArray();
        }
        openssl_pkey_export_to_file(
            $this->resource,
            $file,
            $passphrase,
            $configargs
        );
        return $this;
    }

    /**
     * Construct from pkey string
     *
     * @param string $key
     * @param string $passphrase
     * 
     * @static
     * 
     * @return self
     */
    public static function fromString(string $key, string $passphrase = ""): self
    {
        return new self(
            openssl_pkey_get_private($key, $passphrase)
        );
    }

    /**
     * Construct from pkey file
     *
     * @param string $file
     * @param string $passphrase
     * 
     * @static
     * 
     * @return self
     */
    public static function fromFile(string $file, string $passphrase = ""): self
    {
        return new self(
            openssl_pkey_get_private(
                file_get_contents($file),
                $passphrase
            )
        );
    }

    /**
     * Create a new key
     *
     * @param ConfigureArguments $confargs
     * 
     * @static
     * 
     * @return self
     */
    public static function newKey(ConfigureArguments $confargs): self
    {
        return new self(
            openssl_pkey_new($confargs->toArray())
        );
    }

    /**
     * Create new ECC Key
     *
     * @param string $curveName
     * 
     * @static
     * 
     * @return self
     */
    public static function newECCKey(
        string $curveName = ConfigureArguments::DEFAULT_CURVE_NAME
    ): self {
        return new self(
            openssl_pkey_new(
                ConfigureArguments::newECCPrivateKey($curveName)
                    ->toArray()
            )
        );
    }

    /**
     * Create new RSA Key
     *
     * @param int $keyBits
     * 
     * @static
     * 
     * @return self
     */
    public static function newRSAKey(
        int $keyBits = ConfigureArguments::DEFAULT_RSA_KEY_BITS
    ): self {
        return new self(
            openssl_pkey_new(
                ConfigureArguments::newRSAPrivateKey($keyBits)
                    ->toArray()
            )
        );
    }

    /**
     * Create new DSA Key
     *
     * @param int $keyBits
     * 
     * @static
     * 
     * @return self
     */
    public static function newDSAKey(
        int $keyBits = ConfigureArguments::DEFAULT_DSA_KEY_BITS
    ): self {
        return new self(
            openssl_pkey_new(
                ConfigureArguments::newDSAPrivateKey($keyBits)
                    ->toArray()
            )
        );
    }
}
