<?php

namespace App\Helpers;

class Helper{

    public function validar_cpf(string $cpf, string &$error = null)
    {
 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            $error = 'CPF inválido.';
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            $error = 'CPF inválido.';
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                $error = 'CPF inválido.';
                return false;
            }
        }
        return true;
    }

    public function validar_cns(string $value, string &$error = null)
    {
        // Retira todos os caracteres que nao sejam 0-9
        $cns = preg_replace('/[^0-9]/', '', $value);
        
        // Retorna falso se for diferente que 15 caracteres
        if ((strlen(trim($cns))) != 15) { 
            //retorna erro
            $error = 'CNS inválido.';
            return false;
        }
        
        // Retorna falso se houver letras no cns
        if (!(preg_match('/[0-9]/',$cns)))
        {
            //retorna erro
            $error = 'CNS inválido.';
            return false;
        }
        
        /**
         * executa a validação de acordo a inical do numero.
         * numeros de 1 a 2 validacao1
         * numeros de 7 a 9 validacao2
         * retorna falso para qualquer outra inicial
         */
        $acao = substr($cns,0,1);
        switch ($acao)
        {
            case '1':
            case '2': $ret = $this->validacao1($cns); break;
            case '7':
            case '8':
            case '9': $ret = $this->validacao2($cns); break;
            default: $ret = false;
        }
        
        if ( !$ret ) {
            
            $error = 'CNS inválido.';
        }
        return $ret;
    }
    
    private function validacao1($cns)
    {
        $pis = substr($cns,0,11);
        $soma = 0;
        for ( $i = 0, $j = strlen($pis), $k = 15; $i < $j; $i++, $k-- )
        {
            $soma += $pis[$i] * $k;
        }
        $dv = 11 - fmod($soma, 11);
        $dv = ($dv != 11) ? $dv : '0'; // retorna '0' se for igual a 11
        if ( $dv == 10 )
        {
            $soma += 2;
            $dv = 11 - fmod($soma, 11);
            $resultado = $pis.'001'.$dv;
        }
        else
        {
            $resultado = $pis.'000'.$dv;
        }
        if ( $cns != $resultado )
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    
    private function validacao2($cns)
    {
        $soma = 0;
        for ( $i = 0, $j = strlen($cns), $k = $j; $i < $j; $i++, $k-- )
        {
            $soma += $cns[$i] * $k;
        }
        return $soma % 11 == 0 && $j == 15;
    }
}