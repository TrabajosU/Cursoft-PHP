<?php
/**
 * Created by PhpStorm.
 * User: YeisonVargas
 * Date: 16/05/14
 * Time: 10:22 AM
 */

require_once ('application/libs/baseDatos.php');


class Aspirante extends Usuario {

<<<<<<< HEAD
=======

>>>>>>> b338c075236004c77b5639b24b3badad2becda2e
    private $idAspirante;
    private $idUsuario;
    private $promedioPonderado;
    private $semestreFinalizacionMaterias;
    private $reporteFinalizacionMaterias;
    private $reportePazSalvo;
    private $reciboInscripcion;
    private $estado;


    function __construct(){

    }

    function crearAspirante($correo, $contrasenia, $nombres, $apellidos,
                            $tipoDocumento, $numeroDocumento, $fechaNacimiento, $direccionResidencia,
                            $telefonoResidencia, $telefonoMovil, $codigo, $promedioPonderado,
                            $semestreTerminacionMaterias, $reciboTerminacionMaterias, $reciboPazSalvo,
                            $reciboPagoInscripcion){

        $this->crear($codigo, $apellidos, $numeroDocumento, $contrasenia, $correo, $direccionResidencia, $fechaNacimiento, $nombres, $telefonoMovil, $telefonoResidencia);


        $this->promedioPonderado = $promedioPonderado;
        $this->semestreFinalizacionMaterias = $semestreTerminacionMaterias;
        $this->reporteFinalizacionMaterias = $reciboTerminacionMaterias;
        $this->reportePazSalvo = $reciboPazSalvo;
        $this->reciboInscripcion = $reciboPagoInscripcion;
        $this->estado = 0;
        $this->insertarAspirante();
    }


    /**
     *
     */
    public function getIdAspirante() {

        return $this->idAspirante;
    }


    /**
     * @param mixed $nombre
     */
    public function setReciboMatricula($reciboMatricula){

        $this->reciboMatricula = $reciboMatricula;
        $this->actualizar('reciboMatricula', $this->reciboMatricula);
    }

    /**
     * @return mixed
     */
    public function getReciboMatricula(){

        return $this->reciboMatricula;

    }


    /**
     * @param mixed $nombre
     */
    public function setEstado($estado){
        $this->estado = $estado;
        $this->actualizar('estado', $this->estado);
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }


    public function insertarAspirante(){

        echo "INSERTAR DE ASPIRANTE: <br> Este es el ID DEL HP USUARIO EN ASPIRANTE";

        echo $this->idUsuario;

        $this->peticion = "
                    INSERT INTO Aspirante (idUsuario, promedioPonderado, semestreFinalizacionMaterias, reporteFinalizacionMaterias,
                    reportePazSalvo, reciboInscripcion, estado) VALUES ($this->idUsuario,'$this->promedioPonderado', '$this->semestreFinalizacionMaterias',
                    '$this->reporteFinalizacionMaterias', '$this->reportePazSalvo', '$this->reciboInscripcion', '$this->estado')
                    ";

        $this->ejecutar_peticion_simple();

        $this->errores();
    }


    /**
     * @param $nombreAtributo
     * @param unknown $valor
     */
    private function actualizar($nombreAtributo, $valor) {

        $this->$nombreAtributo = $valor;
        $this->peticion = "
					UPDATE Aspirante SET " . $nombreAtributo . " = '$valor'
					WHERE Aspirante.idAspirante = '$this->idAspirante'
					";

        $this->ejecutar_peticion_simple();
        //Quitar al pasar a Master
        $this->errores();
    }

    /**
     * @param string $correo
     */
    public function obtenerAspirante($codigo = '') {

        $this->obtener('', $codigo);

        if($codigo != '') {
            $this->peticion = "
						SELECT Aspirante.*
						FROM Usuario, Aspirante
						WHERE Usuario.codigo = '$codigo' AND Usuario.idUsuario = Aspirante.idUsuario
                        ";
            $this->obtener_resultados_consulta();
            //Quitar al pasar a Master
            $this->errores();
        }

        if(count($this->filas) == 1) {
            $este = 'this';
            foreach ($this->filas[0] as $atributo=>$valor) {
                $$este->$atributo = $valor;
            }
        }else {
            $this->inicializar();
        }

    }











































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































} 