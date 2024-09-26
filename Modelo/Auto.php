<?php


class Auto {


    private $patente;
    private $marca;
    private $modelo;
    private $objDniDuenio; //foreign key de persona
    private $mensajeOperacion;

    public function __construct(){

        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->objDniDuenio = new Persona(); // Inicializamos como objeto
        $this->mensajeOperacion = "";
    }
    public function setear($patente,$marca,$modelo,Persona $objDniDuenio){	
	    
		$this->setPatente($patente);
		$this->setMarca($marca);
		$this->setModelo($modelo);
		$this->setObjDniDuenio($objDniDuenio);
		
    }

    public function getPatente()
    {
        return $this->patente;
    }

    public function setPatente($patente)
    {
        $this->patente = $patente;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getObjDniDuenio()
    {
        return $this->objDniDuenio;
    }

    public function setObjDniDuenio($valor)
    {
        $this->objDniDuenio = $valor;
    }

    public function getmensajeoperacion(){
        return $this->mensajeOperacion;

    }

    public function setmensajeoperacion($valor){
        $this->mensajeOperacion = $valor;
    }

    
	/**
	 * Recupera los datos de un auto
	 * @param string $patente
	 * @return true en caso de encontrar los datos, false en caso contrario 
	 */		
    public function buscar($patente){
		$base=new BaseDatos();
		$consultaPersona="Select * From auto WHERE Patente= '".$patente."'";
		$resp= false;
		if($base->Iniciar()){
			if($base->Ejecutar($consultaPersona)){
				if($row2=$base->Registro()){
				    $this->setPatente($patente);
					$this->setMarca($row2['Marca']);
					$this->setModelo($row2['Modelo']);

                    $objPersona = new Persona();
                    $objPersona->setNroDni($row2['DniDuenio']);
					if ($objPersona->cargar()){

                      $this->setObjDniDuenio($objPersona);

                        $resp= true;

                    } else {
                        $this->setmensajeoperacion("Auto->buscar: No se pudo cargar el dueño con DNI " . $row2['DniDuenio']);
                    }
					
				}				
			
		 	}	else {
		 			$this->setmensajeoperacion("Persona->buscar: ".$base->getError());
		 		
			}
		 }	else {
		 		$this->setmensajeoperacion("Persona->buscar: ".$base->getError());
		 	
		 }		
		 return $resp;
	}	


    public function cargar(){
        $resp = false;
        $base = new BaseDatos();
        $sql= "SELECT * FROM auto WHERE Patente = '" . $this->getPatente() . "'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $objPersona = new Persona;
                    $objPersona->setNroDni($row['DniDuenio']);
                    if ($objPersona->cargar()) { // Carga los datos del dueño
                        // Setea los datos del auto junto con el objeto Persona
                        $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $objPersona);
                        $resp = true;
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
}



    public function insertar(){
        $baseDatos = new BaseDatos();
        $resp = false;

        $consulta = "INSERT INTO auto (Patente, Marca, Modelo, DniDuenio)
        VALUES ('" . $this->getPatente() . "','" . $this->getMarca() . "'," . $this->getModelo() . ",'" . $this->getObjDniDuenio()->getNroDni() . "')";


        if ($baseDatos->Iniciar()) {
            if ($baseDatos->Ejecutar($consulta)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Auto->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Auto->insertar: ".$base->getError());
        }
        return $resp;
    }
    
	public function listar($condicion = ""){
        $arregloAuto = [];
        $base = new BaseDatos();
        $consulta = "SELECT * FROM auto";
        if ($condicion != "") {
            $consulta.= ' WHERE ' . $condicion;
        }
      

        $resp = $base->Ejecutar($consulta);

        if ($resp>-1) {
            if ($resp>0) {
                while ($row = $base->Registro()) {
                    // objeto Auto
                $auto = new Auto();
                
                // objeto Persona
                $duenioDni = new Persona();
                $duenioDni->setNroDni($row['DniDuenio']); // Se asigna el DNI del duenio
                
                // Carga los datos del duenio desde la tabla Persona
                if ($duenioDni->cargar()) {
                    // Se setea los datos del auto junto con el duenio
                    $auto->setear($row['Patente'], $row['Marca'], $row['Modelo'], $duenioDni);
                    array_push($arregloAuto, $auto);
                } else {
                    // Si no se pudo cargar el dueño, puedes registrar un error
                    $auto->setmensajeoperacion("Auto->listar: No se pudo cargar el dueño del auto con patente " . $row['Patente']);
                }
                    
                }
            } else {
                $arregloAuto = [];
                $this->setMensajeOperacion("Auto->listar: ".$base->getError());
            }
        } else {
            $arregloAuto = [];
            $this->setMensajeOperacion("Auto->listar: ".$base->getError());
        }

        return $arregloAuto;
    }

    
	public function modificar(){
	    $resp =false; 
	    $base= new BaseDatos();
		$consultaModifica="UPDATE auto SET Marca = '{$this->getMarca()}', 
		                                   Modelo = {$this->getModelo()},
										   DniDuenio= '{$this->getObjDniDuenio()->getNroDni()}' 										  
										   WHERE Patente =  '{$this->getPatente()}'";
		if($base->Iniciar()){
			if($base->Ejecutar($consultaModifica)){
			    $resp=  true;
			}else{
				$this->setmensajeoperacion("Auto->modificar: ".$base->getError());
				
			}
		}else{
				$this->setmensajeoperacion("Auto->modificar: ".$base->getError());
			
		}
		return $resp;

    }
	
	
	public function eliminar(){
		$base=new BaseDatos();
		$resp=false;
		if($base->iniciar()){
				$consultaBorrar="DELETE FROM auto WHERE Patente=  '".$this->getPatente()."'";
				if($base->ejecutar($consultaBorrar)){
					
				    $resp=  true;
				}else{
						$this->setmensajeoperacion("Auto->eliminar: ".$base->getError());
					
				}
		}else{
				$this->setmensajeoperacion("Auto->eliminar: ".$base->getError());
			
		}
		return $resp; 
	}

    

	
}
