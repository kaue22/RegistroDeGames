<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function index()
	{

		permission();

		$this->load->model("games_model");
		$data["games"]  = $this->games_model->index();
		$data["title"] = "DashBoard de Games";

		//templates é o padrão do projeto sempre usar para carregar a página principal///
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
		//Fim da estrutura (VIEW) padrão//
		$this->load->view('pages/dashboard', $data);
	}
}
