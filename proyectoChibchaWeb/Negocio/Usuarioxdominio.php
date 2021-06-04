<?php

/**
 * Represents the class of the Administrador - DTO entity
 */

class Usuarioxdominio
{

    //----------------------------
    //Attributes
    //----------------------------
    
    private $cod_dominio;
    /**
     * code of user
     *
     * @return int
     */
    private $nom_cliente;

    /**
     *type of user
     *
     * @return String
     */
    private $url;

    /**
     *type of user
     *
     * @return String
     */
    private $nom_paquete;

    /**
     *type of user
     *
     * @return String
     */
    private $nom_distribuidor;

    /**
     *type of user
     *
     * @return String
     */
    private $nom_planpago;


    public function getCod_dominio()
    {
        return $this->cod_dominio;
    }

    /**
     * Set the value of cod_dominio
     *
     * @return  self
     */ 
    public function setCod_dominio($cod_dominio)
    {
        $this->cod_dominio = $cod_dominio;

        return $this;
    }


    /**
     * Get the value of code user
     */
    public function getNom_cliente()
    {
        return $this->nom_cliente;
    }

    /**
     * Set the value of code users
     *
     * @return  self
     */
    public function setNom_cliente($nom_cliente)
    {
        $this->nom_cliente = $nom_cliente;

        return $this;
    }

    /**
     * Get the value of tipo_usuario
     */
    public function getUrl()
    {
        return $this->Url;
    }

    /**
     * Set the value of fecha_creacion
     *
     * @return  self
     */ 
    public function setUrl($Url)
    {
        $this->Url = $Url;

        return $this;
    }

    public function getNom_paquete()
    {
        return $this->nom_paquete;
    }

    /**
     * Set the value of nom_paquete
     *
     * @return  self
     */ 
    public function setNom_paquete($nom_paquete)
    {
        $this->nom_paquete = $nom_paquete;

        return $this;
    }

    public function getNom_distribuidor()
    {
        return $this->nom_distribuidor;
    }

    /**
     * Set the value of nom_distribuidor
     *
     * @return  self
     */ 
    public function setNom_distribuidor($nom_distribuidor)
    {
        $this->nom_distribuidor = $nom_distribuidor;

        return $this;
    }

    public function getNom_planPago()
    {
        return $this->nom_planPago;
    }

    /**
     * Set the value of nom_planPago
     *
     * @return  self
     */ 
    public function setNom_planPago($nom_planPago)
    {
        $this->nom_planPago = $nom_planPago;

        return $this;
    }
}
