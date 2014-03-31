<?php

namespace Nedi\Common;

class Host {


    function __construct($address)
    {
        $this->address = gethostbyname($address);

    }
}
