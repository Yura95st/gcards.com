<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Card
{
    private $id = 0;
    private $background;
    private $blocks;
    private $hash_code;

    function __construct($id)
    {
        $this->id = $id;
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

    public function setHashCode($hashCode)
    {
        $this->hash_code = $hashCode;
    }

    public function getHashCode()
    {
        return $this->hash_code;
    }

    public function getId()
    {
        return $this->id;
    }

    public function blocksToString()
    {
        $string = "";
        $count = sizeof($this->blocks);
        $i=0;

        foreach($this->blocks as $block) {
            $i++;
            $string .= $block->getId().($i != $count ? "," : "");
        }

        return $string;
    }
} 