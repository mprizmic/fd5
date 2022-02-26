<?php

namespace App\Model;

class ConstantesSNSD {

    const OP_SI = 'Si';
    const OP_NO = 'No';
    const OP_SD = 'Sin datos';

    private $constants;
    private $constantKeys;

    /**
     * Por reflection obtengo la lista de constantes de la clase y las
     * agrega a un array privado a nivel del objeto al momento de instanciarse el objeto
     */
    public function __construct() {

        $class = new \ReflectionClass(__CLASS__);
        $this->constants = $class->getConstants();
        $this->constantKeys = array_keys($this->constants);
    }

    /**
     * Al momento de invocarse a la constante, PHP interpreta que debería ser una
     * propiedad pública del objeto y como efectivamente no existe, se llama al método
     * __isset para que nosotros decidamos si existe o no. Lo que hacemos es fijarnos
     * si el nombre de la constante que es invocada existe dentro de nuestro array de
     *  constantes descubiertas por reflection
     */
    public function __isset($name) {
        if (in_array($name, $this->constantKeys)) {
            return true;
        }
        return false;
    }

    /**
     * Cuando el método __isset devuelve true, entra al método __get y devuelve
     * el valor de la constante
     */
    public function __get($name) {
        if (in_array($name, $this->constantKeys)) {
            return $this->constants[$name];
        }
        return null;
    }

    /**
     * esta función devuelve un array que tiene los 2 arrays con todos las claves posibles 
     */
    public function getConstantes() {
        return $this->constants;
    }

    public function getValores() {
        return array_values($this->constants);
    }

    public function getClaves() {
        return array_keys($this->constants);
    }

}
