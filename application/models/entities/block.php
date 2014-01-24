<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'models/resources/fields_names.php');

class Block
{
    private $id = 0;
    private $font = null;
    private $position = null;
    private $content = "";

    public function __construct()
    {
        $this->font = new Font();
        $this->position = new Position();
    }

    public function setId($id)
    {
        //TODO: data validation
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setFont($font)
    {
        if ($font != null) {
            $this->font = $font;
        }
    }

    public function getFont()
    {
        return $this->font;
    }

    public function setPosition($position)
    {
        if ($position != null) {
            $this->position = $position;
        }
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setContent($text)
    {
        //TODO: data validation
        $this->content = $text;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getStyle()
    {
        return $this->font->toString() . " " . $this->position->toString();
    }

    public function fromArray($block)
    {
        $this->setContent($block[FieldsNames::$BLOCKS_CONTENT]);

        $font = new Font();
        $font->fromArray($block['font']);
        $this->setFont($font);

        $position = new Position();
        $position->fromArray($block[FieldsNames::$BLOCKS_POSITION]);
        $this->setPosition($position);
    }
}