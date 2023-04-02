<?php

include_once '../modelo/conexion.php';
$objeto = new conexion();
$conexion = $objeto->Conectar();
$consulta = "SELECT pe.Profesional as profesional, h.Horario as horario, p.id as id, p.Nombre as nombre, p.Apellido as apellido, p.Documento as documento, p.Celular as celular, p.Fecha as fecha  FROM paciente p INNER JOIN citas c ON p.id=c.Id_paciente INNER JOIN horario h ON c.Id_horario=h.id
INNER JOIN personal pe ON c.id_personal=pe.id";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="icon" type="image" href="../img/logo.png" >
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleregistro.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit.fontawesome.com/1ade5e208e.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1ade5e208e.js" crossorigin="anonymous"></script>

</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars-progress"></i>
        </label>
    <a href="" class="enlace">
        <img src="../img/dent.png" alt="" class="logo">
    </a>
    <ul>
        <li><a href="personal.php">Personal</a></li>
        <li><a href="citas.php">Citas</a></li>
        <li><a class="active" href="registros.php">Registros</a></li>
        <li><a href="consulta.php">Consultas</a></li>


    </ul>
</nav>


<div class="containerr">
        <h3 class="text-center">  Citas agendadas</h3>
        

        <table class="table table-striped">
        <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Documento</th>
      <th scope="col">Celular</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Profesional</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>



    </tr>
    </thead>
  <tbody>
    <?php
    foreach($datos as $filtro){
      ?>
      <tr>
        <td><?php echo $filtro['id']?></td>
        <td><?php echo $filtro['nombre']?></td>
        <td><?php echo $filtro['apellido']?></td>
        <td><?php echo $filtro['documento']?></td>
        <td><?php echo $filtro['celular']?></td>
        <td><?php echo $filtro['fecha']?></td>
        <td><?php echo $filtro['horario']?></td>
        <td><?php echo $filtro['profesional']?></td>
        <td><button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar"><i class="fa-regular fa-pen-to-square"></i></button></td>
        <td><button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="fa-solid fa-trash"></i></button></td>


      </tr>
      <?php
    }
    ?>
   
  </tbody>
</table>
    </div>

        <!--Modal de editar-->

    <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
         <h1 class="modal-title fs-5" id="exampleModalLabel">Actualización de Datos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="controlador/editar.php" method="post">
      <input type="hidden" name="id" id="update_id">

    <!--Formulario-->


     
     <div class="form-group">
     <label for="">Nombre</label>
     <input type="text" name="nombre" id="nombre" class="form-control">
     </div><br>
     
     <div class="form-group">
     <label for="">Apellido</label>
     <input type="text" name="apellido" id="apellido" class="form-control">
     </div><br>

     <div class="form-group">
     <label for="">Documento</label>
     <input type="number" name="documento" id="documento" class="form-control">
     </div><br>
     
     <div class="form-group">
     <label for="">Celular</label>
     <input type="number" name="edad" id="edad" class="form-control">
     </div><br>

     <div class="form-group">
     <label for="">Fecha</label>
     <input type="date" name="documento" id="documento" class="form-control">
     </div><br>
     
     <div class="form-group">
      <label for="">Hora</label>
      <select name="horario" id="horario" class="form-control">
     
   <option> --- Seleccione -- </option>
    <?php
                        foreach($datos as $filtro){
                    ?>
   <option><?php echo $filtro['Id_horario']?></option>
    <?php
                        }
                    ?>
   </select>
     
     </div><br>

     <div class="form-group">
      <label for="">Profesional</label>
      <select name="profesional" id="profesional" class="form-control">
     
   <option> --- Seleccione -- </option>
    <?php
                        foreach($datos as $filtro){
                    ?>
   <option><?php echo $filtro['Id_personal']?></option>
    <?php
                        }
                    ?>
   </select>
     
     </div><br>

      </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>

    <!--Modal de eliminar-->

    <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
         <h1 class="modal-title fs-5" id="eliminar">Eliminar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4>¿Quieres eliminar este dato?</h4>
      <form action="../controlador/eliminar.php" method="post">
    <input type="hidden" name="id" id="delete_id">
      </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">No</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  $('.editbtn').on('click',function(){
    $tr=$(this).closest('tr');
    var datos=$tr.children("td").map(function(){
      return $(this).text();
    });
    $('#update_id').val(datos[0]);
    $('#nombre').val(datos[1]);
    $('#apellido').val(datos[2]);
    $('#documento').val(datos[3]);
    $('#celular').val(datos[4]);
    $('#fecha').val(datos[5]);
    $('#horario').val(datos[6]);
    $('#profesional').val(datos[7]);


  });

</script>

<script>
  $('.deletebtn').on('click' ,function() {
    $tr=$(this).closest('tr');
    var datos=$tr.children("td").map(function(){
      return $(this).text();
      });
      $('#delete_id').val(datos['0']);

  })
</script>

    <!-- Footer -->
<footer id="foo">
    <div class="container p-4">
      <section class="mb-4">
        <div class="container text-center">
            <div class="row">
              <div class="col">
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-facebook-f"></i
        ></a>
              </div>
              <div class="col">
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-twitter"></i
              ></a>
              </div>
              <div class="col">
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-google"></i
        ></a>
              </div>
              <div class="col">
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
                ><i class="fab fa-instagram"></i
              ></a>
              </div>
              <div class="col">
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-linkedin-in"></i
        ></a>
              </div>
              <div class="col">
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
          ><i class="fab fa-github"></i
        ></a>
              </div>
            </div>
          </div>
    
      </section>
  <br>
    <div id="colors" class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Yaya
  </footer>
  <!-- Footer -->



    
</body>
</html>