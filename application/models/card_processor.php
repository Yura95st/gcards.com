<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'models/entities/card.php');
require_once(APPPATH.'models/entities/block.php');

class Card_Processor extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function getCardByHashCode($hashCode)
    {
        $card = new Card();

        $block1 = new Block(null, null, null, "Block 1");
        $block2 = new Block(null, null, null, "Block 2");

        $card->setBlocks(array($block1, $block2));
        $card->setBackground("img.png");

        //TODO: Get card from dataBase

        return $card;
    }
}