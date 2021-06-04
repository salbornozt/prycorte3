<?php

/**
 * Represents the class of the CategoriaDistribuidor - DTO entity
 */

class CategoriaDistribuidor{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code for the distributor category
     *
     * @return int
     */ 
    private $cod_categoria_distribuidor;

    /**
     * category name
     *
     * @return String
     */ 
    private $nom_categoria; 

    /**
     * number of domains per reseller
     *
     * @return String
     */ 
    private $cantidad_dominios;
     
     /**
     * commission code
     *
     * @return int
     */ 
    private $cod_comision;
     


    /**
     * Get the value of cod_categoria_distribuidor
     */ 
    public function getCod_categoria_distribuidor()
    {
        return $this->cod_categoria_distribuidor;
    }

    /**
     * Set the value of cod_comcod_categoria_distribuidor
     *      *
     * @return  self
     */ 
    public function setCod_categoria_distribuidor($cod_categoria_distribuidor)
    {
        $this->cod_categoria_distribuidor = $cod_categoria_distribuidor;

        return $this;
    }

    /**
     * Get the value of nom_categoria
     */ 
    public function getNom_categoria()
    {
        return $this->nom_categoria;
    }

    /**
     * Set the value of nom_categoria
     *
     * @return  self
     */ 
    public function setNom_categoria($nom_categoria)
    {
        $this->nom_categoria = $nom_categoria;

        return $this;
    }

    /**
     * Get the value of cantidad_dominios
     */ 
    public function getCantidad_dominios()
    {
        return $this->cantidad_dominios;
    }

    /**
     * Set the value of cantidad_dominios
     *
     * @return  self
     */ 
    public function setCantidad_dominios($cantidad_dominios)
    {
        $this->cantidad_dominios = $cantidad_dominios;

        return $this;
    }


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
}  