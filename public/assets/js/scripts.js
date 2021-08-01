$(document).ready(function(){
    // carrega mascara dos campos
    $('#cep').mask('99999-999');
    $('#cpf').mask('999.999.999-99');
    $('#data_nascimento').mask('99/99/9999');


    //busca cep - VIACEP
    $('#cep').blur(function(){

        let cep = $('#cep').val().replace(/([^\d])+/gim, '');

        $.ajax({
            url: 'https://viacep.com.br/ws/'+cep+'/json/',
            type: 'GET',
            success: function(result){
                $('#logradouro').val(result.logradouro);
                $('#bairro').val(result.bairro);
                $('#cidade').val(result.localidade);
                $('#uf').val(result.uf);
            }
        });
    });

    //confirma exclusão do registro
    $('#excluir').click(function(){
        return confirm('Deseja excluir este registro?');
    })
});