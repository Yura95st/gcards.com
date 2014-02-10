<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Card_Controller extends CI_Controller
{
    function __construct()
    {
        //Call the Controller constructor
        parent::__construct();

        //for debugging aims only
        $this->output->enable_profiler(TRUE);

        $this->load->model('processors/cover_processor');
        $this->load->model('processors/card_processor');
    }

    public function create()
    {
        $this->load->view('templates/meta');
        $this->load->view('templates/header');

        //Load toolbar view
        $this->load->view('templates/toolbar');

        //Load createCard view
        $this->load->view('view_create_card');

        //Build data.js file
        $this->lang->load('data_js');
        $data = array(
            'card_publish_error' => $this->lang->line('card_publish_error'),
            'card_init_text' => $this->lang->line('card_init_text'),
            'card_publish_success' => $this->lang->line('card_publish_success'),
            'cover_picker' => $this->lang->line('cover_picker'),
            'card_post_created_window' => $this->lang->line('card_post_created_window'),
        );

        //Get all covers
        $coversArray = array();
        $allCovers = $this->cover_processor->getAllCovers();

        array_push($coversArray, $allCovers);

        //Get covers, sorting by its partition
        for ($i = 1, $count = sizeof($data['cover_picker']['menu']); $i < $count; $i++) {
            array_push($coversArray, $this->cover_processor->getCoversFromArrayByPartitionId($allCovers, $i));
        }

        $data['coversArray'] = $coversArray;

        $this->load->view('templates/data_js', $data);

        //Load footer view
        $this->lang->load('footer'); //, 'russian');

        $data = array(
            'createPage' => true,
            'menu_main' => $this->lang->line('menu_main'),
            'menu_create_card' => $this->lang->line('menu_create_card'),
            'menu_about' => $this->lang->line('menu_about'),
            'menu_send_feedback' => $this->lang->line('menu_send_feedback'),
        );

        $this->load->view('templates/footer', $data);
    }

    public function view($cardHashCode = null)
    {
        $card = $this->card_processor->getCardByHashCode($cardHashCode);

        if ($card == null) {
            //Card not found
            echo "Card not found";
            show_404();
            return;
        }

        $this->load->view('templates/meta');
        $this->load->view('templates/header');

        $data = array(
            'card' => $card,
            'isCreator' => true,
        );
        $this->load->view('view_view_card', $data);

        $this->lang->load('footer'); //, 'russian');
        $data = array(
            'menu_main' => $this->lang->line('menu_main'),
            'menu_create_card' => $this->lang->line('menu_create_card'),
            'menu_about' => $this->lang->line('menu_about'),
            'menu_send_feedback' => $this->lang->line('menu_send_feedback'),
        );

        $this->load->view('templates/footer', $data);
    }

    public function publish()
    {
        $this->output->enable_profiler(FALSE);

        if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            //It is not ajax query
            show_404();
            exit();
        }

        $this->lang->load('card_controller');

        $result_json = array('success' => false);

        $card = new Card();
        $card->fromJSON($this->input->post('card'));

        $cardId = $this->card_processor->publishCard($card);

        if ($cardId != false) {
            $result_json['success'] = true;
            $result_json['url'] = base_url() . 'card_controller/view/' . $card->getHashCode();
        }

        echo json_encode($result_json);
    }

//    public function uploadCover()
//    {
//        $this->output->enable_profiler(false);
//        $this->cover_processor->uploadCover();
//
//        return true;
//    }

    public function newCovers()
    {
        $this->output->enable_profiler(true);
        $this->cover_processor->createNewCoversFromFiles();
    }
}
