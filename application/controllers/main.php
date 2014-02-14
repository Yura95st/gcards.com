<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
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

        $this->lang->load('main');//, 'russian');

        $data = array(
            'first_slide_text' => $this->lang->line('first_slide_text'),
            'second_slide_text' => $this->lang->line('second_slide_text'),

            'demo_slide_header' => $this->lang->line('demo_slide_header'),
            'demo_slide_header_info' => $this->lang->line('demo_slide_header_info'),

            'left_card_header' => $this->lang->line('demo_slide_left_card_header'),
            'left_card_content' => $this->lang->line('demo_slide_left_card_content'),

            'middle_card_header' => $this->lang->line('demo_slide_middle_card_header'),
            'middle_card_content' => $this->lang->line('demo_slide_middle_card_content'),

            'right_card_header' => $this->lang->line('demo_slide_right_card_header'),
            'right_card_content' => $this->lang->line('demo_slide_right_card_content'),

            'create_card_button' => $this->lang->line('demo_slide_create_card_button'),

            'tools_headers' => $this->lang->line('tools_headers'),
            'tools_style' => $this->lang->line('tools_style'),
            'tools_hot_keys' => $this->lang->line('tools_hot_keys'),
            'tools_size_color' => $this->lang->line('tools_size_color'),
            'tools_alignment' => $this->lang->line('tools_alignment'),
            'tools_resize' => $this->lang->line('tools_resize'),
            'tools_drag' => $this->lang->line('tools_drag'),
            'tools_rotate' => $this->lang->line('tools_rotate')
        );

        $this->load->view('view_main', $data);

        //Load footer view
        $data = array(
            'isMainPage' => true,
        );
        $this->page_processor->loadFooter($data);
    }
} 