<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Block
{
    private $id;
    private $font;
    private $position;
    private $text;

    public function __construct()
    {
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setFont($font)
    {
        $this->font = $font;
    }

    public function getFont()
    {
        return $this->font;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getStyle()
    {
        return $this->font->toString()." ".$this->position->toString();
    }
}