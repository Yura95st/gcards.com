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

        //Get random cover
        $cover = $this->cover_processor->getCover(1);
        $path = "";
        if ($cover != null) {
            $path = $cover->getPathOriginal();
        }

        $data = array(
            'path' => base_url() . $path
        );
        $this->load->view('view_create_card', $data);

        $this->lang->load('footer'); //, 'russian');
        $data = array(
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
        if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            //It is not ajax query
            show_404();
            exit();
        }

//        $_POST['card'] = '{"cover_id": 0,"blocks": [{"position": {"x": 0, "y": 0, "height": 0, "width": 0},"content": "This is ajax card 1"},{"position": {"x": 40, "y": 40, "height": 30, "width": 100},"content": "This is ajax card 2"}]}';

        $this->lang->load('card_controller');

        $result_json = array('success' => false);

        $card = new Card();
        $card->fromJSON($this->input->post('card'));

        $cardId = $this->card_processor->publishCard($card);

        if ($cardId != false) {
            $result_json['success'] = true;
            $result_json['msg'] = $this->lang->line('info_card_publish_success');
            $result_json['url'] = base_url() . '/card_controller/view/' . $card->getHashCode();
        } else {
            $result_json['msg'] = $this->lang->line('info_card_publish_error');
        }

        echo json_encode($result_json);
    }
}
