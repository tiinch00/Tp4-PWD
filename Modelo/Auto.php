<?php


class Auto {


    private $patente;
    private $marca;
    private $modelo;
    private $objDniDuenio; //foreign key de persona
    private $mensajeOperacion;

    public function __constructor()
    {

        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->$objDniDuenio = new Persona(); // Inicializamos como objeto
        $this->mensajeOperacion = "";
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
        return $this->$objDniDuenio;
    }

    public function setObjDniDuenio($valor)
    {
        $this->$objDniDuenio = $valor;
    }

    public function getmensajeoperacion(){
        return $this->mensajeOperacion;

    }

    public function setmensajeoperacion($valor){
        $this->mensajeOperacion = $valor;
    }

    public function setear($patente,$marca,$modelo,$objDniDuenio){	
	    
		$this->setPatente($patente);
		$this->setMarca($marca);
		$this->setModelo($modelo);
		$this->setObjDniDuenio($objDniDuenio);
		
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
        VALUES ('" . $this->getPatente() . "','" . $this->getMarca() . "'," . $this->getModelo() . ",'" . $this->getDniDuenio() . "')";


        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consulta)) {
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
        $consulta .= " ORDER BY Patente";

        $resp = $base->Ejecutar($consulta);

        if ($res>-1) {
            if ($res>0) {$arregloAuto = [];
                while ($row2 = $base->Registro()) {
                    $patente = $row2['Patente'];
					$marca = $row2['Marca'];
                    $modelo = $row2['Modelo'];
					$objDuenio = $row2['DniDuenio'];
                    

                    $objAuto = new Auto();
                    $objAuto->setear($patente,$marca,$modelo,$objDuenio);
                    array_push($arregloAuto, $objAuto);
                }
            } else {
                $arregloAuto = false;
                $this->setMensajeOperacion("Auto->listar: ".$base->getError());
            }
        } else {
            $arregloAuto = false;
            $this->setMensajeOperacion("Auto->listar: ".$base->getError());
        }

        return $arregloAuto;
    }

    
	public function modificar(){
	    $resp =false; 
	    $base= new BaseDatos();
		$consultaModifica="UPDATE auto SET Marca = '{$this->getMarca()}', 
		                                   Modelo = {$this->getModelo()},
										   DniDuenio= '{$this->getObjDniDuenio()->getNroDni()}', 										  
										   WHERE Patente =  '{$this->getPatente()}'";
		if($base->iniciar()){
			if($base->ejecutar($consultaModifica)){
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
				$consultaBorrar="DELETE FROM auto WHERE Patente=" . $this->getPatente();
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
