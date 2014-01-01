<?php

namespace application\models;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Position
{
    private $_x;
    private $_y;
    private $_height;
    private $_width;

    function __construct()
    {

    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->_height = $height;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->_height;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->_width = $width;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->_width;
    }

    /**
     * @param mixed $x
     */
    public function setX($x)
    {
        $this->_x = $x;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->_x;
    }

    /**
     * @param mixed $y
     */
    public function setY($y)
    {
        $this->_y = $y;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->_y;
    }
} 