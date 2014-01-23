<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'models/entities/card.php');
require_once(APPPATH . 'models/entities/block.php');
require_once(APPPATH . 'models/entities/font.php');
require_once(APPPATH . 'models/entities/position.php');

class Card_Processor extends CI_Model
{
    //Cards table values
    private $CARDS_TABLE = "cards";
    private $CARDS_ID = "card_id";
    private $CARDS_BG_IMG = "bg_img";
    private $CARDS_BLOCKS = "blocks";
    private $CARDS_HASH_CODE = "hash_code";

    //Blocks table values
    private $BLOCKS_TABLE = "blocks";
    private $BLOCKS_ID = "block_id";
    private $BLOCKS_FONT = "font";
    private $BLOCKS_POSITION = "position";
    private $BLOCKS_TEXT = "text";

    function __construct()
    {
        //Call the Model constructor
        parent::__construct();
    }

    public function getCardByHashCode($hashCode)
    {
        if ($hashCode == null) {
            return null;
        }

        $card = null;

        $sql = " SELECT " . $this->CARDS_ID . "," . $this->CARDS_BG_IMG . "," .
            $this->CARDS_BLOCKS . "," . $this->CARDS_HASH_CODE .
            " FROM " . $this->CARDS_TABLE .
            " WHERE " . $this->CARDS_HASH_CODE . " = ? LIMIT 1";

        $query = $this->db->query($sql, array($hashCode));

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $card = new Card($row[$this->CARDS_ID]);
                $card->setBackground($row[$this->CARDS_BG_IMG]);
                $card->setHashCode($row[$this->CARDS_HASH_CODE]);
                $card->setBlocks($this->getBlocks($row[$this->CARDS_BLOCKS]));
            }
        }

        return $card;
    }

    private function getBlocks($blocksIdArray)
    {
        $blocks = array();

        //Get all blocks, associated with card
        $sql = " SELECT " . $this->BLOCKS_ID . "," . $this->BLOCKS_FONT . "," .
            $this->BLOCKS_POSITION . "," . $this->BLOCKS_TEXT .
            " FROM " . $this->BLOCKS_TABLE .
            " WHERE " . $this->BLOCKS_ID . " IN (" . $blocksIdArray . ")";

        $query = $this->db->query($sql); //, array($blocksIdArray));

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $block = new Block();

                $block->setId($row[$this->BLOCKS_ID]);
                $block->setText($row[$this->BLOCKS_TEXT]);

                $font = new Font();
                $font->fromJSON($row[$this->BLOCKS_FONT]);
                $block->setFont($font);

                $position = new Position();
                $position->fromJSON($row[$this->BLOCKS_POSITION]);
                $block->setPosition($position);

                array_push($blocks, $block);
            }
        }

        return $blocks;
    }
}