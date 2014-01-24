<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller
{
    function __construct()
    {
        //Call the Controller constructor
        parent::__construct();

        $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $this->load->view('templates/meta');
        $this->load->view('templates/header');

        $this->lang->load('about');//, 'russian');
        $data = array(
            'headline' => $this->lang->line('info_headline'),
            'about_author' => $this->lang->line('info_about_author')
        );
        $this->load->view('view_about', $data);

        $this->lang->load('footer');//, 'russian');
        $data = array(
            'menu_main' => $this->lang->line('menu_main'),
            'menu_create_card' => $this->lang->line('menu_create_card'),
            'menu_about' => $this->lang->line('menu_about'),
            'menu_send_feedback' => $this->lang->line('menu_send_feedback'),
        );
        $this->load->view('templates/footer', $data);
    }
}