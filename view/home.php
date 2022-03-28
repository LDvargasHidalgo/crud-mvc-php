<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="./resources/css/style.css">
   <title>Document</title>
</head>
<body>
<!-- ---------------------NAVBAR------ -->

 <nav class="navbar navbar-dark bg-dark text-warning justify-content-center  ">     
    <h1 class="py-4 ">Agenda</h1>
 </nav>

 <div class="container py-4">
    <div class="row">
       
       <div class="col">
       
         <table class="table  table-hover table-bordered border-secondary align-middle caption-top table-light">          
            <caption>Citas de Desarrolladores</caption>
            <thead >
               <tr class="table-dark text-center ">
                  <th>Nombre </th>
                  <th>Tema a Consultar</th>
                  <th>Fecha </th>
                  <th>Hora</th>
                  <th>Fecha creación cita</th>
                  <th>Eliminar</th>
                  <th>Editar</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($this->MODEL->listar()as $k):?>
               <tr class="text-center" >
                  <td><?php echo $k->nombre; ?></td>
                  <td><?php echo $k->tema; ?></td>
                  <td><?php echo $k->fecha_cita; ?></td>
                  <td><?php echo $k->hora_cita; ?></td>
                  <td><?php echo $k->fecha_creacion; ?></td>
                  <td>
                     <a href="?c=eliminar&id=<?php echo $k->id; ?>" class="btn btn-danger">Eliminar</a>
                  </td>
                  <td>
                     <a href="?c=nuevo&id=<?php echo $k->id; ?>" class="btn btn-warning">Editar</a>
                  </td>
               </tr> 
               <?php endforeach?>
            </tbody>           
         </table>
         <a href="?c=nuevo" class="btn btn-warning">Nueva Cita</a>
       </div>
    </div>
 </div>

 

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>