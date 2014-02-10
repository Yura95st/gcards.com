<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
    function __construct()
    {
        //Call the Controller constructor
        parent::__construct();

        //for debugging aims only
        $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $this->load->view('templates/meta');
        $this->load->view('templates/header');

        $this->lang->load('main'); //, 'russian');

        $data = array(
            'first_slide_text' => $this->lang->line('first_slide_text'),
            'second_slide_text' => $this->lang->line('second_slide_text'),
            'third_slide_text' => $this->lang->line('third_slide_text')
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