<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{
    protected $data = [];

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('dashboard/rekap/index');
        $this->load->view('layout/footer');
        $this->load->view('assets/js/phpJs/rekap-Js.php');
    }
}
