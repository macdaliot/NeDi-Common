<?php

namespace Nedi\Common\Snmp\V2;


use Nedi\Common\Shell\Command;
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
        $command = new Command(
            sprintf("%s -Onaq -m '' %s %s %s", $this->getCommand(), $this->parameters, $this->hostAddress, $this->oid)
        );
        $command->execute();
        $result = $this->parseResponse($command->getResonse());
        return $result;
    }

    /**
     * @return string
     */
    protected function getCommand()
    {
        return "snmpwalk";
    }

    /**
     * @param $response
     * @return mixed
     */
    protected function parseResponse($response)
    {
        $result = array();
        foreach ($response as $row) {
            $spacePosition = strpos($row, " ");
            $result[substr($row, 0, $spacePosition)] = substr($row, $spacePosition + 1);
        }
        return $result;
    }

}
