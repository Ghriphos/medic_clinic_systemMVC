<?php
include_once ('../model/classes/Recepcionista.php');
include_once('dateFunctions.php');

session_start();

extract($_REQUEST, EXTR_SKIP);

if (isset($acao)) {
    if ($acao == "IncluirRecepcionista") {
        if (
            isset($nome) 
            && isset($phone) && isset($street)
            && isset($cpf) && isset($codRecepcionista)
            && isset($birthDate) && isset($cttemerg)
            && isset($horarioInicio) && isset($horarioFim) && isset($estadocivil)
        ) {
            $nome = htmlspecialchars_decode(strip_tags($nome));
            $phone = htmlspecialchars_decode(strip_tags($phone));
            $street = htmlspecialchars_decode(strip_tags($street));
            $cpf = htmlspecialchars_decode(strip_tags($cpf));
            $birthDate = htmlspecialchars_decode(strip_tags($birthDate));
            $cttemerg = htmlspecialchars_decode(strip_tags($cttemerg));
            $codRecepcionista = htmlspecialchars_decode(strip_tags($codRecepcionista));
            $horarioInicio = htmlspecialchars_decode(strip_tags($horarioInicio));
            $horarioFim = htmlspecialchars_decode(strip_tags($horarioFim));
            $estadocivil = htmlspecialchars_decode(strip_tags($estadocivil));

            if (!validar_data($birthDate)) {
                $_SESSION['msg'] = "Data invalida";
             }
            
            else{ 
            
            if (
                is_string($nome)&& is_numeric($phone)
                && is_string($street) && is_numeric($cpf) 
                && is_numeric($cttemerg) && validar_data($birthDate)
                && is_string($codRecepcionista) && is_string($estadocivil) && is_string($horarioInicio) && is_string($horarioFim)
                ) {
                    $birthDate = formatardataBancoEnvio($birthDate);
                    $recepcionista= new Recepcionista($nome, $phone, $street, $cpf, $birthDate, $cttemerg, $estadocivil, $codRecepcionista, $horarioInicio, $horarioFim);
                    if ($recepcionista->incluirRecepcionista()){
                        $_SESSION['msg'] = "\n" ."Recepcionista Incluida com sucesso !!";     
                    } else {

                       $_SESSION['msg'] =  "\n" ."Falha no INSERT! Mensagem de erro: '$msg'";
                    }
            } else {
                $_SESSION['msg'] = "Parametros informados são invalidos!!";
                
                }
            }
            $path = $_SERVER['HTTP_REFERER'];
            header("Location: $path");
        }
    }
}

if (isset($acao)) {
    if ($acao == "AlterarRecepcionista") {
        if (
            isset($nome) && isset($phone) 
            && isset($street) && isset($cpf)
            && isset($birthDate) && isset($cttemerg)
            && isset($codRecepcionista) && isset($horarioInicio) && isset($horarioFim)
            && isset($estadocivil)
        ) {
            $nome = htmlspecialchars_decode(strip_tags($nome));
            $phone = htmlspecialchars_decode(strip_tags($phone));
            $street = htmlspecialchars_decode(strip_tags($street));
            $cpf = htmlspecialchars_decode(strip_tags($cpf));
            $birthDate = htmlspecialchars_decode(strip_tags($birthDate));
            $cttemerg = htmlspecialchars_decode(strip_tags($cttemerg));
            $codRecepcionista = htmlspecialchars_decode(strip_tags($codRecepcionista));
            $horarioInicio = htmlspecialchars_decode(strip_tags($horarioInicio));
            $horarioFim = htmlspecialchars_decode(strip_tags($horarioFim));
            $estadocivil = htmlspecialchars_decode(strip_tags($estadocivil));

            if (!validar_data($birthDate)) {
                $_SESSION['msg'] = "Data invalida";
             }
            
            else{ 
            
            if (
                is_string($nome)&& is_numeric($phone)
                && is_string($street) && is_numeric($cpf) 
                && is_string($birthDate) && is_numeric($cttemerg)
                && validar_data($birthDate)
                && is_string($codRecepcionista) && is_string($estadocivil) && is_string($horarioInicio) && is_string($horarioFim)
                ) {
                    $birthDate = formatardataBancoEnvio($birthDate);
                    $recepcionista= new Recepcionista($nome, $phone, $street, $cpf, $birthDate, $cttemerg, $estadocivil, $codRecepcionista, $horarioInicio, $horarioFim);
                    if ($recepcionista->alterarRecepcionista()){
                        $_SESSION['msg'] = "\n" ."Recepcionista alterada com sucesso !!";     
                    } else {
                       $_SESSION['msg'] =  "\n" ."Falha no Alterar! Mensagem de erro: '$msg'";
                    }
            } else {
                $_SESSION['msg'] = "Parametros informados são invalidos!!";
                
                }
            }
            $path = $_SERVER['HTTP_REFERER'];
            header("Location: $path");
        }
    }
}
?>