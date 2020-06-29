<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends CI_Controller
{
	public function index()
	{
		$data["title"] = "Sign-up de Games";
		//Fim da estrutura (VIEW) padrão//
		$this->load->view('pages/signup', $data);
	}

	public function store()
	{
		$this->load->model("users_model");
		
		$user = array(
			"name" => $_POST["name"],
			"country" => $_POST["country"],
			"email" => $_POST["email"],
			"password" => md5($_POST["password"])
		);

		$this->users_model->store($user);

		redirect("login");
	}
}
