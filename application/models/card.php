<?php

namespace application\models;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Card
{
    private $_id;
    private $_background;
    private $_blocks;
    private $_hashCode;

    function __construct()
    {
    }

    /**
     * @param mixed $background
     */
    public function setBackground($background)
    {
        $this->_background = $background;
    }

    /**
     * @return mixed
     */
    public function getBackground()
    {
        return $this->_background;
    }

    /**
     * @param mixed $blocks
     */
    public function setBlocks($blocks)
    {
        $this->_blocks = $blocks;
    }

    /**
     * @return mixed
     */
    public function getBlocks()
    {
        return $this->_blocks;
    }

    /**
     * @return mixed
     */
    public function getHashCode()
    {
        return $this->_hashCode;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }
} 