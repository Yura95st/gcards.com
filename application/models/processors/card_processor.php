<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'models/resources/fields_names.php');

require_once(APPPATH . 'models/entities/card.php');
require_once(APPPATH . 'models/entities/block.php');
require_once(APPPATH . 'models/entities/font.php');
require_once(APPPATH . 'models/entities/position.php');

class Card_Processor extends CI_Model
{
    function __construct()
    {
        //Call the Model constructor
        parent::__construct();

        $this->load->model('processors/cover_processor');
    }

    public function getCardByHashCode($hashCode)
    {
        if ($hashCode == null) {
            return null;
        }

        $card = null;

        $sql = " SELECT " . FieldsNames::$CARDS_ID . "," . FieldsNames::$CARDS_COVER_ID . "," .
            FieldsNames::$CARDS_BLOCKS . "," . FieldsNames::$CARDS_HASH_CODE .
            " FROM " . FieldsNames::$CARDS_TABLE .
            " WHERE " . FieldsNames::$CARDS_HASH_CODE . " = ? LIMIT 1";

        $query = $this->db->query($sql, array($hashCode));

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $card = new Card();
                $card->setId($row[FieldsNames::$CARDS_ID]);
                $card->setCover($this->cover_processor->getCover($row[FieldsNames::$CARDS_COVER_ID]));
                $card->setHashCode($row[FieldsNames::$CARDS_HASH_CODE]);
                $card->setBlocks($this->getBlocks($row[FieldsNames::$CARDS_BLOCKS]));
            }
        }

        return $card;
    }

    private function getBlocks($blocksIdArray)
    {
        $blocks = array();

        //Get all blocks, associated with card
        $sql = " SELECT " . FieldsNames::$BLOCKS_ID . "," . FieldsNames::$BLOCKS_FONT . "," .
            FieldsNames::$BLOCKS_POSITION . "," . FieldsNames::$BLOCKS_CONTENT .
            " FROM " . FieldsNames::$BLOCKS_TABLE .
            " WHERE " . FieldsNames::$BLOCKS_ID . " IN (" . $blocksIdArray . ")";

        $query = $this->db->query($sql); //, array($blocksIdArray));

        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $block = new Block();

                $block->setId($row[FieldsNames::$BLOCKS_ID]);
                $block->setContent($row[FieldsNames::$BLOCKS_CONTENT]);

                $font = new Font();
                $font->fromJSON($row[FieldsNames::$BLOCKS_FONT]);
                $block->setFont($font);

                $position = new Position();
                $position->fromJSON($row[FieldsNames::$BLOCKS_POSITION]);
                $block->setPosition($position);

                array_push($blocks, $block);
            }
        }

        return $blocks;
    }

    public function publishCard($card)
    {
        if ($card == null) {
            return false;
        }

        //Publish blocks of the card
        $result = $this->publishBlocks($card->getBlocks());

        if ($result == false) {
            return false;
        }

        $data = array(
            FieldsNames::$CARDS_COVER_ID => $card->getCover()->getId(),
            FieldsNames::$CARDS_BLOCKS => $card->blocksToString(),
            FieldsNames::$CARDS_HASH_CODE => $card->getHashCode()
        );

        $query = $this->db->insert(FieldsNames::$CARDS_TABLE, $data);

        if ($this->db->affected_rows() == 0) {
            return false;
        }

        //Return id of the published card
        return $this->db->insert_id();
    }

    private function publishBlocks(&$blocks)
    {
        if (sizeof($blocks) == 0) {
            return true;
        }

        $data = array();

        foreach ($blocks as $block) {
            array_push($data, array(
                FieldsNames::$BLOCKS_FONT => $block->getFont()->toJSON(),
                FieldsNames::$BLOCKS_POSITION => $block->getPosition()->toJSON(),
                FieldsNames::$BLOCKS_CONTENT => $block->getContent()
            ));
        }

        $query = $this->db->insert_batch(FieldsNames::$BLOCKS_TABLE, $data);

        if ($this->db->affected_rows() == 0) {
            return false;
        }

        //Associate blocks with their id in the database
        $first_insert_id = $this->db->insert_id();

        foreach ($blocks as $block) {
            $block->setId($first_insert_id);
            $first_insert_id++;
        }

        return true;
    }

}