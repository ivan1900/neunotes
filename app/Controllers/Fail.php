<?php namespace App\Controllers;

class Fail extends BaseController
{
    public function index()
    {
        $this->renderView();
    }

    private function renderView()
    {
        echo view('headers/header');
		echo view('fail');
		echo view('footers/footer');
    }
}