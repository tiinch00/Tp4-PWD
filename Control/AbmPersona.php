<?php
class AbmPersona{

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Persona
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('NroDni',$param) and array_key_exists('Apellido',$param)and array_key_exists('Nombre',$param)and array_key_exists('fechaNac',$param)and array_key_exists('Telefono',$param)and array_key_exists('Domicilio',$param)){
            $obj = new Persona();
            $obj->setear($param['NroDni'], $param['Apellido'], $param['Nombre'], $param['fechaNac'], $param['Telefono'], $param['Domicilio']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Persona
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['NroDni']) ){
            $obj = new Persona();
            $obj->setear($param['NroDni'], null, null, null, null, null);
        }
        return $obj;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['NroDni']))
            $resp = true;
        return $resp;
    }
    
    /**
     *  Alta (A): Es el proceso de crear o agregar un nuevo objeto o registro a un sistema.
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        //$param['NroDni'] = null;
        $elObjtTabla = $this->cargarObjeto($param);
//        //verEstructura($elObjtTabla);
        if ($elObjtTabla!=null and $elObjtTabla->insertar()){
            $resp = true;
        }
        return $resp;
        
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla!=null and $elObjtTabla->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
       
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjeto($param);
            if($elObjtTabla!=null and $elObjtTabla->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
     public function buscar($param){
            $where = "";
            
            if (!empty($param)){
    
                if  (isset($param['NroDni'])){            
                    $where.=" NroDni ='".$param['NroDni'] . "'";
                }
                    
                if  (isset($param['Apellido'])){
                    $where.=" Apellido ='".$param['Apellido']."'";
                }
                    
                if  (isset($param['Nombre'])){
                    $where.= " Nombre ='" .$param['Nombre'] . "'";
                }
                    
                if  (isset($param['fechaNac'])){
                    $where.=" fechaNac ='". $param['fechaNac'] ."'";
                }
                    
                if  (isset($param['Telefono'])){
                    $where.=" Telefono ='" .$param['Telefono'] . "'";
                }
                    
                if  (isset($param['Domicilio'])){
                    $where.=" Domicilio ='" .$param['Domicilio'] ."'";
                }
            }
            $objPersona = new Persona();
            $arreglo = $objPersona->listar($where);  
            return $arreglo;
            
        }

        public function existePersona($datos){

            $esta = false;

            $objPersona= new Persona();

            $resp = $objPersona->buscar($datos["NroDni"]);

            if($resp){
                
                $esta = true;

            }
            return $esta;

        }
        
    
}
?>