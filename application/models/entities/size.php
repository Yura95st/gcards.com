<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Size
{
    private $type = "px";
    private $value = "0";

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
        if($value > 0)
        {
            $this->value = $value;
        }
    }

    public function getValue()
    {
        return $this->value;
    }

    public function fromArray($size)
    {
        if ($size != null) {
            $this->setType($size['type']);
            $this->setValue($size['value']);
        }
    }

    public function fromJSON($jsonString)
    {
        $size = json_decode($jsonString, true);
        $this->fromArray($size);
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