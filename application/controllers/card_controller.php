<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Card_Controller extends CI_Controller
{
    public function create()
    {
        $this->load->view('templates/meta');
        $this->load->view('templates/header');

        $this->load->model('resources');
        $data = array(
            'img' => base_url().$this->resources->background['23']
        );
        $this->load->view('view_create_card', $data);

        $this->lang->load('footer');//, 'russian');
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
        if ($cardHashCode == null) {
            //Card not found
            show_404();
            return;
        }

        $this->load->model('card_processor');

        $card = $this->card_processor->getCardByHashCode($cardHashCode);

        if ($card == null) {
            //Card not found
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
