<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Size
{
    private $type;
    private $value;

    public function __construct()
    {
    }

    public function setType($type)
    {
        $this->type = $type;
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

    public function fromJSON($jsonString)
    {
        $size = json_decode($jsonString, true);

        $this->type = $size['type'];
        $this->value = $size['value'];
    }

    public function toJSON()
    {
        $array = array (
            'type' =>  $this->type,
            'value' => $this->value
        );

        return json_encode($array);
    }

    public function toString()
    {
        return $this->value.$this->type;
    }
}