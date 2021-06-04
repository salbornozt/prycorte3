<?php

/**
 * Represents the class of the Administrador - DTO entity
 */

class Usuario
{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * code of user
     *
     * @return int
     */
    private $cod_usuario;

    /**
     *type of user
     *
     * @return String
     */
    private $tipo_usuario;

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

    /**
     * Get the value of tipo_usuario
     */
    public function getTipo_usuario()
    {
        return $this->tipo_usuario;
    }

    /**
     * Set the value of tipo_usuario
     *
     * @return  self
     */
    public function setTipo_usuario($tipo_usuario)
    {
        $this->tipo_usuario = $tipo_usuario;

        return $this;
    }
}
