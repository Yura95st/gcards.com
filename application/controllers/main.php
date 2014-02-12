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
        $this->load->model('processors/page_processor');
    }

    public function index()
    {
        //Load header view
        $this->page_processor->loadHeader();

        $this->lang->load('main'); //, 'russian');

        $data = array(
            'first_slide_text' => $this->lang->line('first_slide_text'),
            'second_slide_text' => $this->lang->line('second_slide_text'),
            'third_slide_text' => $this->lang->line('third_slide_text')
        );

        $this->load->view('view_main', $data);

        //Load footer view
        $this->page_processor->loadFooter();
    }
} 