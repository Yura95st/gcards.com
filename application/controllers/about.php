<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller
{
    function __construct()
    {
        //Call the Controller constructor
        parent::__construct();

        //for debugging aims only
        //$this->output->enable_profiler(TRUE);

        //Set Language
        $this->load->model('processors/lang_processor');
        $this->lang_processor->setLanguage();

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