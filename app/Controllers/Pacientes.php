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
		$img_dir = ROOTPATH.'public/assets/img/';

		return view('show', [
			'page_title' => 'Visualizar Paciente',
			'paciente' => $this->pacientesModel->find($id),
			'img_dir' => $img_dir
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

			$img_dir = ROOTPATH.'public/assets/img/';

			$rules = [
				'nome_completo' => ['label' => 'Nome Completo', 'rules' => 'required|max_length[100]'],
				'nome_completo_mae' => ['label' => 'Nome da Mãe', 'rules' => 'required|max_length[100]'],
				'data_nascimento' => ['label' => 'Data de Nascimento', 'rules' => 'required'],
				'nome_completo_mae' => ['label' => 'Nome da Mãe', 'rules' => 'required'],
				'cpf' => 'required|validar_cpf',
				'cns' => 'required|validar_cns',
				'cep' => ['label' => 'CEP', 'rules' => 'required'],
				'logradouro' => ['label' => 'Logradouro / Rua', 'rules' => 'required|max_length[100]'],
				'numero' => ['label' => 'Número', 'rules' => 'required'],
				'bairro' => ['label' => 'Bairro', 'rules' => 'required|max_length[50]'],
				'cidade' => ['label' => 'Cidade', 'rules' => 'required|max_length[50]'],
				'uf' => ['label' => 'UF', 'rules' => 'required|max_length[2]'],
			];

			if (! $this->validate($rules))
			{
				echo view('form', [
					'page_title' => 'Cadastrar Paciente',
					'validation' => $this->validator
				]);
			} else {

				$dados = $this->request->getPost();

				if ( $iamgeFile = $this->request->getFiles() ) {

					if ( $img = $iamgeFile['foto_perfil'] ) {

						if ( $img->isValid() && !$img->hasMoved() ) {

							$novoNome = $img->getRandomName();
							if ( $dados['id_paciente'] != null ) {
								$dados_old = $this->pacientesModel->find($dados['id_paciente']);
								if ( $dados_old['foto_perfil'] != null ) {
									unlink($img_dir.$dados_old['foto_perfil']);
								}
							}
							$img->move($img_dir, $novoNome);
							$dados['foto_perfil'] = $novoNome;
						}
					} 
				}

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
