<?php

require_once '/application/controller/SistemaCursoProfundizacion.php';

$aplicacion = new SistemaCursoProfundizacion();

//$aplicacion->iniciarSesion('yei558@gmail.com', '123', 'estudiante');

//$aplicacion->enviarCorreo('yei558@gmail.com', 'Correo Cursoft', 'Hola esta es la prueba de correo de cursoft');

//$aplicacion->enviarCorreo('abdul.laiseca@gmail.com', 'Correo Cursoft', 'Hola esta es la prueba de correo de cursoft');

//$aplicacion->enviarCorreo('jhorapb@gmail.com', 'Correo Cursoft', 'Hola esta es la prueba de correo de cursoft');

$aplicacion->recuperarContraseña('yei558@gmail.com');
/*
if($_GET['']) {

}
*/

?>