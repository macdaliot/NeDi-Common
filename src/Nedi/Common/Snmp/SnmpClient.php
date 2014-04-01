<?php

namespace Nedi\Common\Snmp;


use Nedi\Common\Exception\NotImplementedException;
use Nedi\Common\Exception\UnsupportedVersionException;
use Nedi\Common\Snmp\V2\BulkWalk;
use Nedi\Common\Snmp\V2\Walk;

class SnmpClient
{

    const VERSION_1 = "1";
    const VERSION_2C = "2c";
    const VERSION_3 = "3";
    /**
     * @var string
     */
    private $hostAddress;
    /**
     * @var string
     */
    private $community = "public";
    /**
     * @var
     */
    private $version;

    public function __construct($hostAddress, $version = self::VERSION_2C)
    {
        $this->hostAddress = $hostAddress;
        $this->version = $version;
    }

    /**
     * @param $oid
     * @return array
     * @throws \Nedi\Common\Exception\NotImplementedException
     * @throws \Nedi\Common\Exception\UnsupportedVersionException
     */
    public function walk($oid)
    {
        switch ($this->version) {
            case self::VERSION_1:
                throw new NotImplementedException();

            case self::VERSION_2C:
                $walk = new Walk($this->hostAddress, new V2Parameters($this->community), $oid);
                break;

            case self::VERSION_3:
                throw new NotImplementedException();

            default:
                throw new UnsupportedVersionException();
        }
        return $walk->execute();
    }

    /**
     * @param $oid
     * @return array
     * @throws \Nedi\Common\Exception\NotImplementedException
     * @throws \Nedi\Common\Exception\UnsupportedVersionException
     */
    public function bulkWalk($oid)
    {
        switch ($this->version) {
            case self::VERSION_1:
                throw new NotImplementedException();

            case self::VERSION_2C:
                $bulkWalk = new BulkWalk($this->hostAddress, new V2Parameters($this->community), $oid);
                break;

            case self::VERSION_3:
                throw new NotImplementedException();

            default:
                throw new UnsupportedVersionException();
        }
        return $bulkWalk->execute();
    }

    /**
     * @param string $community
     */
    public function setCommunity($community)
    {
        $this->community = $community;
    }
}
