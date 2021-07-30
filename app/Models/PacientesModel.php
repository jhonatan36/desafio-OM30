<?php

namespace App\Models;

use CodeIgniter\Model;

class PacientesModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'pacientes';
	protected $primaryKey           = 'id_paciente';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'foto_perfil',
		'nome_completo',
		'nome_completo_mae',
		'data_nascimento',
		'cpf',
		'cns'
	];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';
}
