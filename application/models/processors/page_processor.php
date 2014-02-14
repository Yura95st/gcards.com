<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page_Processor extends CI_Model
{
    function __construct()
    {
        //Call the Model constructor
        parent::__construct();

        $this->load->model('processors/cover_processor');
    }

    public function loadHeader()
    {
        $this->load->view('templates/meta');
        $this->load->view('templates/header');
    }

    public function loadFooter($data = array())
    {
        $isCreatePage = isset($data['isCreatePage']) ? $data['isCreatePage'] : false;
        $isMainPage = isset($data['isMainPage']) ? $data['isMainPage'] : false;

        $this->lang->load('footer'); //, 'russian');

        $data = array(
            'createPage' => $isCreatePage,
            'mainPage' => $isMainPage,
            'menu_main' => $this->lang->line('menu_main'),
            'menu_create_card' => $this->lang->line('menu_create_card'),
            'menu_about' => $this->lang->line('menu_about'),
            'menu_send_feedback' => $this->lang->line('menu_send_feedback')
        );

        $this->load->view('templates/footer', $data);
    }

    public function loadToolbar()
    {
        $this->lang->load('toolbar');//, 'russian');

        $data = array(
            'button_pick_cover' => $this->lang->line('button_pick_cover'),
            'button_add_block' => $this->lang->line('button_add_block'),
            'button_preview' => $this->lang->line('button_preview'),
            'button_publish' => $this->lang->line('button_publish'),
            'button_back_to_editing' => $this->lang->line('button_back_to_editing'),
            'info_bar_preview_mode_activated' => $this->lang->line('info_bar_preview_mode_activated')
        );

        $this->load->view('templates/toolbar', $data);
    }
}