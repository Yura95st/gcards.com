<?php

namespace application\models;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Font
{

    private $_color;
    private $_size;
    private $_weight;
    private $_style;
    private $_family;

    function __construct()
    {
        $_size = new Size();
    }

    /**
     * @param string $color
     */
    public function setColor($color)
    {
        $this->_color = $color;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->_color;
    }

    /**
     * @param string $family
     */
    public function setFamily($family)
    {
        $this->_family = $family;
    }

    /**
     * @return string
     */
    public function getFamily()
    {
        return $this->_family;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->_size = $size;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->_size;
    }

    /**
     * @param string $style
     */
    public function setStyle($style)
    {
        $this->_style = $style;
    }

    /**
     * @return string
     */
    public function getStyle()
    {
        return $this->_style;
    }

    /**
     * @param string $weight
     */
    public function setWeight($weight)
    {
        $this->_weight = $weight;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->_weight;
    }
} 