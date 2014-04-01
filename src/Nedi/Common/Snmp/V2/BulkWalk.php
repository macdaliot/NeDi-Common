<?php

namespace Nedi\Common\Snmp\V2;


use Nedi\Common\Snmp\Parameters;

class BulkWalk extends Walk
{

    /**
     * @return string
     */
    protected function getCommand()
    {
        return "snmpbulkwalk";
    }

}
