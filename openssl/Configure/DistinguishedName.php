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

class DistinguishedName
{
    /**
     * Country Name
     * 
     * eg: CN
     *
     * @var string?
     */
    public $countryName = null;

    /**
     * State or Province Name
     * 
     * eg: Jiangsu
     *
     * @var string?
     */
    public $stateOrProvinceName = null;

    /**
     * LocalityName
     * 
     * eg: city
     *
     * @var string?
     */
    public $localityName = null;

    /**
     * Organization Name
     *
     * eg: Foo Company
     * 
     * @var string?
     */
    public $organizationName = null;

    /**
     * Organizational Unit Name
     * 
     * eg: Technical Department
     *
     * @var string?
     */
    public $organizationalUnitName = null;

    /**
     * Common Name
     * 
     * @var string?
     */
    public $commonName = null;

    /**
     * Email Address
     *
     * @var string?
     */
    public $emailAddress = null;

    /**
     * Export to array
     *
     * @return string[string]
     */
    public function toArray(): array
    {
        $rslt = [
            'commonName' => $this->commonName,
            'emailAddress' => $this->emailAddress,
            'countryName' => $this->countryName,
            'stateOrProvinceName' => $this->stateOrProvinceName,
            'localityName' => $this->localityName,
            'organizationName' => $this->organizationName,
            'organizationalUnitName' => $this->organizationalUnitName
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
     * Set CommonName
     *
     * @param string $val
     * @return self
     */
    public function setCommonName(string $val): self
    {
        $this->commonName = $val;
        return $this;
    }

    /**
     * Get CommonName
     *
     * @return string
     */
    public function getCommonName(): string
    {
        return (string) $this->commonName;
    }

    /**
     * Set EmailAddress
     *
     * @param string $val
     * @return self
     */
    public function setEmailAddress(string $val): self
    {
        $this->emailAddress = $val;
        return $this;
    }

    /**
     * Get EmailAddress
     *
     * @return string
     */
    public function getEmailAddress(): string
    {
        return (string) $this->emailAddress;
    }

    /**
     * Set CountryName
     *
     * @param string $val
     * @return self
     */
    public function setCountryName(string $val): self
    {
        $this->countryName = $val;
        return $this;
    }

    /**
     * Get CountryName
     *
     * @return string
     */
    public function getCountryName(): string
    {
        return (string) $this->countryName;
    }

    /**
     * Set StateOrProvinceName
     *
     * @param string $val
     * @return self
     */
    public function setStateOrProvinceName(string $val): self
    {
        $this->stateOrProvinceName = $val;
        return $this;
    }

    /**
     * Get StateOrProvinceName
     *
     * @return string
     */
    public function getStateOrProvinceName(): string
    {
        return (string) $this->stateOrProvinceName;
    }

    /**
     * Set LocalityName
     *
     * @param string $val
     * @return self
     */
    public function setLocalityName(string $val): self
    {
        $this->localityName = $val;
        return $this;
    }

    /**
     * Get LocalityName
     *
     * @return string
     */
    public function getLocalityName(): string
    {
        return (string) $this->localityName;
    }

    /**
     * Set OrganizationName
     *
     * @param string $val
     * @return self
     */
    public function setOrganizationName(string $val): self
    {
        $this->organizationName = $val;
        return $this;
    }

    /**
     * Get OrganizationName
     *
     * @return string
     */
    public function getOrganizationName(): string
    {
        return (string) $this->organizationName;
    }

    /**
     * Set OrganizationalUnitName
     *
     * @param string $val
     * @return self
     */
    public function setOrganizationalUnitName(string $val): self
    {
        $this->organizationalUnitName = $val;
        return $this;
    }

    /**
     * Get CountryName
     *
     * @return string
     */
    public function getOrganizationalUnitName(): string
    {
        return (string) $this->organizationalUnitName;
    }

    /**
     * Constructor
     *
     * @param string $commonName
     * @param string $emailAddress
     * @param string $countryName
     * @param string $stateOrProvinceName
     * @param string $localityName
     * @param string $organizationName
     * @param string $organizationalUnitName
     */
    public function __construct(
        string $commonName = null,
        string $emailAddress = null,
        string $countryName = null,
        string $stateOrProvinceName = null,
        string $localityName = null,
        string $organizationName = null,
        string $organizationalUnitName = null
    ) {
        $this->commonName = $commonName;
        $this->emailAddress = $emailAddress;
        $this->countryName = $countryName;
        $this->stateOrProvinceName = $stateOrProvinceName;
        $this->localityName = $localityName;
        $this->organizationName = $organizationName;
        $this->organizationalUnitName = $organizationalUnitName;
    }

    /**
     * Construct DistinguishedName
     * with an AssocArray
     *
     * @param array $dn
     * 
     * @static
     * 
     * @return self
     */
    public static function fromArray(array $dn): self
    {
        return new self(
            $dn['commonName'] ?? null,
            $dn['emailAddress'] ?? null,
            $dn['countryName'] ?? null,
            $dn['stateOrProvinceName'] ?? null,
            $dn['localityName'] ?? null,
            $dn['organizationName'] ?? null,
            $dn['organizationalUnitName'] ?? null
        );
    }

    /**
     * Use example data to create
     *
     * @param string $commonName
     * 
     * @static
     * 
     * @return self
     */
    public static function fromExampleData(
        string $commonName = null
    ): self {
        return new self(
            $commonName ?? "Lightim OpenSSL Test Certificate",
            "test-cert@dev.lightim.pw",
            "CN",
            "Jiangsu",
            "Unknown Town",
            "lightim dev test",
            "Tech Department"
        );
    }
}
