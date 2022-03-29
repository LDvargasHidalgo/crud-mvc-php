<?php
class appointment{
   // creamos constructor que es lo primero que se va a cargar en la instancia de esa clase
   public $CNX;
   public $id;
   public $nombre;
   public $tema;
   public $fecha_cita;
   public $hora_cita;
   public $fecha_creacion;

   public function  __construct(){
      try{
         $this->CNX = conexion::conectar();
      }catch (Exception $e){
         die($e->getMessage());
      }
   }
   public function listar(){
      try{
         $query = "SELECT id, nombre, tema, fecha_cita, hora_cita, fecha_creacion from cita";
         $smt = $this->CNX->prepare($query);
         $smt->execute();
         return $smt->fetchAll(PDO::FETCH_OBJ);         
      }catch(Exception $e){
         die($e->getMessage());
      }
   }

   public function cargarID($id){
      try{
         $query ="SELECT* from cita where id=?";
         $smt = $this->CNX-> prepare($query);
         $smt->execute(array($id));
         return $smt->fetch(PDO::FETCH_OBJ);         
      }catch (Exception $e){ 
         die($e->getMessage());
      }
   }

   //function Delete
   public function delete ($id){
      try{
         $query = "DELETE from cita where ID=?";
         $smt = $this->CNX->prepare($query);
         $smt->execute(array($id));       
      }catch(Exception $e){
         die($e->getMessage());
      }
   }

   public function registrar (appointment $data){
      try{
         $query = "INSERT INTO cita (nombre, tema, fecha_cita, hora_cita ) VALUES (?,?,?,?)";
         $this->CNX->prepare($query)->execute(array($data->nombre, $data->tema, $data->fecha_cita, 
                  $data->hora_cita));
      }catch(Exception $e){
         die($e->getMessage());
      }
   }

   public function actualizarDatos($data){
      try{
         $query = "UPDATE  cita  set nombre=?, tema=?, fecha_cita=?, hora_cita=? WHERE id=?";
         $this->CNX->prepare($query)->execute(array($data->nombre,$data->tema,$data->fecha_cita,$data->hora_cita, $data->id));
      }catch(exception $e){
         die($e->getMessage());
      }
   }
}
?>