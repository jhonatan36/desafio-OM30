<?= view('includes/header'); ?>

    <?= form_open('pacientes/store', ['class'=>'form-inline']) ?>
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
            <div class="row">
                <div class="col-md-4">
                    <label for="data_nascimento">Data de Nascimento<span class="text-danger">*</span>:</label>
                    <input type="text" name="data_nascimento" id="data_nascimento" class="form-control" value="<?= isset($paciente) ? $paciente['data_nascimento'] : '' ?>" />
                </div>
                <div class="col-md-4">
                    <label for="cpf">CPF<span class="text-danger">*</span>:</label>
                    <input type="text" name="cpf" id="cpf" class="form-control" value="<?= isset($paciente) ? $paciente['cpf'] : '' ?>" />
                </div>
                <div class="col-md-4">
                    <label for="cns">CNS<span class="text-danger">*</span>:</label>
                    <input type="text" name="cns" id="cns" class="form-control" value="<?= isset($paciente) ? $paciente['cns'] : '' ?>" />
                </div>
            </div>
        </div>
        <div class="form-group">
        <div class="row">
            <div class="col-md-2">
                <label for="cep">CEP<span class="text-danger">*</span>:</label>
                <input type="text" name="cep" id="cep" class="form-control" value="<?= isset($paciente) ? $paciente['cep'] : '' ?>" />
            </div>
            <div class="col-md-4">
                <label for="logradouro">Logradouro<span class="text-danger">*</span>:</label>
                <input type="text" name="logradouro" id="logradouro" class="form-control" value="<?= isset($paciente) ? $paciente['logradouro'] : '' ?>" />
            </div>
            <div class="col-md-1">
                <label for="numero">Número<span class="text-danger">*</span>:</label>
                <input type="text" name="numero" id="numero" class="form-control" value="<?= isset($paciente) ? $paciente['numero'] : '' ?>" />
            </div>
            <div class="col-md-2">
                <label for="bairro">Bairro<span class="text-danger">*</span>:</label>
                <input type="text" name="bairro" id="bairro" class="form-control" value="<?= isset($paciente) ? $paciente['bairro'] : '' ?>" />
            </div>
            <div class="col-md-2">
                <label for="cidade">Cidade<span class="text-danger">*</span>:</label>
                <input type="text" name="cidade" id="cidade" class="form-control" value="<?= isset($paciente) ? $paciente['cidade'] : '' ?>" />
            </div>
            <div class="col-md-1">
                <label for="uf">UF<span class="text-danger">*</span>:</label>
                <input type="text" name="uf" id="uf" class="form-control" value="<?= isset($paciente) ? $paciente['uf'] : '' ?>" />
            </div>
        </div>
        <input type="hidden" name="id_paciente" value="<?= isset($paciente) ? $paciente['id_paciente'] : '' ?>" />
        
        <p><span class="text-danger">*</span>Obrigatórios</p>
        <button type="submit" class="btn btn-sm btn-success float-end">Enviar</button>
    </div>
    <?= form_close() ?>
    

<script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
<script src="<?= base_url('assets/js/scripts.js') ?>"></script>
</body>
</html>