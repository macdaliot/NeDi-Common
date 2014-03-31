<?php

namespace Nedi\Common\Snmp;


class V2Parameters extends V1Parameters
{
    public function __toString()
    {
        return " -v 2c -c " . $this->getCommunity() . " ";
    }
}
