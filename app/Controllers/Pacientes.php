<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PacientesModel;

class Pacientes extends BaseController
{
	private $pacientesModel;

	public function __constuct()
	{
		$this->pacientesModel = new PacientesModel();
	}

	public function index()
	{
		return view('pacientes', [
			'pacientes' => $this->userModel->findAll()
		]);
	}
}
