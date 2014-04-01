<?php

namespace Nedi\Common\Shell;

class Command
{
    /**
     * @var string
     */
    private $command;

    /**
     * @var Array
     */
    private $resonse;

    /**
     * @var Integer
     */
    private $exitCode;

    /**
     * @var float
     */
    private $timeUsed;

    public function __construct($command = "")
    {
        $this->command = $command;
    }

    /**
     * Executes the Shellcommand
     *
     * after executing it returns the last line of the return
     *
     * @return string
     */
    public function execute()
    {
        $start = microtime(true);
        $returnString = exec($this->command, $this->resonse, $this->exitCode);
        $this->timeUsed = microtime(true) - $start;
        return $returnString;
    }

    /**
     * @return Array
     */
    public function getResonse()
    {
        return $this->resonse;
    }

    /**
     * @return int
     */
    public function getExitCode()
    {
        return $this->exitCode;
    }

    /**
     * @return float
     */
    public function getTimeUsed()
    {
        return $this->timeUsed;
    }
}
