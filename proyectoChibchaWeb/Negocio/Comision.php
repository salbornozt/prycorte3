<?php

/**
 * Represents the class of the COMISION - DTO entity
 */

class Comision{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the comision
     *
     * @return int
     */ 
    private $cod_comision;

    /**
     * number of domains
     *
     * @return int
     */ 
    private $num_dominios; 

    /**
     * paid value for domains
     *
     * @return int
     */ 
    private $valor_pago;
     


    /**
     * Get the value of cod_comision
     */ 
    public function getCod_comision()
    {
        return $this->cod_comision;
    }

    /**
     * Set the value of cod_comision
     *
     * @return  self
     */ 
    public function setCod_comision($cod_comision)
    {
        $this->cod_comision = $cod_comision;

        return $this;
    }

    /**
     * Get the value of num_dominios
     */ 
    public function getNum_dominios()
    {
        return $this->num_dominios;
    }

    /**
     * Set the value of num_dominios
     *
     * @return  self
     */ 
    public function setNum_dominios($num_dominios)
    {
        $this->num_dominios = $num_dominios;

        return $this;
    }

    /**
     * Get the value of valor_pago
     */ 
    public function getValor_pago()
    {
        return $this->valor_pago;
    }

    /**
     * Set the value of valor_pago
     *
     * @return  self
     */ 
    public function setValor_pago($valor_pago)
    {
        $this->valor_pago = $valor_pago;

        return $this;
    }
}  