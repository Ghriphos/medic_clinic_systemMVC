<?php

include_once ('../model/dao/ProntuarioDao.php');


class Prontuario{
    private $vacina;
    private $examepedido;
    private $examevisto;
    private $cirurgia;
    private $receita;
    private $codProntuario;


    //construtor
    public function _construct($vacina, $examepedido, $examevisto, $cirurgia, $receita, $codProntuario) {
    $this -> setVacina($vacina);
    $this -> setExamepedido($examepedido);
    $this -> setExamevisto($examevisto);
    $this -> setCirurgia($cirurgia);
    $this -> setReceita($receita);
    $this -> setCodProntuario($codProntuario);
    
}
    /**
     * Get the value of vacina
     */ 
    public function getVacina()
    {
        return $this->vacina;
    }

    /**
     * Set the value of vacina
     *
     * @return  self
     */ 
    public function setVacina($vacina)
    {
        $this->vacina = $vacina;

        return $this;
    }

    /**
     * Get the value of examepedido
     */ 
    public function getExamepedido()
    {
        return $this->examepedido;
    }

    /**
     * Set the value of examepedido
     *
     * @return  self
     */ 
    public function setExamepedido($examepedido)
    {
        $this->examepedido = $examepedido;

        return $this;
    }

    /**
     * Get the value of examevisto
     */ 
    public function getExamevisto()
    {
        return $this->examevisto;
    }

    /**
     * Set the value of examevisto
     *
     * @return  self
     */ 
    public function setExamevisto($examevisto)
    {
        $this->examevisto = $examevisto;

        return $this;
    }

    /**
     * Get the value of cirurgia
     */ 
    public function getCirurgia()
    {
        return $this->cirurgia;
    }

    /**
     * Set the value of cirurgia
     *
     * @return  self
     */ 
    public function setCirurgia($cirurgia)
    {
        $this->cirurgia = $cirurgia;

        return $this;
    }

    /**
     * Get the value of receita
     */ 
    public function getReceita()
    {
        return $this->receita;
    }

    /**
     * Set the value of receita
     *
     * @return  self
     */ 
    public function setReceita($receita)
    {
        $this->receita = $receita;

        return $this;
    }

    /**
     * Get the value of codProntuario
     */ 
    public function getCodProntuario()
    {
        return $this->codProntuario;
    }

    /**
     * Set the value of receita
     *
     * @return  self
     */ 
    public function setCodProntuario($codProntuario)
    {
        $this->codProntuario = $codProntuario;

        return $this;
    }

    public function incluirProntuario(){
        $prontuarioDao = new ProntuarioDao();
        if ($prontuarioDao->incluirProntuario($this)) {
            return true;
        }
        else{
            return false;
        }
    }
}
?>