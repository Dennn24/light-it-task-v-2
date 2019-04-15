<?php

namespace application\domain;

class Number
{
    public $input;

    public $output;

    public function __construct($input, $output)
    {
        $this->input = $input;
        $this->output = $output;
    }

    protected function getInput()
    {
        return $this->input;
    }

    protected function getOutput()
    {
        return $this->output;
    }
}