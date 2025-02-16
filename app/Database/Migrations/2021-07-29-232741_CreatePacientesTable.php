<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePacientesTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_paciente' => [
				'type' => 'INT',
				'constraint' => 4,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'foto_perfil' => [
				'type' => 'TEXT',
				'null' => true,
			],
			'nome_completo' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'nome_completo_mae' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'data_nascimento' => [
				'type' => 'DATE',
			],
			'cpf' => [
				'type' => 'VARCHAR',
				'constraint' => 11,
			],
			'cns' => [
				'type' => 'VARCHAR',
				'constraint' => 15
			],
			'cep' => [
				'type' => 'VARCHAR',
				'constraint' => 8
			],
			'logradouro' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
			'numero' => [
				'type' => 'INT',
				'constraint' => 4
			],
			'bairro' => [
				'type' => 'VARCHAR',
				'constraint' => 50
			],
			'cidade' => [
				'type' => 'VARCHAR',
				'constraint' => 50
			],
			'uf' => [
				'type' => 'VARCHAR',
				'constraint' => 2
			],
		]);
		$this->forge->addKey('id_paciente', true);
		$this->forge->createTable('pacientes');
	}

	public function down()
	{
		$this->forge->dropTable('pacientes');
	}
}
