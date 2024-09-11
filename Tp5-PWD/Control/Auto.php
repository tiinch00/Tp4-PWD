<?php


class Auto {

    private $patente;
    private $marca;
    private $modelo;
    private $dniDuenio;

	public function __constructor($patente, $marca, $modelo, $dniDuenio) {

		$this->patente = $patente;
		$this->marca = $marca;
		$this->modelo = $modelo;
		$this->dniDuenio = $dniDuenio;
	}

	public function getPatente() {
		return $this->patente;
	}

	public function setPatente($patente) {
		$this->patente = $patente;
	}

	public function getMarca() {
		return $this->marca;
	}

	public function setMarca($marca) {
		$this->marca = $marca;
	}

	public function getModelo() {
		return $this->modelo;
	}

	public function setModelo($modelo) {
		$this->modelo = $modelo;
	}

	public function getDniDuenio() {
		return $this->dniDuenio;
	}

	public function setDniDuenio($dniDuenio) {
		$this->dniDuenio = $dniDuenio;
	}


    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM tabla WHERE id = ".$this->getId();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['id'], $row['descrip']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO tabla(descrip)  VALUES('".$this->getDescrip()."');";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setId($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE tabla SET descrip='".$this->getDescrip()."' WHERE id=".$this->getId();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM tabla WHERE id=".$this->getId();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Tabla->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM tabla ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new Tabla();
                    $obj->setear($row['id'], $row['descrip']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $arreglo;
    }

    

}