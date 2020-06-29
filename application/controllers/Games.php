<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Games extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model("games_model");
	}
	public function index()
	{

		$data["games"]  = $this->games_model->index();

		$data["title"] = "Games";

		//Carregamento de view //
		//templates é o padrão do projeto sempre usar para carregar a página principal///
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);

		//Fim da estrutura padrão//
		$this->load->view('pages/games', $data);
	}

	public function new()
	{

		$data["title"] = "Games";
		//templates é o padrão do projeto sempre usar para carregar a página principal///
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);

		//Fim da estrutura padrão//
		$this->load->view('pages/form-games', $data);
	}

	public function store()
	{
		$game = $_POST;
		$game["user_id"] = '1';

		$this->games_model->store($game);
		redirect("dashboard");
	}

	public function edit($id)
	{
		$data["game"]  = $this->games_model->show($id);

		$data["title"] = "Editar Game";
		/*print'<pre>';
		print_r($data);
		
		print'<pre>';
		exit();*/
		//Carregamento de view //
		//templates é o padrão do projeto sempre usar para carregar a página principal///
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);

		//Fim da estrutura padrão//
		$this->load->view('pages/form-games', $data);
	}

	public function update($id)
	{
		$game = $_POST;
		$this->games_model->update($id, $game);
		redirect("games");
	}

	public function delete($id)
	{
		$this->games_model->destroy($id);

		redirect("games");
	}
}
