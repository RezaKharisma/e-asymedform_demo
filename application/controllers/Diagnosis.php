<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diagnosis extends CI_Controller
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
        $this->load->view('dashboard/dokter/diagnosis');
        $this->load->view('layout/footer');
        $this->load->view('assets/js/phpJs/diagnosis-Js.php');
    }

    public function simpan()
    {
        $config = [
            [
                'field' => 'diagnosis',
                'label' => 'Diagnosis',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Diagnosis tidak boleh kosong!'
                ]
            ]
        ];

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $message = [
                'Message' => "Error",
                'Error' => $this->form_validation->error_array()
            ];
        } else {
            $message = [
                'Message' => "Success"
            ];
        }
        echo json_encode($message);
    }

    public function delete()
    {
        $message = [
            "Message" => "Success"
        ];
        echo json_encode($message);
    }

    public function update()
    {
        $config = [
            [
                'field' => 'diagnosisUpdate',
                'label' => 'DiagnosisUpdate',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Diagnosis tidak boleh kosong!'
                ]
            ]
        ];

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $message = [
                'Message' => "Error",
                'Error' => $this->form_validation->error_array()
            ];
        } else {
            $message = [
                'Message' => "Success"
            ];
        }
        echo json_encode($message);
    }
}
