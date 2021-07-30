<?= view('includes/header'); ?>

    <?= form_open('pacientes/store') ?>
    <div class="container mt-5">
        <?= anchor(base_url(), 'Votlar', ['class'=>'btn btn-sm btn-info mb-2']) ?>
        <div class="form-group">
            <label for="foto_perfil">Foto Perfil:</label>
            <input type="file" name="foto_perfil" id="foto_perfil" class="form-control" />
        </div>
        <div class="form-group">
            <label for="nome_completo">Nome Completo<span class="text-danger">*</span>:</label>
            <input type="text" name="nome_completo" id="nome_completo" class="form-control" value="<?= isset($paciente) ? $paciente['nome_completo'] : '' ?>" />
        </div>
        <div class="form-group">
            <label for="nome_completo_mae">Nome da Mãe<span class="text-danger">*</span>:</label>
            <input type="text" name="nome_completo_mae" id="nome_completo_mae" class="form-control" value="<?= isset($paciente) ? $paciente['nome_completo_mae'] : '' ?>" />
        </div>
        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento<span class="text-danger">*</span>:</label>
            <input type="text" name="data_nascimento" id="data_nascimento" class="form-control" value="<?= isset($paciente) ? $paciente['data_nascimento'] : '' ?>" />
        </div>
        <div class="form-group">
            <label for="cpf">CPF<span class="text-danger">*</span>:</label>
            <input type="text" name="cpf" id="cpf" class="form-control" value="<?= isset($paciente) ? $paciente['cpf'] : '' ?>" />
        </div>
        <div class="form-group">
            <label for="cns">CNS<span class="text-danger">*</span>:</label>
            <input type="text" name="cns" id="cns" class="form-control" value="<?= isset($paciente) ? $paciente['cns'] : '' ?>" />
        </div>
        <input type="hidden" name="id_paciente" value="<?= isset($paciente) ? $paciente['id_paciente'] : '' ?>" />
        
        <p><span class="text-danger">*</span>Obrigatórios</p>
        <button type="submit" class="btn btn-sm btn-success float-end">Enviar</button>
    </div>
    <?= form_close() ?>
    
</body>
</html>