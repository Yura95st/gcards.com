<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Font
{
    private $color;
    private $size;
    private $weight;
    private $style;
    private $family;

    function __construct($color, $size, $weight, $style, $family)
    {
        $this->color = $color;
        $this->size = $size;
        $this->weight = $weight;
        $this->style = $style;
        $this->family = $family;
    }

    public function setColor($color)
    {
        $this->color = $this->validateHtmlColor($color, TRUE);
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setFamily($family)
    {
        if (in_array($family, $this->resources->font_family))
        {
            $this->family = $family;
        }
    }

    public function getFamily()
    {
        return $this->family;
    }

    public function setSize($size)
    {
        $size = (int) $size;

        if ($size > 0)
        {
            $this->size = $size;
        }
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setStyle($style)
    {
        if (in_array($style, $this->resources->font_style))
        {
            $this->style = $style;
        }
    }

    public function getStyle()
    {
        return $this->style;
    }

    public function setWeight($weight)
    {
        if (in_array($weight, $this->resources->font_style))
        {
            $this->weight = $weight;
        }
    }

    public function getWeight()
    {
        return $this->weight;
    }

    private function validateHtmlColor($color, $named)
    {
        /* Validates hex color, adding #-sign if not found. Checks for a Color Name first to prevent error if a
        name was entered (optional).
        *   $color: the color hex value stirng to Validates
        *   $named: (optional), set to 1 or TRUE to first test if a Named color was passed instead of a Hex value
        */

        if ($named) {

            if (in_array(strtolower($color), $this->resources->color_named))
            {
                /* A color name was entered instead of a Hex Value, so just exit function */
                return $color;
            }
        }

        if (preg_match('/^#[a-f0-9]{6}$/i', $color))
        {
            // Verified OK
        }
        else if (preg_match('/^[a-f0-9]{6}$/i', $color))
        {
            $color = '#' . $color;
        }
        else
        {
            $color = '#000000';
        }

        return $color;
    }
} 