<?php

/**
 * Represents the class of the Administrador - DTO entity
 */

class SitioWeb
{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * code of website
     *
     * @return int
     */
    private $cod_sitio_web;

    /**
     *Web page name
     *
     * @return String
     */
    private $nombre_pagina_web;

    /**
     *Petition status
     *
     * @return String
     */
    private $descripcion;

    /**
     *Url
     *
     * @return String
     */
    private $url;

    /**
     *Url
     *
     * @return int
     */
    private $cod_cliente;

    /**
     * Get the value of code website
     */
    public function getCod_sitio_web()
    {
        return $this->cod_sitio_web;
    }

    /**
     * Set the value of code website
     *
     * @return  self
     */
    public function setCod_sitio_web($cod_sitio_web)
    {
        $this->cod_sitio_web = $cod_sitio_web;

        return $this;
    }

    /**
     * Get the value of nombre_sitio_web
     */
    public function getNombre_pagina_web()
    {
        return $this->nombre_pagina_web;
    }

    /**
     * Set the value of fecha_peticion
     *
     * @return  self
     */
    public function setNombre_pagina_web($nombre_pagina_web)
    {
        $this->nombre_pagina_web = $nombre_pagina_web;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of fecha_peticion
     *
     * @return  self
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

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
}
