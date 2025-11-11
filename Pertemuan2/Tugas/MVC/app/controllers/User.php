<?php

class User extends Controller
{
    public function index()
    {

        $data['judul'] = 'Daftar Pengguna';
        $data['usr'] = $this->model('User_model')->getAllUSer();
        $this->view('patrial/header', $data);
        $this->view('user/index', $data);
        $this->view('patrial/footer');
    }

    public function detail($id)
    {

        $data['judul'] = 'Detail Pengguna';
        $data['usr'] = $this->model('User_model')->getUserById($id);
        $this->view('patrial/header', $data);
        $this->view('user/detail', $data);
        $this->view('patrial/footer');
    }


    public function tambah()
    {

        if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function hapus($id)
    {

        if ($this->model('User_model')->hapusDataUser($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('User_model')->getUserById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('User_model')->ubahDataUser($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }

    }

    public function cari()
    {

        $data['judul'] = 'Daftar Pengguna';
        $data['usr'] = $this->model('User_model')->cariDataUser();
        $this->view('patrial/header', $data);
        $this->view('user/index', $data);
        $this->view('patrial/footer');

    }
}