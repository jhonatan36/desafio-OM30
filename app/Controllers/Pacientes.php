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

		return view('index', [
			'page_title' => 'Pacientes - lista',
			'pacientes' => $this->pacientesModel->paginate(15),
			'pager' => $this->pacientesModel->pager
		]);
	}

	public function create()
	{
		return view('form', [
			'page_title' => 'Cadastrar Paciente',
		]);
	}

	public function store()
	{
		try {

			$this->pacientesModel->save($this->request->getPost());
			return view('messages', [
				'page_title' => 'Mensagens',
				'message' => 'Paciente salvo com sucesso!'
			]);
		} catch ( ErrorException $e ) {
			echo 'Error '.$e->getMessage();
		}
	}

	public function edit($id)
	{
		return view('form', [
			'page_title' => 'Editar Paciente',
			'paciente' => $this->pacientesModel->find($id)
		]);
	}

	public function destroy($id)
	{
		try { 

			$this->pacientesModel->delete($id);
			echo view('messages', [
				'page_title' => 'Mensagens',
				'message' => 'Paciente excluído com sucesso!'
			]);
		} catch ( ErrorException $e ) {
			echo 'Error '.$e->getMessage();
		}
	}
}
