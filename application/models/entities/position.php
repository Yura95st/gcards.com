<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Position
{
    private $x;
    private $y;
    private $height;
    private $width;

    public function __construct($x, $y, $height, $width)
    {
        $this->x = $x;
        $this->y = $y;
        $this->height = $height;
        $this->width = $width;
    }

    public function setHeight($height)
    {
        $height = (int) $height;
        if ($height >= 0)
        {
            $this->height = $height;
        }
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setWidth($width)
    {
        $width = (int) $width;
        if ($width >= 0)
        {
            $this->width = $width;
        }
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setX($x)
    {
        $x = (int) $x;
        if ($x >= 0)
        {
            $this->x = $x;
        }
    }

    public function getX()
    {
        return $this->x;
    }

    public function setY($y)
    {
        $y = (int) $y;
        if ($y >= 0)
        {
            $this->y = $y;
        }
    }

    public function getY()
    {
        return $this->y;
    }
}