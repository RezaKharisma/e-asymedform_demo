<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
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
        $this->load->view('dashboard/pasien/index');
        $this->load->view('layout/footer');
        $this->load->view('assets/js/phpJs/pasien-Js.php');
    }

    public function show()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('dashboard/pasien/tampilPasien');
        $this->load->view('layout/footer');
        $this->load->view('assets/js/phpJs/pasien-Js.php');
    }

    public function simpan()
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
                'field' => 'idDokter',
                'label' => 'idDokter',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Nama dokter tidak boleh kosong!',
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
            $this->session->set_flashdata('message', 'toastr.success("Data berhasil tersimpan")');
            $message = [
                'Message' => 'Success'
            ];
        }
        echo json_encode($message);
    }

    public function delete()
    {
        $message = [
            "Message" => "Success",
        ];
        echo json_encode($message);
    }

    public function edit()
    {
        $message = [
            "message" => "Success"
        ];
        echo json_encode($message);
    }

    public function view()
    {
        $message = [
            "Message" => "Success",
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
                'field' => 'idDokter',
                'label' => 'idDokter',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Nama dokter tidak boleh kosong!',
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
                'Message'  => "Success"
            ];
        }
        echo json_encode($message);
    }

    public function printData()
    {
        $this->load->view('dashboard/pasien/printPasien');
    }
}
