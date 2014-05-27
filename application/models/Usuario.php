<?php
/**
 * Created by PhpStorm.
 * User: YeisonVargas
 * Date: 16/05/14
 * Time: 10:16 AM
 */

require_once 'application/libs/baseDatos.php';

class Usuario extends baseDatos {

    private $idUsuario;
    private $numeroDocumento;
    private $tipoDocumento;
    private $codigo;
    private $nombre;
    private $apellido;
    private $correo;
    private $contrasenia;
    private $fechaNacimiento;
    private $telefonoFijo;
    private $telefonoCelular;
    private $direccion;
    private $tipo;

    function __construct()
    {
    }

    function crear($codigo, $nombre, $apellido, $tipoDocumento, $numeroDocumento, $contrasenia, $correo,
                   $direccion, $fechaNacimiento, $telefonoCelular, $telefonoFijo, $tipoUsuario)
    {
        $this->apellido = $apellido;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
        $this->codigo = $codigo;
        $this->contrasenia = $contrasenia;
        $this->correo = $correo;
        $this->direccion = $direccion;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->nombre = $nombre;
        $this->telefonoCelular = $telefonoCelular;
        $this->telefonoFijo = $telefonoFijo;
        $this->tipo = $tipoUsuario;
        $this->insertar();
    }

    public function inicializar() {
        $this->apellido = '';
        $this->numeroDocumento = '';
        $this->contrasenia = '';
        $this->correo = '';
        $this->direccion = '';
        $this->fechaNacimiento = '';
        $this->nombre = '';
        $this->telefonoCelular = '';
        $this->telefonoFijo = '';
    }

    /**
     * @param mixed $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
        $this->actualizar('apellido', $this->getApellido());
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }



    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     *
     */
    public function setTipoDocumento($tipoDocumento){

        $this->tipoDocumento = $tipoDocumento;

    }

    /**
     *
     */
    public function getTipoDocente(){

        return $this->tipoDocumento;
    }

    /**
     * @param mixed $numeroDocumento
     */
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
        $this->actualizar('numeroDocumento', $this->getNumeroDocumento());
    }

    /**
     * @return mixed
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    /**
     * @param mixed $contrasenia
     */
    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;
        $this->actualizar('contrasenia', $this->getContrasenia());
    }

    /**
     * @return mixed
     */
    public function getContrasenia()
    {
        return $this->contrasenia;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
        $this->actualizar('correo', $this->getCorreo());
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
        $this->actualizar('direccion', $this->getDireccion());
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
        $this->actualizar('fechaNacimiento', $this->getFechaNacimiento());
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        $this->actualizar('nombre', $this->getNombre());
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $telefonoCelular
     */
    public function setTelefonoCelular($telefonoCelular)
    {
        $this->telefonoCelular = $telefonoCelular;
        $this->actualizar('telefonoCelular', $this->getTelefonoCelular());
    }

    /**
     * @return mixed
     */
    public function getTelefonoCelular()
    {
        return $this->telefonoCelular;
    }

    /**
     * @param mixed $telefonoFijo
     */
    public function setTelefonoFijo($telefonoFijo)
    {
        $this->telefonoFijo = $telefonoFijo;
        $this->actualizar('telefonoFijo', $this->getTelefonoFijo());
    }

    /**
     * @return mixed
     */
    public function getTelefonoFijo()
    {
        return $this->telefonoFijo;
    }

    /**
     *
     * @param string $correo
     */
    public function obtener($criterio='', $valor = '') {

        if($criterio != '' && $valor != '') {
            $this->peticion = "
						SELECT *
						FROM Usuario
						WHERE Usuario.$criterio = '$valor'";
            $this->obtener_resultados_consulta();
            //Quitar al pasar a Master
            //$this->errores();
        }

        //print_r($this->filas);

        if(count($this->filas) == 1) {
            echo "ENCONTRO AL USUARIO";
            $este = 'this';
            foreach ($this->filas[0] as $atributo=>$valor) {
                $$este->$atributo = $valor;
            }
        }else {
            $this->inicializar();
        }


    }


    /**
     * Método que permite actualizar los datos de un usuario.
     * @param unknown $nombre_atributo: Indica el atributo que desea modificarse.
     * @param unknown $valor: Indica el nuevo valor que se dará al atributo especificado.
     */
    private function actualizar($nombreAtributo, $valor) {
        $this->$nombreAtributo = $valor;
        $this->peticion = "
					UPDATE Usuario SET " . $nombreAtributo . " = '$valor'
					WHERE correo = '$this->correo'
					";
        $this->ejecutar_peticion_simple();
        //Quitar al pasar a Master
        $this->errores();
    }

    public function __toString() {
        return  "<br>".$this->numeroDocumento."<br>".$this->nombre."<br>".$this->apellido."<br>".$this->correo."<br>".$this->contrasenia."<br>".
                $this->fechaNacimiento."<br>".$this->direccion;
    }

    public function consultar($codigo) {
        $this->peticion = "
        select u.correo, u.contrasenia, u.nombre, u.apellido, u.numeroDocumento, u.fechaNacimiento, u.direccion, u.telefonoFijo, u.telefonoCelular, u.codigo, a.promedioPonderado, a.semestreFinalizacionMaterias, a.reporteFinalizacionMaterias, a.reportePazSalvo, a.reciboInscripcion
              from Usuario u, Aspirante a
              where u.idUsuario = a.idUsuario and u.codigo = '$codigo'
        ";

        $this->obtener_resultados_consulta();

        return $this->filas[0];
    }

    public function obtenerDatos($correo) {
        if($correo != '') {
            $this->peticion = "
                        SELECT tipo
						FROM Usuario
						WHERE Usuario.correo = '$correo'";

            $this->obtener_resultados_consulta();
            //Quitar al pasar a Master
            $this->errores();
        }

        if($this->filas[0]['tipo'] == 1) {
            echo "Aspirante";
        }else if($this->filas[0]['tipo'] == 2) {
            echo "Es Docente";
        }

        //print_r( $this->filas);

     }


    public function insertar(){


        $this->peticion = "
                    INSERT INTO Usuario (numeroDocumento, tipoDocumento, codigo, nombre, apellido, correo, contrasenia, fechaNacimiento,
                                          telefonoFijo, telefonoCelular, direccion, tipo)
                    VALUES ('$this->numeroDocumento', '$this->tipoDocumento', '$this->codigo', '$this->nombre', '$this->apellido', '$this->correo', '$this->contrasenia',
                     '$this->fechaNacimiento', '$this->telefonoFijo', '$this->telefonoCelular', '$this->direccion', '$this->tipo')
                    ";

        $this->ejecutar_peticion_simple();


        //$this->errores();
    }

}
?>