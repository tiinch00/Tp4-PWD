<?php

class Persona{

    private $nroDni;
    private $apellido;
    private $nombre;
    private $fechaNac;
    private $telefono;
    private $domicilio;
	private $mensajeoperacion;

	public function __construct() {

		$this->nroDni = "";
		$this->apellido = "";
		$this->nombre = "";
		$this->fechaNac = "";
		$this->telefono = "";
		$this->domicilio ="";
		
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
	public function getmensajeoperacion() {
		return $this->mensajeoperacion;
	}

	public function setmensajeoperacion($mensaje) {
		$this->mensajeoperacion = $mensaje;
	}

	public function setear($nroDoc,$apellido,$nombre,$fechaNac,$telefono,$domicilio){	
	    
		$this->setNroDni($nroDoc);
		$this->setApellido($apellido);
		$this->setNombre($nombre);
		$this->setFechaNac($fechaNac);
		$this->setTelefono($telefono);
		$this->setDomicilio($domicilio);
		
    }

	
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM persona WHERE NroDni = '" . $this->getNroDni() . "'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['NroDni'], $row['Apellido'],$row['Nombre'],$row['fechaNac'], $row['Telefono'], $row['Domicilio']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
	

		

	/**
	 * Recupera los datos de una persona por dni
	 * @param int $dni
	 * @return true en caso de encontrar los datos, false en caso contrario 
	 */		
    public function buscar($dni){
		$base=new BaseDatos();
		$consultaPersona="Select * from persona where NroDni= ".$dni;
		$resp= false;
		if($base->iniciar()){
			if($base->ejecutar($consultaPersona)){
				if($row2=$base->registro()){
				    $this->setNroDni($dni);
					$this->setApellido($row2['Apellido']);
					$this->setNombre($row2['Nombre']);
					$this->setFechaNac($row2['fechaNac']);
					$this->setTelefono($row2['Telefono']);
					$this->setDomicilio($row2['Domicilio']);
					$resp= true;
				}				
			
		 	}	else {
		 			$this->setmensajeoperacion("Persona->buscar: ".$base->getError());
		 		
			}
		 }	else {
		 		$this->setmensajeoperacion("Persona->buscar: ".$base->getError());
		 	
		 }		
		 return $resp;
	}	
    

	public function listar($condicion = ""){
        $arregloPersona = [];
        $base = new BaseDatos();
        $consultaPersonas = "SELECT * FROM persona";
        if ($condicion != "") {
            $consultaPersonas .= ' WHERE ' . $condicion;
        }
        $consultaPersonas .= " ORDER BY Apellido";

		$res = $base->Ejecutar($consultaPersonas);

        if ($res>-1) {
            if ($res>0) {
                while ($row2 = $base->Registro()) {
                    $nroDoc = $row2['NroDni'];
					$apellido = $row2['Apellido'];
                    $nombre = $row2['Nombre'];
					$fechaNac = $row2['fechaNac'];
                    $telefono = $row2['Telefono'];
					$domicilio = $row2['Domicilio'];

                    $persona = new Persona();
                    $persona->setear($nroDoc,$apellido,$nombre,$fechaNac,$telefono,$domicilio);
                    array_push($arregloPersona, $persona);
                }
            } else {
                $arregloPersona = false;
                $this->setMensajeOperacion("Persona->listar: ".$base->getError());
            }
        } else {
            $arregloPersona = false;
            $this->setMensajeOperacion("Persona->listar: ".$base->getError());
        }

        return $arregloPersona;
    }
	

	
	public function insertar(){
		$base=new BaseDatos();
		$resp= false;
		$consulta="INSERT INTO persona(NroDni,Apellido,Nombre,fechaNac,Telefono,Domicilio) 
				VALUES ('".$this->getNroDni()."','".$this->getApellido()."','".$this->getNombre()."','".$this->getFechaNac()."','".$this->getTelefono()."','".$this->getDomicilio()."')";
		    if($base->iniciar()){
				if($base->ejecutar($consulta)){
					$resp = true;
				}else{
					$this->setmensajeoperacion("Persona->insetar: ".$base->getError());
				}
			}else{
				$this->setmensajeoperacion("Persona->insetar: ".$base->getError());
			}
			return $resp;
		}
		
	
	
	
	
	public function modificar(){
	    $resp =false; 
	    $base=new BaseDatos();
		$consultaModifica="UPDATE persona SET Apellido = '{$this->getApellido()}', 
		                                      Nombre = '{$this->getNombre()}' ,
											  fechaNac = '{$this->getFechaNac()}', 
											  Telefono = '{$this->getTelefono()}',
											  Domicilio = '{$this->getDomicilio()}' 
											  WHERE NroDni=  '{$this->getNroDni()}'";
		if($base->iniciar()){
			if($base->ejecutar($consultaModifica)){
			    $resp=  true;
			}else{
				$this->setmensajeoperacion("Persona->modificar: ".$base->getError());
				
			}
		}else{
				$this->setmensajeoperacion("Persona->modificar: ".$base->getError());
			
		}
		return $resp;
	}
	
	public function eliminar(){
		$base=new BaseDatos();
		$resp=false;
		if($base->iniciar()){
				$consultaBorrar="DELETE FROM persona WHERE NroDni = '".$this->getNroDni()."'";
				if($base->ejecutar($consultaBorrar)){
					
				    $resp=  true;
				}else{
						$this->setmensajeoperacion("Persona->eliminar: ".$base->getError());
					
				}
		}else{
				$this->setmensajeoperacion("Persona->eliminar: ".$base->getError());
			
		}
		return $resp; 
	}

	public function __toString() {
         $cadena =  "Nombre: " . $this->getNombre()."\n";
		 $cadena .= "Apellido: " . $this->getApellido()."\n";
         $cadena .= "DNI: " . $this->getNroDni()."\n";
		 $cadena .= "FechaNac: " .$this->getFechaNac()."\n";
         $cadena .= "Telefono: " . $this->getTelefono()."\n";
		 $cadena .= "Domicilio: " . $this->getDomicilio()."\n";

		 return $cadena;
			
    }




	
}