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

	public function show($id)
	{
		return view('show', [
			'page_title' => 'Visualizar Paciente',
			'paciente' => $this->pacientesModel->find($id)
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

			$rules = [
				'nome_completo' => 'required',
				'cpf' => 'validar_cpf',
				'cns' => 'validar_cns'
			];

			if (! $this->validate($rules))
			{
				echo view('form', [
					'page_title' => 'Cadastrar Paciente',
					'validation' => $this->validator
				]);
			} else {

				$dados = $this->request->getPost();

				$dados['data_nascimento'] = implode('-', array_reverse(explode('/',$dados['data_nascimento'])));
				$dados['cpf'] = preg_replace("/[^0-9]/", "", $dados['cpf']);
				$dados['cep'] = preg_replace("/[^0-9]/", "", $dados['cep']);

				$this->pacientesModel->save($dados);
				return view('messages', [
					'page_title' => 'Mensagens',
					'message' => 'Paciente salvo com sucesso!'
				]);
			}
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
