<?php

/**
 * Represents the class of the AuditoriaTicket - DTO entity
 */

class Ticket
{

	//----------------------------
	//Attributes
	//----------------------------

	/**
	 * Code of the auditory ticket
	 *
	 * @return int
	 */
	private $cod_ticket;

	private $nom_cliente;

	private $nom_ticket;

	private $descripción_ticket;

	private $estado_del_ticket;

	private $fecha_creacion;

	private $cod_cliente;

	private $cod_empleado;


	public function getCod_ticket()
	{
		return $this->cod_ticket;
	}

	public function setCod_ticket($cod_ticket)
	{
		$this->cod_ticket = $cod_ticket;
	}

	public function getNom_cliente()
	{
		return $this->nom_cliente;
	}

	public function setNom_cliente($nom_cliente)
	{
		$this->nom_cliente = $nom_cliente;
	}

	public function getNom_ticket()
	{
		return $this->nom_ticket;
	}

	public function setNom_ticket($nom_ticket)
	{
		$this->nom_ticket = $nom_ticket;
	}

	public function getDescripción_ticket()
	{
		return $this->descripción_ticket;
	}

	public function setDescripción_ticket($descripción_ticket)
	{
		$this->descripción_ticket = $descripción_ticket;
	}

	public function getEstado_del_ticket()
	{
		return $this->estado_del_ticket;
	}

	public function setEstado_del_ticket($estado_del_ticket)
	{
		$this->estado_del_ticket = $estado_del_ticket;
	}

	public function getFecha_creacion()
	{
		return $this->fecha_creacion;
	}

	public function setFecha_creacion($fecha_creacion)
	{
		$this->fecha_creacion = $fecha_creacion;
	}

	public function getCod_cliente()
	{
		return $this->cod_cliente;
	}

	public function setCod_cliente($cod_cliente)
	{
		$this->cod_cliente = $cod_cliente;
	}

	public function getCod_empleado()
	{
		return $this->cod_empleado;
	}

	public function setCod_empleado($cod_empleado)
	{
		$this->cod_empleado = $cod_empleado;
	}
}
