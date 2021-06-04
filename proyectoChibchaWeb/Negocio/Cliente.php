<?php

/**
 * Represents the class of the Client - DTO entity
 */

class Cliente
{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the client to which it belongs
     *
     * @return int
     */
    private $cod_cliente;

    /**
     * name of the client
     *
     * @return String
     */
    private $nom_cliente;

    /**
     * phone of the client
     *
     * @return int
     */
    private $telefono_cliente;

    /**
     * id of the client
     *
     * @return int
     */
    private $cedula_cliente;

    /**
     * user of the client
     *
     * @return String
     */
    private $usuario_cliente;

    /**
     * password of the client
     *
     * @return String
     */
    private $contraseña_cliente;

    /**
     * mail of the client
     *
     * @return String
     */
    private $correo_cliente;

    /**
     * code of petition
     *
     * @return int
     */
    private $cod_peticion;

    /**
     * code of user
     *
     * @return int
     */
    private $cod_usuario;

    /**
     * Get the value of cod_cliente
     */
    public function getCod_cliente()
    {
        return $this->cod_cliente;
    }

    /**
     * Set the value of cod_cliente
     *
     * @return  self
     */
    public function setCod_cliente($cod_cliente)
    {
        $this->cod_cliente = $cod_cliente;

        return $this;
    }

    /**
     * Get the value of Nom_empleado
     */
    public function getNom_cliente()
    {
        return $this->nom_cliente;
    }

    /**
     * Set the value of nom_cliente
     *
     * @return  self
     */
    public function setNom_cliente($nom_cliente)
    {
        $this->nom_cliente = $nom_cliente;

        return $this;
    }

    /**
     * Get the value of telefono_cliente
     */
    public function getTelefono_cliente()
    {
        return $this->telefono_cliente;
    }

    /**
     * Set the value of telefono_cliente
     *
     * @return  self
     */
    public function setTelefono_cliente($telefono_cliente)
    {
        $this->telefono_cliente = $telefono_cliente;

        return $this;
    }

    /**
     * Get the value of cargo_empleado
     */
    public function getCedula_cliente()
    {
        return $this->cedula_cliente;
    }

    /**
     * Set the value of cedula_cliente
     *
     * @return  self
     */
    public function setCedula_cliente($cedula_cliente)
    {
        $this->cedula_cliente = $cedula_cliente;

        return $this;
    }

    /**
     * Get the value of usuario_empleado
     */
    public function getUsuario_cliente()
    {
        return $this->usuario_cliente;
    }

    /**
     * Set the value of usuario_cliente
     *
     * @return  self
     */
    public function setUsuario_cliente($usuario_cliente)
    {
        $this->usuario_cliente = $usuario_cliente;

        return $this;
    }


    /**
     * Get the value of contraseña_empleado
     */
    public function getContraseña_cliente()
    {
        return $this->contraseña_cliente;
    }

    /**
     * Set the value of contraseña_cliente
     *
     * @return  self
     */
    public function setContraseña_cliente($contraseña_cliente)
    {
        $this->contraseña_cliente = $contraseña_cliente;

        return $this;
    }

    /**
     * Get the value of correo_cliente
     */
    public function getCorreo_cliente()
    {
        return $this->correo_cliente;
    }

    /**
     * Set the value of correo_cliente
     *
     * @return  self
     */
    public function setCorreo_cliente($correo_cliente)
    {
        $this->correo_cliente = $correo_cliente;

        return $this;
    }



    /**
     * Get the value of code petition
     */
    public function getCod_peticion()
    {
        return $this->cod_peticion;
    }

    /**
     * Set the value of code petition
     *
     * @return  self
     */
    public function setCod_peticion($cod_peticion)
    {
        $this->cod_peticion = $cod_peticion;

        return $this;
    }

    /**
     * Get the value of code user
     */
    public function getCod_usuario()
    {
        return $this->cod_usuario;
    }

    /**
     * Set the value of code users
     *
     * @return  self
     */
    public function setCod_usuario($cod_usuario)
    {
        $this->cod_usuario = $cod_usuario;

        return $this;
    }
}
