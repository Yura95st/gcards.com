<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates/meta');
        $this->load->view('templates/header');

        $this->lang->load('main_content'); //, 'russian');
        $data = array(
            'img' => base_url() . 'img/backgrounds/bg_20.jpg',
            'headline' => $this->lang->line('info_headline'),
            'description' => $this->lang->line('info_description'),
            'create_card_button' => $this->lang->line('create_card_button'),
        );
        $this->load->view('view_main', $data);

        $this->lang->load('footer'); //, 'russian');
        $data = array(
            'menu_main' => $this->lang->line('menu_main'),
            'menu_create_card' => $this->lang->line('menu_create_card'),
            'menu_about' => $this->lang->line('menu_about'),
            'menu_send_feedback' => $this->lang->line('menu_send_feedback'),
        );
        $this->load->view('templates/footer', $data);
    }
} 