<?php

include_once ('Person.php');
include_once ('../model/dao/recepcionistaDao.php');

final class Recepcionista extends Person{
    protected $codRecepcionista;
    protected $horario;


        
        function __construct($nome, $phone, $street, $cpf, $birthDate, $cttemerg, $estadocivil, $codRecepcionista, $horario){
                parent::__construct($nome, $phone, $street, $cpf, $birthDate, $cttemerg, $estadocivil);
                $this -> setCodRecepcionista($codRecepcionista);
                $this -> setHorario($horario);
        }

        final public function alterarRecepcionista(){
                $recepcionistaDao = new RecepcionistaDao();
                if($recepcionistaDao->alterarRecepcionista($this)){
                        return true;
                }
                else{
                        return false;
                }
        }

        final public function incluirRecepcionista(){
                $recepcionistaDao = new RecepcionistaDao();
                if ($recepcionistaDao->incluirRecepcionista($this)) {
                        return true;
                }
                else{
                        return false;
                }
        }

    /**
     * Get the value of codRecepcionista
     */ 
    public function getCodRecepcionista()
    {
        return $this->codRecepcionista;
    }

    /**
     * Set the value of codRecepcionista
     *
     * @return  self
     */ 
    public function setCodRecepcionista($codRecepcionista)
    {
        $this->codRecepcionista = $codRecepcionista;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * @param mixed $horario
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;
    }

}
?>