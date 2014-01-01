<?php

namespace application\models;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Size
{
    private $_type;
    private $_value;

    function __construct()
    {
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->_value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->_value;
    }
} 