<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller
{
    function __construct()
    {
        //Call the Controller constructor
        parent::__construct();

        $this->output->enable_profiler(TRUE);
        $this->load->model('processors/page_processor');
    }

    public function index()
    {
        //Load header view
        $this->page_processor->loadHeader();

        $this->lang->load('about');//, 'russian');
        $data = array(
            'headline' => $this->lang->line('info_headline'),
            'about_author' => $this->lang->line('info_about_author')
        );
        $this->load->view('view_about', $data);

        //Load footer view
        $this->page_processor->loadFooter();
    }
}