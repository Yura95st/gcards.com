<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'models/resources/fields_names.php');
require_once(APPPATH . 'libraries/validation.php');

class Block
{
    private $id = 0;
    private $position = null;
    private $content = "";

    public function __construct()
    {
        $this->position = new Position();
    }

    public function setId($id)
    {
        if (Validation::isInteger($id, 0)) {
            $this->id = $id;
        }
    }

    public function getId()
    {
        return $this->id;
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

    public function setContent($content)
    {
        if ($content != null) {
            //No longer, than 10000 chars
            $content = substr($content, 0, 10000);
            //TODO: validate html
            $this->content = $content;//html_escape($content);
        }
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getStyle()
    {
        return $this->position->toString();
    }

    public function fromArray($block)
    {
        if ($block != null) {
            if (isset($block[FieldsNames::$BLOCKS_CONTENT])) {
                $this->setContent($block[FieldsNames::$BLOCKS_CONTENT]);
            }

            if (isset($block[FieldsNames::$BLOCKS_POSITION])) {
                $position = new Position();
                $position->fromArray($block[FieldsNames::$BLOCKS_POSITION]);
                $this->setPosition($position);
            }
        }
    }

    public function isDefault()
    {
        if ($this->id == 0 && ($this->content == "" || $this->position->isDefault())) {
            return true;
        } else {
            return false;
        }
    }
}