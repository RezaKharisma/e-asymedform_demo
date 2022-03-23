<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
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
        $this->load->view('dashboard/settings/profile');
        $this->load->view('layout/footer');
        $this->load->view('assets/js/phpJs/profile-Js.php');
        $this->load->view('assets/js/phpJs/image-Js.php');
    }

    public function updateProfile()
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
                'rules' => 'trim|required|valid_email',
                'errors' => [
                    'required' => 'Email Telepon tidak boleh kosong!',
                    'valid_email' => 'Masukkan email dengan benar!',
                ]
            ],
        ];

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'toastr.error("Data gagal tersimpan")');
            $this->index();
        } else {
            $this->session->set_flashdata('message', 'toastr.success("Data berhasil tersimpan")');
            redirect('profile');
        }
    }

    public function updatePassword()
    {
        $config = [
            [
                'field' => 'passwordLama',
                'label' => 'Password Lama',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field tidak boleh kosong!'
                ]
            ],
            [
                'field' => 'passwordBaru',
                'label' => 'Password Baru',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field tidak boleh kosong!'
                ]
            ],
            [
                'field' => 'konfirmPassword',
                'label' => 'Konfirmasi Password',
                'rules' => 'trim|required|matches[passwordBaru]',
                'errors' => [
                    'required' => 'Field tidak boleh kosong!',
                    'matches' => 'Password harus sesuai!',
                ]
            ]
        ];

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'toastr.error("Mohon periksa form kembali!")');
            $this->index();
        } else {
            $this->session->set_flashdata('message', 'toastr.success("Password berhasil diubah")');
            redirect('profile/index');
        }
    }
}
