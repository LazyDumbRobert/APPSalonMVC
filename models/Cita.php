<?php 
namespace Model;

class Cita extends ActiveRecord{
    //Base de datos
    protected static $tabla = 'citas';
    protected static $columnasDB = ['fecha','hora','usuariosId'];

    public $id;
    public $fecha;
    public $hora;
    public $usuariosId;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? null;
        $this->hora = $args['hora'] ?? null;
        $this->usuariosId = $args['usuarioId'] ?? null;
        
    }
}