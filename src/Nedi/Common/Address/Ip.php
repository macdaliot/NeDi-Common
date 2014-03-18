<?php

namespace Nedi\Common\Address;

/**
 * Class Ip
 *
 * for the Common tasks with IP-Addresses
 */
class Ip {

    private function __construct($longIp) {
        $this->ip = $longIp;
    }

    public static function fromLong($longIp) {
        return new static($longIp);
    }

    public static function fromString($string) {
        return new static(ip2long($string));
    }

    public function asString() {
        return long2ip($this->ip);
    }

    public function asLong() {
        return $this->ip;
    }
} 