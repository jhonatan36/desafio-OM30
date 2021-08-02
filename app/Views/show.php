<?= view('includes/header'); ?>

    <div class="container mt-5">
        <?= anchor(base_url(), 'Votlar', ['class'=>'btn btn-sm btn-info mb-2']) ?>
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <figure class="figure">
                    <img src="<?=base_url('assets/img/'.$paciente['foto_perfil'])?>" class="img-thumbnail img-fluid rounded" alt="Imagem Perfil Paciente">
                    <figcaption class="figure-caption">Imagem de Perfil do Paciente.</figcaption>
                </figure>
            </div>
        </div>
        <div class="form-group">
            <label for="nome_completo">Nome Completo:</label>
            <input type="text" name="nome_completo" id="nome_completo" class="form-control" value="<?= isset($paciente) ? $paciente['nome_completo'] : '' ?>" readonly />
        </div>
        <div class="form-group">
            <label for="nome_completo_mae">Nome da Mãe:</label>
            <input type="text" name="nome_completo_mae" id="nome_completo_mae" class="form-control" value="<?= isset($paciente) ? $paciente['nome_completo_mae'] : '' ?>" readonly />
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label for="data_nascimento">Data de Nascimento:</label>
                    <input type="text" name="data_nascimento" id="data_nascimento" class="form-control" value="<?= isset($paciente) ? implode('/',array_reverse(explode('-',$paciente['data_nascimento']))) : '' ?>" readonly />
                </div>
                <div class="col-md-4">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" id="cpf" class="form-control" value="<?= isset($paciente) ? $paciente['cpf'] : '' ?>" readonly />
                </div>
                <div class="col-md-4">
                    <label for="cns">CNS:</label>
                    <input type="text" name="cns" id="cns" class="form-control" value="<?= isset($paciente) ? $paciente['cns'] : '' ?>" readonly />
                </div>
            </div>
        </div>
        <div class="form-group">
        <div class="row">
            <div class="col-md-2">
                <label for="cep">CEP:</label>
                <input type="text" name="cep" id="cep" class="form-control" value="<?= isset($paciente) ? $paciente['cep'] : '' ?>" readonly />
            </div>
            <div class="col-md-4">
                <label for="logradouro">Logradouro:</label>
                <input type="text" name="logradouro" id="logradouro" class="form-control" value="<?= isset($paciente) ? $paciente['logradouro'] : '' ?>" readonly />
            </div>
            <div class="col-md-1">
                <label for="numero">Número:</label>
                <input type="text" name="numero" id="numero" class="form-control" value="<?= isset($paciente) ? $paciente['numero'] : '' ?>" readonly />
            </div>
            <div class="col-md-2">
                <label for="bairro">Bairro:</label>
                <input type="text" name="bairro" id="bairro" class="form-control" value="<?= isset($paciente) ? $paciente['bairro'] : '' ?>" readonly />
            </div>
            <div class="col-md-2">
                <label for="cidade">Cidade:</label>
                <input type="text" name="cidade" id="cidade" class="form-control" value="<?= isset($paciente) ? $paciente['cidade'] : '' ?>" readonly />
            </div>
            <div class="col-md-1">
                <label for="uf">UF:</label>
                <input type="text" name="uf" id="uf" class="form-control" value="<?= isset($paciente) ? $paciente['uf'] : '' ?>" readonly />
            </div>
        </div>
        <input type="hidden" name="id_paciente" value="<?= isset($paciente) ? $paciente['id_paciente'] : '' ?>" readonly />
    </div>
    

<script src="<?= base_url('assets/js/jquery-3.6.0.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.mask.min.js') ?>"></script>
<script src="<?= base_url('assets/js/scripts.js') ?>"></script>
</body>
</html>