<?php
class AbmAuto{

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('Patente',$param) and array_key_exists('Marca',$param)and array_key_exists('Modelo',$param)and array_key_exists('DniDuenio',$param)){
            $obj = new Auto();
            $obj->setear($param['Patente'], $param['Marca'], $param['Modelo'], $param['DniDuenio']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Auto
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['Patente']) ){
            $obj = new Auto();
            $obj->setear($param['Patente'], null, null, null);
        }
        return $obj;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo esten seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['Patente']))
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
        $elObjtAuto = $this->cargarObjeto($param);
//        //verEstructura($elObjtTabla);
        if ( $elObjtAuto!=null and  $elObjtAuto->insertar()){
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
            $elObjtAuto = $this->cargarObjetoConClave($param);
            if ( $elObjtAuto!=null &&  $elObjtAuto->eliminar()){
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
            $elObjtAuto = $this->cargarObjeto($param);
            if($elObjtAuto!=null and $elObjtAuto->modificar()){
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
    public function buscar($param) {
        $where = [];
        
        if (!empty($param)) {
            if (isset($param['Patente']) && !empty($param['Patente'])) {
                $where[] = "Patente = '" . $param['Patente'] . "'";
            }
    
            if (isset($param['Marca']) && !empty($param['Marca'])) {
                $where[] = "Marca = '" . $param['Marca'] . "'";
            }
    
            if (isset($param['Modelo']) && !empty($param['Modelo'])) {
                $where[] = "Modelo = '" . $param['Modelo'] . "'";
            }
    
            if (isset($param['DniDuenio']) && !empty($param['DniDuenio'])) {
                $where[] = "DniDuenio = '" . $param['DniDuenio'] . "'";
            }
        }
    
        // Convertir el array en una cadena con AND
        $whereClause = "";
        if (!empty($where)) {
            $whereClause = implode(" AND ", $where);
        }
    
        $objAuto = new Auto();
        $arreglo = $objAuto->listar($whereClause);  
        return $arreglo;
    }
    
}
?>