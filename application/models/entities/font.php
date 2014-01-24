<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'models/entities/size.php');

class Font
{
    private $color = "#000000";
    private $weight = "normal";
    private $style = "";
    private $family = "arial";
    private $size = null;

    function __construct()
    {
        $this->size = new Size();
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
        //TODO: data validation
        //if (in_array($family, $this->resources->font_family)) {
        $this->family = $family;
        //}
    }

    public function getFamily()
    {
        return $this->family;
    }

    public function setSize($size)
    {
        if ($size != null) {
            $this->size = $size;
        }
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setStyle($style)
    {
        //TODO: data validation
        //if (in_array($style, $this->resources->font_style)) {
        $this->style = $style;
        //}
    }

    public function getStyle()
    {
        return $this->style;
    }

    public function setWeight($weight)
    {
        //TODO: data validation
        //if (in_array($weight, $this->resources->font_style)) {
        $this->weight = $weight;
        //}
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function fromArray($font)
    {
        if ($font != null) {
            $this->setColor($font['color']);
            $this->setWeight($font['weight']);
            $this->setSize($font['style']);
            $this->setFamily($font['family']);

            $size = new Size();
            $size->fromArray($font['size']);
            $this->setSize($size);
        }
    }

    public function fromJSON($jsonString)
    {
        $font = json_decode($jsonString, true);
        $this->fromArray($font);
    }

    public function toJSON()
    {
        $array = array(
            'color' => $this->color,
            'weight' => $this->weight,
            'style' => $this->style,
            'family' => $this->family,
            'size' => $this->size->toJSON()
        );

        return json_encode($array);
    }

    private function validateHtmlColor($color, $named)
    {
        /* Validates hex color, adding #-sign if not found. Checks for a Color Name first to prevent error if a
        name was entered (optional).
        *   $color: the color hex value stirng to Validates
        *   $named: (optional), set to 1 or TRUE to first test if a Named color was passed instead of a Hex value
        */

        if ($named) {

            //if (in_array(strtolower($color), $this->resources->color_named)) {
            /* A color name was entered instead of a Hex Value, so just exit function */
            return $color;
            //}
        }

        if (preg_match('/^#[a-f0-9]{6}$/i', $color)) {
            // Verified OK
        } else if (preg_match('/^[a-f0-9]{6}$/i', $color)) {
            $color = '#' . $color;
        } else {
            $color = '#000000';
        }

        return $color;
    }

    public function toString()
    {
        return " color: " . $this->color . ";" .
        " font-family: " . $this->family . ";" .
        " font-size: " . $this->size->toString() . ";" .
        " font-weight: " . $this->weight . ";" .
        " font-style: " . $this->style . ";";
    }
} 