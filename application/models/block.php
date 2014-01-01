<?php

namespace application\models;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Block
{
    private $_id;
    private $_font;
    private $_position;

    function __construct()
    {
        $this->_font = new Font();
        $this->_position = new Position();
    }
    /**
     * @param \application\models\Font $font
     */
    public function setFont($font)
    {
        $this->_font = $font;
    }

    /**
     * @return \application\models\Font
     */
    public function getFont()
    {
        return $this->_font;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param \application\models\Position $position
     */
    public function setPosition($position)
    {
        $this->_position = $position;
    }

    /**
     * @return \application\models\Position
     */
    public function getPosition()
    {
        return $this->_position;
    }
} 