<?php
include_once 'Controller/control.php';
include_once 'Config/conexion.php';

//instancia de la clase control
$Controller = new control();

//condicion si hay o no peticion, como la primera vez no existe ninguna peticion me carga una vista inicial
if (!isset($_REQUEST['c'])){
   $Controller->index();
}else{
   $action =  $_REQUEST['c'];
   call_user_func(array($Controller, $action));
}
  
?>