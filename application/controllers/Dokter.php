<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
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
        $this->load->view('dashboard/dokter/index');
        $this->load->view('layout/footer');
        $this->load->view('assets/js/phpJs/dokter-Js.php');
        $this->load->view('assets/js/phpJs/image-Js.php');
    }

    public function show()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('dashboard/dokter/tampilDokter');
        $this->load->view('layout/footer');
        $this->load->view('assets/js/phpJs/dokter-Js.php');
    }

    public function simpan()
    {
        $this->load->helper('dokter_helper');

        $config = [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong!'
                ]
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong!'
                ]
            ],
            [
                'field' => 'nomorTelepon',
                'label' => 'Nomor Telepon',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Nomor Telepon tidak boleh kosong!'
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|valid_emails',
                'errors' => [
                    'required' => 'Email tidak boleh kosong!',
                    'valid_email' => 'Bukan email yang benar',
                    'valid_emails' => 'Bukan email yang benar'
                ]
            ],
            [
                'field' => 'jenisKelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Jenis Kelamin tidak boleh kosong!',
                ]
            ],
            [
                'field' => 'tanggalLahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Tanggal lahir tidak boleh kosong!',
                ]
            ],
            [
                'field' => 'umur',
                'label' => 'Umur',
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => 'Umur tidak boleh kosong!',
                    'numeric' => 'Umur harus angka saja',
                ]
            ],
            [
                'field' => 'pendidikan',
                'label' => 'Pendidikan',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Pendidikan tidak boleh kosong!',
                ]
            ]
        ];
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $data = [
                'Message' => "Error",
                'Error' => $this->form_validation->error_array(),
            ];
            echo json_encode($data);
        } else {
            $message = [
                'Message' => "Success",
            ];
            echo json_encode($message);
        }
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
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong!'
                ]
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong!'
                ]
            ],
            [
                'field' => 'nomorTelepon',
                'label' => 'Nomor Telepon',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Nomor Telepon tidak boleh kosong!'
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|valid_emails',
                'errors' => [
                    'required' => 'Email tidak boleh kosong!',
                    'valid_email' => 'Bukan email yang benar',
                    'valid_emails' => 'Bukan email yang benar'
                ]
            ],
            [
                'field' => 'jenisKelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Jenis Kelamin tidak boleh kosong!',
                ]
            ],
            [
                'field' => 'tanggalLahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Tanggal lahir tidak boleh kosong!',
                ]
            ],
            [
                'field' => 'umur',
                'label' => 'Umur',
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => 'Umur tidak boleh kosong!',
                    'numeric' => 'Umur harus angka saja',
                ]
            ],
            [
                'field' => 'pendidikan',
                'label' => 'Pendidikan',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Pendidikan tidak boleh kosong!',
                ]
            ]
        ];

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $message = [
                'Message' => "Error",
                'Error' => $this->form_validation->error_array(),
            ];
            echo json_encode($message);
        } else {
            $message = [
                'Message' => "Success",
            ];
            echo json_encode($message);
        }
    }
}
