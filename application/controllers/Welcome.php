<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('akun_model');
		$this->load->model('crud_model');
	}

	public function index()
	{
		$data['array_jadwal'] = $this->crud_model->mengambil_data('jadwal');

		$this->load->view('home_index',$data);
	}
}
