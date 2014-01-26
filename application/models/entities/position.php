<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'models/resources/fields_names.php');

class Position
{
    private $x = 0;
    private $y = 0;
    private $height = 0;
    private $width = 0;

    public function __construct()
    {
    }

    public function setHeight($height)
    {
        if ($height >= 0) {
            $this->height = $height;
        }
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setWidth($width)
    {
        if ($width >= 0) {
            $this->width = $width;
        }
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setX($x)
    {
        if ($x >= 0) {
            $this->x = $x;
        }
    }

    public function getX()
    {
        return $this->x;
    }

    public function setY($y)
    {
        if ($y >= 0) {
            $this->y = $y;
        }
    }

    public function getY()
    {
        return $this->y;
    }

    public function fromArray($position)
    {
        if ($position != null) {
            if (isset($position[FieldsNames::$JSON_POSITION_X])) {
                $this->setX($position[FieldsNames::$JSON_POSITION_X]);
            }

            if (isset($position[FieldsNames::$JSON_POSITION_Y])) {
                $this->setY($position[FieldsNames::$JSON_POSITION_Y]);
            }

            if (isset($position[FieldsNames::$JSON_POSITION_HEIGHT])) {
                $this->setHeight($position[FieldsNames::$JSON_POSITION_HEIGHT]);
            }

            if (isset($position[FieldsNames::$JSON_POSITION_WIDTH])) {
                $this->setWidth($position[FieldsNames::$JSON_POSITION_WIDTH]);
            }
        }
    }

    public function fromJSON($jsonString)
    {
        $position = json_decode($jsonString, true);
        $this->fromArray($position);
    }

    public function toJSON()
    {
        $array = array(
            FieldsNames::$JSON_POSITION_X => $this->x,
            FieldsNames::$JSON_POSITION_Y => $this->y,
            FieldsNames::$JSON_POSITION_HEIGHT => $this->height,
            FieldsNames::$JSON_POSITION_WIDTH => $this->width
        );

        return json_encode($array);
    }

    public function toString()
    {
        return " left: " . $this->x . "px ;" .
        " top: " . $this->y . "px ;" .
        " height: " . $this->height . "px ;" .
        " width: " . $this->width . "px ;";
    }

    public function isDefault()
    {
        if ($this->x == 0 && $this->y == 0 && $this->height == 0 && $this->width == 0) {
            return true;
        } else {
            return false;
        }
    }
}