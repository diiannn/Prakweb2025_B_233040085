<?php

class About extends Controller
{
    public function index($nama = 'Dian', $pekerjaan = 'Bilioner', $umur = 32)
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About';
        $this->view('patrial/header', $data);
        $this->view('about/index', $data);
        $this->view(view: 'patrial/footer');
    }
    public function page()
    {
        $data['judul'] = 'Page';
        $this->view('patrial/header', $data);
        $this->view('about/page');
        $this->view(view: 'patrial/footer');
    }
}