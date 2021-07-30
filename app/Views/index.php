<?= view('includes/header'); ?>

    <div class="container">
        <?= anchor('pacientes/create', 'Novo Paciente', ['class' => 'btn btn-sm btn-success mt-2']) ?>
        <table class="table table-default mt-2">
            <tr>
                <th>ID</th>
                <th>Nome Completo</th>
                <th>Nome Mãe</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
                <th>CNS</th>
                <th>Ações</th>
            </tr>
            <?php foreach($pacientes as $paciente): ?>
            <tr>
                <td><?=$paciente['id_paciente']?></td>
                <td><?=$paciente['nome_completo']?></td>
                <td><?=$paciente['nome_completo_mae']?></td>
                <td><?=$paciente['data_nascimento']?></td>
                <td><?=$paciente['cpf']?></td>
                <td><?=$paciente['cns']?></td>
                <td>
                    <?php echo anchor('pacientes/edit/' . $paciente['id_paciente'], 'Editar', ['class'=>'btn btn-sm btn-warning']) ?>
                    <?php echo anchor('pacientes/destroy/' . $paciente['id_paciente'], 'Excluir', ['id'=>'excluir', 'class'=>'btn btn-sm btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?= $pager->links() ?>
    </div>
    
</body>
</html>