<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cover
{
    private $id = 0;
    private $pathOriginal = "";
    private $pathMini = "";
    private $visibleToAll = 0;

    function __construct()
    {
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        if (Validation::isInteger($id, 0)) {
            $this->id = $id;
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $pathMini
     */
    public function setPathMini($pathMini)
    {
        //TODO: validation data
        $this->pathMini = $pathMini;
    }

    /**
     * @return string
     */
    public function getPathMini()
    {
        return $this->pathMini;
    }

    /**
     * @param string $pathOriginal
     */
    public function setPathOriginal($pathOriginal)
    {
        //TODO: validation data
        $this->pathOriginal = $pathOriginal;
    }

    /**
     * @return string
     */
    public function getPathOriginal()
    {
        return $this->pathOriginal;
    }

    /**
     * @param int $visibleToAll
     */
    public function setVisibleToAll($visibleToAll)
    {
        if ($visibleToAll == 0 || $visibleToAll == 1) {
            $this->visibleToAll = $visibleToAll;
        }
    }

    /**
     * @return int
     */
    public function getVisibleToAll()
    {
        return $this->visibleToAll;
    }

    public function isDefault()
    {
        if ($this->id == 0 && $this->pathOriginal == "" && $this->pathMini == "" && $this->visibleToAll == 0) {
            return true;
        } else {
            return false;
        }
    }
} 