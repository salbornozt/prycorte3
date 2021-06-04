<?php

/**
 * Represents the class of the Tipo_tarjeta - DTO entity
 */

class Tipo_tarjeta{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the card to which it belongs
     *
     * @return int
     */ 
    private $cod_tipo_tarjeta;

    /**
     * House Name
     *
     * @return varchar
     */ 
    private $nombre_casa; 


    /**
     * Get the value of cod_tipo_tarjeta
     */ 
    public function getCod_tipo_tarjeta()
    {
        return $this->cod_tipo_tarjeta;
    }

    /**
     * Set the value of cod_tipo_tarjeta
     *
     * @return  self
     */ 
    public function setCod_tipo_tarjeta($cod_tipo_tarjeta)
    {
        $this->cod_tipo_tarjeta = $cod_tipo_tarjeta;

        return $this;
    }

    /**
     * Get the value of nombre_casa
     */ 
    public function getNombre_casa()
    {
        return $this->nombre_casa;
    }

    /**
     * Set the value of nombre_casa
     *
     * @return  self
     */ 
    public function setNombre_casa($nombre_casa)
    {
        $this->nombre_casa = $nombre_casa;

        return $this;
    }


}  