<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lang_Controller extends CI_Controller
{
    function __construct()
    {
        //Call the Controller constructor
        parent::__construct();

        //Set Language
        $this->load->model('processors/lang_processor');
    }

    public function changeLang()
    {
        if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            //It is not ajax query
            show_404();
            exit();
        }

        $result_json = array('success' => false);

        if ($this->lang_processor->changeLanguage($this->input->post('lang')) != false) {
            $result_json['success'] = true;
        }

        echo json_encode($result_json);
    }
}
