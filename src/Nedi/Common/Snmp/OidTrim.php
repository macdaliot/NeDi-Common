<?php

namespace Nedi\Common\Snmp;


class OidTrim
{

    /**
     * @param $array
     * @return mixed
     */
    public function trim($array)
    {
        $result = array();
        foreach ($array as $key => $row) {
            if ($row{0} == "\"") {
                $value = substr($row, 1, strlen($row) - 2);
                $row = $value;
            }
            $result[$this->getKey($key)] = $row;
        }
        return $result;
    }

    /**
     * @param $oid
     * @return mixed
     */
    protected function getKey($oid)
    {
        $array = explode(".", $oid);
        return array_pop($array);
    }
}
