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

class ConfigureArguments
{

    /**
     * Configure File Path
     * 
     * Path to your own alternative openssl.conf file
     * 
     * @param string?
     */
    public $configureFile = null;

    /**
     * Digest Algorithm
     * 
     * Digest method or signature hash,
     * usually one of openssl_get_md_methods()
     *
     * @var string?
     */
    public $digestAlgorithm = null;

    /**
     * X509 Extensions
     * 
     * Selects which extensions should be used
     * when creating an x509 certificate
     *
     * @var string?
     */
    public $x509Extensions = null;

    /**
     * CSR Extensions
     *
     * Selects which extensions should
     * be used when creating a CSR
     * 
     * @var string?
     */
    public $reqExtensions = null;

    /**
     * Private Key Bits
     *
     * @var int?
     */
    public $privateKeyBits = null;

    /**
     * Private Key Type
     *
     * Specifies the type of private key to create.
     * One of the following:
     * \Lightim\Utils\OpenSSL\Configure\KeyType::RSA
     * \Lightim\Utils\OpenSSL\Configure\KeyType::DSA
     * \Lightim\Utils\OpenSSL\Configure\KeyType::EC
     * \Lightim\Utils\OpenSSL\Configure\KeyType::DH
     * 
     * @var int?
     */
    public $privateKeyType = null;

    /**
     * Encrypt Key
     *
     * Should an exported key (with passphrase)
     * be encrypted or not
     * 
     * @var bool?
     */
    public $encryptKey = null;

    /**
     * Encrypt Key Cipher
     *
     * One of the following:
     * \Lightim\Utils\OpenSSL\Configure\Cipher::RC2_40
     * \Lightim\Utils\OpenSSL\Configure\Cipher::RC2_64
     * \Lightim\Utils\OpenSSL\Configure\Cipher::RC2_128
     * \Lightim\Utils\OpenSSL\Configure\Cipher::DES
     * \Lightim\Utils\OpenSSL\Configure\Cipher::THREE_DES
     * \Lightim\Utils\OpenSSL\Configure\Cipher::AES_128_CBC
     * \Lightim\Utils\OpenSSL\Configure\Cipher::AES_192_CBC
     * \Lightim\Utils\OpenSSL\Configure\Cipher::AES_256_CBC
     * 
     * @var bool?
     */
    public $encryptKeyCipher = null;

    /**
     * ECC Curve Name
     *
     * One of openssl_get_curve_names()
     * 
     * @var string?
     */
    public $curveName = null;

    /**
     * Get ConfigureFile
     *
     * @return string
     */
    public function getConfigureFile(): string
    {
        return (string) $this->configureFile;
    }

    /**
     * Set ConfigureFile
     *
     * @param string $val
     * @return self
     */
    public function setConfigureFile(string $val): self
    {
        $this->configureFile = $val;
        return $this;
    }

    /**
     * Get DigestAlgorithm
     *
     * @return string
     */
    public function getDigestAlgorithm(): string
    {
        return (string) $this->digestAlgorithm;
    }

    /**
     * Set DigestAlgorithm
     *
     * @param string $val
     * @return self
     */
    public function setDigestAlgorithm(string $val): self
    {
        $this->digestAlgorithm = $val;
        return $this;
    }

    /**
     * Get X509Extensions
     *
     * @return string
     */
    public function getX509Extensions(): string
    {
        return (string) $this->x509Extensions;
    }

    /**
     * Set X509Extensions
     *
     * @param string $val
     * @return self
     */
    public function setX509Extensions(string $val): self
    {
        $this->x509Extensions = $val;
        return $this;
    }

    /**
     * Get ReqExtensions
     *
     * @return string
     */
    public function getReqExtensions(): string
    {
        return (string) $this->reqExtensions;
    }

    /**
     * Set ReqExtensions
     *
     * @param string $val
     * @return self
     */
    public function setReqExtensions(string $val): self
    {
        $this->reqExtensions = $val;
        return $this;
    }

    /**
     * Get PrivateKeyBits
     *
     * @return int
     */
    public function getPrivateKeyBits(): int
    {
        return (int) $this->privateKeyBits;
    }

    /**
     * Set PrivateKeyBits
     *
     * @param int $val
     * @return self
     */
    public function setPrivateKeyBits(int $val): self
    {
        $this->privateKeyBits = $val;
        return $this;
    }

    /**
     * Get PrivateKeyType
     *
     * @return int
     */
    public function getPrivateKeyType(): int
    {
        return (int) $this->privateKeyType;
    }

    /**
     * Set PrivateKeyType
     *
     * @param int $val
     * @return self
     */
    public function setPrivateKeyType(int $val): self
    {
        $this->privateKeyType = $val;
        return $this;
    }

    /**
     * Get EncryptKey
     *
     * @return bool
     */
    public function getEncryptKey(): bool
    {
        return (bool) $this->encryptKey;
    }

    /**
     * Set EncryptKey
     *
     * @param bool $val
     * @return self
     */
    public function setEncryptKey(bool $val): self
    {
        $this->encryptKey = $val;
        return $this;
    }

    /**
     * Get EncryptKeyCipher
     *
     * @return int
     */
    public function getEncryptKeyCipher(): int
    {
        return (int) $this->encryptKeyCipher;
    }

