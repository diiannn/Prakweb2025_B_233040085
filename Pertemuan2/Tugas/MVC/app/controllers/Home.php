<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('Home_model')->getUser();
        $this->view('patrial/header', $data);
        $this->view('home/index', $data);
        $this->view(view: 'patrial/footer');
    }
}