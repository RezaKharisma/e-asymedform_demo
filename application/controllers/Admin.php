<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('dashboard/home');
		$this->load->view('layout/footer');
		$this->load->view('assets/js/phpJs/dashboard-Js.php');
	}
}
