<?php

namespace Nedi\Common\Snmp;


class V1Parameters extends Parameters
{

    private $community;

    function __construct($community = "public")
    {
        $this->community = $community;
    }

    /**
     * @return mixed
     */
    public function getCommunity()
    {
        return $this->community;
    }

    /**
     * @param mixed $community
     */
    public function setCommunity($community)
    {
        $this->community = $community;
    }

    function __toString()
    {
        return " -v 1 -c ".$this->getCommunity()." ";
    }
}