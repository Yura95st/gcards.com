<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Size
{
    private $type;
    private $value;

    public function __construct($type, $value)
    {
        parent::__construct();

        $this->type = $type;
        $this->value = $value;
    }

    public function setType($type)
    {
        if (in_array($type, $this->resources->size_type))
        {
            $this->type = $type;
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function setValue($value)
    {
        $value = (int) $value;
        if($value > 0)
        {
            $this->value = $value;
        }
    }

    public function getValue()
    {
        return $this->value;
    }
} 