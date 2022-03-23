<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pendapatan extends CI_Controller
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
        $this->load->view('dashboard/pendapatan/index');
        $this->load->view('layout/footer');
        $this->load->view('assets/js/phpJs/pendapatan-Js.php');
    }
}
