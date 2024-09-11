<?php


class Auto
{

    private $patente;
    private $marca;
    private $modelo;
    private $dniDuenio;

    public function __constructor($patente, $marca, $modelo, $dniDuenio)
    {

        $this->patente = $patente;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->dniDuenio = $dniDuenio;
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

    public function getDniDuenio()
    {
        return $this->dniDuenio;
    }

    public function setDniDuenio($dniDuenio)
    {
        $this->dniDuenio = $dniDuenio;
    }



    public function insertar()
    {
        $baseDatos = new BaseDatos();
        $resp = false;

        $consulta = "INSERT INTO auto (Patente, Marca, Modelo, DniDuenio)
        VALUES ('" . $this->getPatente() . "','" . $this->getMarca() . "'," . $this->getModelo() . ",'" . $this->getDniDuenio() . "')";


        if ($baseDatos->iniciar()) {
            if ($baseDatos->ejecutar($consulta)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $resp;
    }
}