    /**
     * Set EncryptKeyCipher
     *
     * @param int $val
     * @return self
     */
    public function setEncryptKeyCipher(int $val): self
    {
        $this->encryptKeyCipher = $val;
        return $this;
    }

    /**
     * Get CurveName
     *
     * @return string
     */
    public function getCurveName(): string
    {
        return (string) $this->curveName;
    }

    /**
     * Set CurveName
     *
     * @param string $val
     * @return self
     */
    public function setCurveName(string $val): self
    {
        $this->curveName = $val;
        return $this;
    }

    /**
     * Export to Array
     * 
     * @return string[string]
     */
    public function toArray(): array
    {
        $rslt = [
            'config' => $this->configureFile,
            'digest_alg' => $this->digestAlgorithm,
            'x509_extensions' => $this->x509Extensions,
            'req_extensions' => $this->reqExtensions,
            'private_key_bits' => $this->privateKeyBits
                ? ((int) $this->privateKeyBits) : null,
            'private_key_type' => $this->privateKeyType,
            'encrypt_key' => $this->encryptKey,
            'encrypt_key_cipher' => $this->encryptKeyCipher,
            'curve_name' => $this->curveName
        ];

        $keys = [];

        foreach ($rslt as $k => $v) {
            if ($v === null) $keys[] = $k;
        }

        foreach ($keys as $v) {
            unset($rslt[$v]);
        }

        return $rslt;
    }

    /**
     * Constructor
     *
     * @param string $configureFile
     * @param string $digestAlgorithm
     * @param string $x509Extensions
     * @param string $reqExtensions
     * @param int $privateKeyBits
     * @param int $privateKeyType
     * @param bool $encryptKey
     * @param int $encryptKeyCipher
     * @param string $curveName
     */
    public function __construct(
        string $configureFile = null,
        string $digestAlgorithm = null,
        string $x509Extensions = null,
        string $reqExtensions = null,
        int $privateKeyBits = null,
        int $privateKeyType = null,
        bool $encryptKey = null,
        int $encryptKeyCipher = null,
        string $curveName = null
    ) {
        $this->configureFile = $configureFile;
        $this->digestAlgorithm = $digestAlgorithm;
        $this->x509Extensions = $x509Extensions;
        $this->reqExtensions = $reqExtensions;
        $this->privateKeyBits = $privateKeyBits;
        $this->privateKeyType = $privateKeyType;
        $this->encryptKey = $encryptKey;
        $this->encryptKeyCipher = $encryptKeyCipher;
        $this->curveName = $curveName;
    }

    /**
     * Create from Array
     *
     * @param array $configargs
     * 
     * @static
     * 
     * @return self
     */
    public static function fromArray(array $configargs): self
    {
        return new self(
            $configargs['config'] ?? null,
            $configargs['digest_alg'] ?? null,
            $configargs['x509_extensions'] ?? null,
            $configargs['req_extensions'] ?? null,
            $configargs['private_key_bits'] ?? null,
            $configargs['private_key_type'] ?? null,
            $configargs['encrypt_key'] ?? null,
            $configargs['encrypt_key_cipher'] ?? null,
            $configargs['curve_name'] ?? null
        );
    }

    const DEFAULT_RSA_KEY_BITS = 4096;

    /**
     * Create RSA Private Key configargs
     *
     * @param integer $keyBits
     * @param boolean $encryptKey
     * @param integer $encryptKeyCipher
     * 
     * @static
     * 
     * @return self
     */
    public static function newRSAPrivateKey(
        int $keyBits = self::DEFAULT_RSA_KEY_BITS,
        bool $encryptKey = null,
        int $encryptKeyCipher = null
    ): self {
        return new self(
            null,
            null,
            null,
            null,
            $keyBits,
            KeyType::RSA,
            $encryptKey,
            $encryptKeyCipher,
            null
        );
    }

    const DEFAULT_DSA_KEY_BITS = 4096;

    /**
     * Create DSA Private Key configargs
     *
     * @param integer $keyBits
     * @param boolean $encryptKey
     * @param integer $encryptKeyCipher
     * 
     * @static
     * 
     * @return self
     */
    public static function newDSAPrivateKey(
        int $keyBits = self::DEFAULT_DSA_KEY_BITS,
        bool $encryptKey = null,
        int $encryptKeyCipher = null
    ): self {
        return new self(
            null,
            null,
            null,
            null,
            $keyBits,
            KeyType::DSA,
            $encryptKey,
            $encryptKeyCipher,
            null
        );
    }

    const DEFAULT_CURVE_NAME = "secp384r1";

    /**
     * Create ECC Private Key configargs
     *
     * @param string $curveName
     * @param boolean $encryptKey
     * @param integer $encryptKeyCipher
     * 
     * @static
     * 
     * @return self
     */
    public static function newECCPrivateKey(
        string $curveName = self::DEFAULT_CURVE_NAME,
        bool $encryptKey = null,
        int $encryptKeyCipher = null
    ): self {
        return new self(
            null,
            null,
            null,
            null,
            null,
            KeyType::EC,
            $encryptKey,
            $encryptKeyCipher,
            $curveName
        );
    }
}
