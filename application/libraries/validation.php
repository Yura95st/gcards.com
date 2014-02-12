<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

define('PHP_INT_MIN', 0-PHP_INT_MAX);

class Validation
{

    /**
     * @param $val
     * @param int $min
     * @param int $max
     * @return bool
     */
    public static function isInteger($val, $min = PHP_INT_MAX, $max = PHP_INT_MAX)
    {
        $filter_options = array(
            'options' => array('min' => $min,
                'max' => $max)
        );
        return filter_var($val, FILTER_VALIDATE_INT, $filter_options) !== FALSE;
    }

    /**
     * @param $array
     * @return bool
     */
    public static function arrayHasOnlyIntegers($array)
    {
        foreach ($array as $value)
        {
            if (!Validation::isInteger($value))
            {
                return false;
            }
        }
        return true;
    }
} 