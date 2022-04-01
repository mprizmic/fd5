<?php

namespace App\Model;

class ConstantesGenerales {

    const NOMBRE = 'Sistema de Información FD';
    const NOMBRE_CORTO = 'FD';
    const VERSION_LOGICA = 'Versión Beta - 02/2022';
    const CREDITOS = 'Créditos: Marcelo Prizmic';
    const VERSION_SYMFONY = '5.4';
    const VERSION_DOCTRINE = 'Doctrine >=2.2.3,<2.5-dev';
//    const VERSION_APACHE = '';
    const VERSION_MYSQL = '8';
//    const VERSION_FIREFOX = '';
//    const DEPENDENCIA = 'Dirección de Formación Docente';
    const EMAIL = 'mprizmic@bue.edu.ar';
    const SITIO_WEB = 'buenosaires.gob.ar/educacion/estudiantes/formacion-docente';
    const CUE_SEDE = '00';

    //referidas al tipo de unidad oferta
//    const TUO_INICIAL = "Inicial";
//    const TUO_PRIMARIO = "Primario";
//    const TUO_BACHILLERATO = "Bachillerato";
//    const TUO_SECUNDARIO = "Secundario";
//    const TUO_CARRERA = "Carrera";
//    const TUO_ESPECIALIZACION = "Especializacion";
    
//    const ESTADO_CARRERA_ACTIVA = "ACT";

    
//    const GRILLA_MEDIANO = 15;
    
//    public $TELEFONOS = array(
//        array(
//            'oficina' => 'Secretaría Privada',
//            'te' => '4320-0400 interno 1160',
//        ),
//    );
    
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

}
