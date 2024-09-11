<?php

class Persona{

    private $nroDni;
    private $apellido;
    private $nombre;
    private $fechaNac;
    private $telefono;
    private $domicilio;

	public function __constructor($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio) {

		$this->nroDni = $nroDni;
		$this->apellido = $apellido;
		$this->nombre = $nombre;
		$this->fechaNac = $fechaNac;
		$this->telefono = $telefono;
		$this->domicilio = $domicilio;
	}

	public function getNroDni() {
		return $this->nroDni;
	}

	public function setNroDni($nroDni) {
		$this->nroDni = $nroDni;
	}

	public function getApellido() {
		return $this->apellido;
	}

	public function setApellido($apellido) {
		$this->apellido = $apellido;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function getFechaNac() {
		return $this->fechaNac;
	}

	public function setFechaNac($fechaNac) {
		$this->fechaNac = $fechaNac;
	}

	public function getTelefono() {
		return $this->telefono;
	}

	public function setTelefono($telefono) {
		$this->telefono = $telefono;
	}

	public function getDomicilio() {
		return $this->domicilio;
	}

	public function setDomicilio($domicilio) {
		$this->domicilio = $domicilio;
	}
}