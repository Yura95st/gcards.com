<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Position
{
    private $x;
    private $y;
    private $height;
    private $width;

    public function __construct()
    {
    }

    public function setHeight($height)
    {
        $height = (int)$height;
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
        $width = (int)$width;
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
        $x = (int)$x;
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
        $y = (int)$y;
        if ($y >= 0) {
            $this->y = $y;
        }
    }

    public function getY()
    {
        return $this->y;
    }

    public function fromJSON($jsonString)
    {
        $position = json_decode($jsonString, true);

        $this->x = $position['x'];
        $this->y = $position['y'];
        $this->height = $position['height'];
        $this->width = $position['width'];
    }

    public function toJSON()
    {
        $array = array(
            'x' => $this->x,
            'y' => $this->y,
            'height' => $this->height,
            'width' => $this->width
        );

        return json_encode($array);
    }

    public function toString()
    {
        return " top: " . $this->x . "px ;" .
        " left: " . $this->y . "px ;" .
        " height: " . $this->height . "px ;" .
        " width: " . $this->width . "px ;";
    }
}