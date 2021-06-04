<?php

/**
 * Represents the class of the AuditoriaTicket - DTO entity
 */

class TarjetaCredito
{

	//----------------------------
	//Attributes
	//----------------------------

	/**
	 * Code of the auditory ticket
	 *
	 * @return int
	 */
	private $cod_tarjeta_credito;

	/**
	 * Number of tarjet
	 *
	 * @return int
	 */
	private $numero_tarjeta;

	/**
	 * Code of security
	 *
	 * @return int
	 */
	private $codigo_seguridad;

	/**
	 * Direccion of 
	 *
	 * @return String
	 */

	private $direccion;

	/**
	 * Fecha de expiracion
	 *
	 * @return Date
	 */
	private $fecha_expiracion;

	/**
	 * Code of type  tarjet
	 *
	 * @return int
	 */
	private $cod_tipo_tarjeta;

	/**
	 * Code of cliente
	 *
	 * @return  int
	 */

	private $cod_cliente;


	public function getCod_tarjeta_credito()
	{
		return $this->cod_tarjeta_credito;
	}

	/**
	 * Set the value of cod_administrador
	 *
	 * @return  self
	 */
	public function setCod_tarjeta_credito($cod_tarjeta_credito)
	{
		$this->cod_tarjeta_credito = $cod_tarjeta_credito;
	}

	public function getNumero_tarjeta()
	{
		return $this->número_tarjeta;
	}

	/**
	 * Set the value of cod_administrador
	 *
	 * @return  self
	 */
	public function setNumero_tarjeta($número_tarjeta)
	{
		$this->número_tarjeta = $número_tarjeta;
	}


	public function getCodigo_seguridad()
	{
		return $this->codigo_seguridad;
	}
	/**
	 * Set the value of cod_administrador
	 *
	 * @return  self
	 */
	public function setCodigo_seguridad($codigo_seguridad)
	{
		$this->codigo_seguridad = $codigo_seguridad;
	}

	public function getDireccion()
	{
		return $this->direccion;
	}
	/**
	 * Set the value of cod_administrador
	 *
	 * @return  self
	 */
	public function setDireccion($direccion)
	{
		$this->direccion = $direccion;
	}

	public function getFecha_expiracion()
	{
		return $this->fecha_expiracion;
	}
	/**
	 * Set the value of cod_administrador
	 *
	 * @return  self
	 */
	public function setFecha_expiracion($fecha_expiracion)
	{
		$this->fecha_expiracion = $fecha_expiracion;
	}

	public function getCod_tipo_tarjeta()
	{
		return $this->cod_tipo_tarjeta;
	}
	/**
	 * Set the value of cod_administrador
	 *
	 * @return  self
	 */
	public function setCod_tipo_tarjeta($cod_tipo_tarjeta)
	{
		$this->cod_tipo_tarjeta = $cod_tipo_tarjeta;
	}

	public function getCod_cliente()
	{
		return $this->cod_cliente;
	}
	/**
	 * Set the value of cod_administrador
	 *
	 * @return  self
	 */
	public function setCod_cliente($cod_cliente)
	{
		$this->cod_cliente = $cod_cliente;
	}
}
