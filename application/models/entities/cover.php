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
        $this->id = $id;
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
        $this->visibleToAll = $visibleToAll;
    }

    /**
     * @return int
     */
    public function getVisibleToAll()
    {
        return $this->visibleToAll;
    }
} 