<?php
include_once 'Model/appointment.php';
class control{

   public $MODEL;
// creo un constructor para que se  carge la instancia de ese modelo.
public function __construct(){
   $this->MODEL = new appointment();
}
   public function index(){
      include_once 'view/home.php'; 
   }

//si va a una peticion de un id por una url que invoque esa petición
public function nuevo(){
   $alm = new appointment();
   if(isset($_REQUEST['id'])){
      $alm = $this->MODEL->cargarID($_REQUEST['id']);
   }
   include_once 'view/save.php';
}

   public function guardar(){
      $alm = new appointment();
      $alm->nombre = $_POST['txtNombre'];
      $alm->tema = $_POST['txtTema'];
      $alm->fecha_cita = $_POST['txtFecha'];
      $alm->hora_cita = $_POST['txtHora'];

      //invocar la funcion registrar que recibe de parametro alm
      $this->MODEL-> registrar($alm);
      header("Location: index.php");
   }

   

//Delete function
public function eliminar(){
   $this->MODEL->delete($_REQUEST['id']);

   header("Location: index.php");
}

}
?>