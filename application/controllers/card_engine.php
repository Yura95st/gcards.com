<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) )  {
    show_404();
    exit();
}

class Card_Engine extends CI_Controller
{
    public function create()
    {
    }
}
