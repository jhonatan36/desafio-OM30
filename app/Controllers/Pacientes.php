<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PacientesModel;

class Pacientes extends BaseController
{
	private $pacientesModel;

	public function __construct()
	{
		$this->pacientesModel = new PacientesModel;
	}

	public function index()
	{

		return view('pacientes', [
			'pacientes' => $this->pacientesModel->paginate(15),
			'pager' => $this->pacientesModel->pager
		]);
	}
}
