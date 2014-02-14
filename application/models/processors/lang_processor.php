<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'models/resources/fields_names.php');

class Lang_Processor extends CI_Model
{
    private $langCode = '';
    private $defaultLangCode = 'en';
    private $langArray = array(
        'en' => 'english',
        'ru' => 'russian',
        'ua' => 'russian'
    );
    private $LANG_FIELD = 'lang';

    function __construct()
    {
        //Call the Model constructor
        parent::__construct();

        $this->load->library('session');
    }

    function setLanguage()
    {
        $this->detectLanguage();

        $this->config->set_item('language', $this->langArray[$this->langCode]);

        $this->setLangCookie();
    }

    private function detectLanguage()
    {
        // Check Cookies
        $langCode = $this->session->userdata(FieldsNames::$SESSION_LANG);

        // Language is not set or is unsupported
        if (!$langCode || !array_key_exists($langCode, $this->langArray)) {
            // Check browser language
            $langString = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
            $langCode = substr($langString, 0, 2);

            // If language is not supported set it to default
            $this->langCode = array_key_exists($langCode, $this->langArray) ? $langCode : $this->defaultLangCode;
        }
        else {
            $this->langCode = $langCode;
        }
    }

    private function setLangCookie()
    {
        $this->session->set_userdata(FieldsNames::$SESSION_LANG, $this->langCode);
    }

    public function changeLanguage($langCode)
    {
        if (!$langCode || !array_key_exists($langCode, $this->langArray)) {
            return false;
        }

        $this->langCode = $langCode;
        $this->setLangCookie();

        return true;
    }
}