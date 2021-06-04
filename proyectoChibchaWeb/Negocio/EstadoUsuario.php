<?php

/**
 * Represents the class of the Administrador - DTO entity
 */

class EstadoUsuario
{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * code of petition
     *
     * @return int
     */
    private $cod_peticion;

    /**
     *Petition date
     *
     * @return date
     */
    private $fecha_peticion;

    /**
     *Petition status
     *
     * @return int
     */
    private $estado_peticion;

    /**
     *Update date
     *
     * @return date
     */
    private $fecha_actualización;


    /**
     * Get the value of code petition
     */
    public function getCod_peticion()
    {
        return $this->cod_usuario;
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
     * Get the value of fecha_peticion
     */
    public function getFecha_peticion()
    {
        return $this->fecha_peticion;
    }

    /**
     * Set the value of fecha_peticion
     *
     * @return  self
     */
    public function setFecha_peticion($fecha_peticion)
    {
        $this->fecha_peticion = $fecha_peticion;

        return $this;
    }

    /**
     * Get the value of estado_peticion
     */
    public function getEstado_peticion()
    {
        return $this->estado_peticion;
    }

    /**
     * Set the value of estado_peticion
     *
     * @return  self
     */
    public function setEstado_peticion($estado_peticion)
    {
        $this->estado_peticion = $estado_peticion;

        return $this;
    }

    /**
     * Get the value of fecha_actualizacion
     */
    public function getFecha_actualizacion()
    {
        return $this->fecha_actualización;
    }

    /**
     * Set the value of fecha_peticion
     *
     * @return  self
     */
    public function setFecha_actualizacion($fecha_actualización)
    {
        $this->fecha_actualización = $fecha_actualización;

        return $this;
    }
}
