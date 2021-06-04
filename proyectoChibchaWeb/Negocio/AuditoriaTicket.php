<?php

/**
 * Represents the class of the AuditoriaTicket - DTO entity
 */

class AuditoriaTicket{

    //----------------------------
    //Attributes
    //----------------------------

    /**
     * Code of the auditory ticket
     *
     * @return int
     */ 
    private $cod_auditoria_ticket;

    /**
     * Code of the ticket
     *
     * @return int
     */ 
    private $cod_ticket;

    private $cod_empleado_actual;

    private $cod_empleado_anterior;

    private $estado_del_ticket_actual;

    private $estado_del_ticket_anterior;

    private $fecha;


   
    /**
     * Get the value of cod_auditoria_ticket
     */ 
    public function getCod_AuditoriaTicket()
    {
        return $this->cod_AuditoriaTicket;
    }

    /**
     * Set the value of cod_auditoria_ticket
     *
     * @return  self
     */ 
    public function setCod_AuditoriaTicket($cod_AuditoriaTicket)
    {
        $this->cod_AuditoriaTicket = $cod_AuditoriaTicket;

        return $this;
    }

    public function getCod_ticket(){
		return $this->cod_ticket;
	}

	public function setCod_ticket($cod_ticket){
		$this->cod_ticket = $cod_ticket;
	}

	public function getCod_empleado_actual(){
		return $this->cod_empleado_actual;
	}

	public function setCod_empleado_actual($cod_empleado_actual){
		$this->cod_empleado_actual = $cod_empleado_actual;
	}

	public function getCod_empleado_anterior(){
		return $this->cod_empleado_anterior;
	}

	public function setCod_empleado_anterior($cod_empleado_anterior){
		$this->cod_empleado_anterior = $cod_empleado_anterior;
	}

	public function getEstado_del_ticket_actual(){
		return $this->estado_del_ticket_actual;
	}

	public function setEstado_del_ticket_actual($estado_del_ticket_actual){
		$this->estado_del_ticket_actual = $estado_del_ticket_actual;
	}

	public function getEstado_del_ticket_anterior(){
		return $this->estado_del_ticket_anterior;
	}

	public function setEstado_del_ticket_anterior($estado_del_ticket_anterior){
		$this->estado_del_ticket_anterior = $estado_del_ticket_anterior;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}




   


}  