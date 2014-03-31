<?php

namespace Nedi\Common\Snmp\V2;


use Nedi\Common\Snmp\Parameters;

class Walk
{

    private $hostAddress;
    /**
     * @var \Nedi\Common\Snmp\Parameters
     */
    private $parameters;
    private $oid;

    public function __construct($hostAddress, Parameters $parameters, $oid)
    {

        $this->hostAddress = $hostAddress;
        $this->parameters = $parameters;
        $this->oid = $oid;
    }

    public function execute()
    {
        $time = microtime(true);
        exec(
            sprintf("snmpbulkwalk -Onaq -m '' %s %s %s", $this->parameters, $this->hostAddress, $this->oid),
            $output
        );
        $result = array();
        foreach ($output as $row) {
            $spacePosition = strpos($row, " ");
            $result[substr($row, 0, $spacePosition)] = substr($row, $spacePosition + 1);
        }
        echo microtime(true)- $time. "\n";
        return $result;
    }

}
