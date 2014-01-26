<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'models/resources/fields_names.php');
require_once(APPPATH . 'models/processors/cover_processor.php');
require_once(APPPATH . 'libraries/validation.php');

class Card
{
    private $id = 0;
    private $cover = null;
    private $blocks = array();
    private $hash_code = "";

    function __construct()
    {
        $this->hash_code = md5(time());
        $this->cover = new Cover();
    }

    /**
     * @param Cover $cover
     */
    public function setCover($cover)
    {
        if ($cover != null) {
            $this->cover = $cover;
        }
    }

    /**
     * @return Cover|null
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @param array $blocks
     */
    public function setBlocks($blocks)
    {
        if ($blocks != null && sizeof($blocks) > 0) {
            $this->blocks = $blocks;
        }
    }

    /**
     * @return array
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * @param string $hashCode
     */
    public function setHashCode($hashCode)
    {
        //No longer, than 255 chars
        $hashCode = substr($hashCode, 0, 255);
        $this->hash_code = $hashCode;
    }

    /**
     * @return string
     */
    public function getHashCode()
    {
        return $this->hash_code;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * @return string
     */
    public function blocksToString()
    {
        $string = "";
        $count = sizeof($this->blocks);
        $i = 0;

        foreach ($this->blocks as $block) {
            $i++;
            $string .= $block->getId() . ($i != $count ? "," : "");
        }

        return $string;
    }

    /**
     * @param Card $card
     */
    public function fromArray($card)
    {
        if ($card != null) {

            if (isset($card[FieldsNames::$JSON_CARDS_COVER_ID])) {
                $coverProcessor = new Cover_Processor();
                $this->setCover($coverProcessor->getCover($card[FieldsNames::$JSON_CARDS_COVER_ID]));
            }

            if (isset($card[FieldsNames::$JSON_CARDS_BLOCKS])) {
                $blocks = array();

                foreach ($card[FieldsNames::$JSON_CARDS_BLOCKS] as $blockAsArray) {
                    $block = new Block();
                    $block->fromArray($blockAsArray);

                    //block is not default
                    if (!$block->isDefault()) {
                        array_push($blocks, $block);
                    }
                }

                $this->setBlocks($blocks);
            }
        }
    }

    /**
     * @param string $jsonString
     */
    public function fromJSON($jsonString)
    {
        $card = json_decode($jsonString, true);
        $this->fromArray($card);
    }

    public function isDefault()
    {
        if ($this->id == 0 && ($this->cover->isDefault() || sizeof($this->blocks) == 0)) {
            return true;
        } else {
            return false;
        }
    }
} 