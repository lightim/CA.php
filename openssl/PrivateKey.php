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
use Lightim\Utils\OpenSSL\Configure\KeyType;

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
     * Get details of the key
     *
     * @return array
     */
    public function getDetails(): array
    {
        return openssl_pkey_get_details($this->resource);
    }

    /**
     * Get Key Bits
     *
     * @return int
     */
    public function getKeyBits(): int
    {
        return $this->getDetails()['bits'];
    }

    /**
     * Get Key Type
     *
     * Returns one of:
     * KeyType::EC
     * KeyType::RSA
     * KeyType::DSA
     * KeyType::DH
     * 
     * @return int
     */
    public function getKeyType(): int
    {
        switch (array_keys($this->getDetails())[2]) {
            case 'ecc':
                return KeyType::EC;
            case 'rsa':
                return KeyType::RSA;
            case 'dsa':
                return KeyType::DSA;
            case 'dh':
                return KeyType::DH;
        }
        return -1;
    }

    /**
     * Check if the key is ECC Key
     *
     * @return bool
     */
    public function isECCKey(): bool
    {
        return $this->getKeyType() === KeyType::EC;
    }

    /**
     * Check if the key is RSA Key
     *
     * @return bool
     */
    public function isRSAKey(): bool
    {
        return $this->getKeyType() === KeyType::RSA;
    }

    /**
     * Check if the key is DSA Key
     *
     * @return bool
     */
    public function isDSAKey(): bool
    {
        return $this->getKeyType() === KeyType::DSA;
    }

    /**
     * Check if the key is DH Key
     *
     * @return bool
     */
    public function isDHKey(): bool
    {
        return $this->getKeyType() === KeyType::DH;
    }

    /**
     * Get Curve Name
     *
     * @throws OpenSSLException
     * @return string
     */
    public function getCurveName(): string
    {
        if (!$this->isECCKey()) {
            throw new OpenSSLException('This is not an ECC Key');
        }
        return $this->getDetails()['ec']['curve_name'];
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
