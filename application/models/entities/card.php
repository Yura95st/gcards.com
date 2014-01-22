<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Card
{
    private $id = -1;
    private $background;
    private $blocks;
    private $hash_code;

    function __construct()
    {
    }

    public function setBackground($background)
    {
        $this->background = $background;
    }

    public function getBackground()
    {
        return $this->background;
    }

    public function setBlocks($blocks)
    {
        $this->blocks = $blocks;
    }

    public function getBlocks()
    {
        return $this->blocks;
    }

    public function getHashCode()
    {
        return $this->hash_code;
    }

    public function getId()
    {
        return $this->id;
    }
} 