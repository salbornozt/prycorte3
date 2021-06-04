<?php

/**
 * Represents the class of the Distribuidor - DTO entity
 */

class Distribuidor{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code for the distributor 
     *
     * @return int
     */ 
    private $cod_distribuidor;

    /**
     * distributor name
     *
     * @return String
     */ 
    private $nom_distribuidor; 

    /**
     * distributor category name
     *
     * @return String
     */ 
    private $correo_distribuidor;
    
    /**
     * distributor category name
     *
     * @return String
     */ 
    private $nom_categoria_distribuidor;
     
     /**
     * distributor category code
     *
     * @return int
     */ 
    private $cod_categoria_distribuidor;

    /**
     * distributor estado code
     *
     * @return int
     */ 
    private $cod_estado;
     
     


    /**
     * Get the value of cod_distribuidor
     */ 
    public function getCod_distribuidor()
    {
        return $this->cod_distribuidor;
    }

    /**
     * Set the value of cod_distribuidor
     *      *
     * @return  self
     */ 
    public function setCod_distribuidor($cod_distribuidor)
    {
        $this->cod_distribuidor = $cod_distribuidor;

        return $this;
    }

    /**
     * Get the value of nom_distribuidor
     */ 
    public function getNom_distribuidor()
    {
        return $this->nom_distribuidor;
    }

    /**
     * Set the value of nom_distribuidor
     *
     * @return  self
     */ 
    public function setnom_distribuidor($nom_distribuidor)
    {
        $this->nom_distribuidor = $nom_distribuidor;

        return $this;
    }

    /**
     * Get the value of correo_distribuidor
     */ 
    public function getCorreo_distribuidor()
    {
        return $this->correo_distribuidor;
    }

    /**
     * Set the value of correo_distribuidor
     *
     * @return  self
     */ 
    public function setCorreo_distribuidor($correo_distribuidor)
    {
        $this->correo_distribuidor = $correo_distribuidor;

        return $this;
    }

    /**
     * Get the value of correo_distribuidor
     */ 
    public function getNom_categoria_distribuidor()
    {
        return $this->nom_categoria_distribuidor;
    }

    /**
     * Set the value of correo_distribuidor
     *
     * @return  self
     */ 
    public function setNom_categoria_distribuidor($nom_categoria_distribuidor)
    {
        $this->nom_categoria_distribuidor = $nom_categoria_distribuidor;

        return $this;
    }


    /**
     * Get the value of cod_categoria_distribuidor
     */ 
    public function getCod_categoria_distribuidor()
    {
        return $this->cod_categoria_distribuidor;
    }

    /**
     * Set the value of cod_categoria_distribuidor
     *
     * @return  self
     */ 
    public function setCod_categoria_distribuidor($cod_categoria_distribuidor)
    {
        $this->cod_categoria_distribuidor = $cod_categoria_distribuidor;

        return $this;
    }
    
    /**
     * Get the value of cod_categoria_distribuidor
     */ 
    public function getEstado_distribuidor()
    {
        return $this->cod_estado;
    }

    /**
     * Set the value of cod_categoria_distribuidor
     *
     * @return  self
     */ 
    public function setEstado_distribuidor($cod_estado)
    {
        $this->cod_estado = $cod_estado;

        return $this;
    }
}  