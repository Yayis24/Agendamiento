<?php

include_once '../modelo/conexion.php';
$objeto = new conexion();
$conexion = $objeto->Conectar();
$consulta = "SELECT * FROM horario";
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
    <title>Citas</title>
    <link rel="icon" type="image" href="../img/logo.png" >
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/stylecitas.css">
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
        <li><a class="active" href="citas.php">Citas</a></li>
        <li><a href="registros.php">Registros</a></li>
        <li><a href="consulta.php">Consultas</a></li>


    </ul>
</nav>
<section class="form-register">
    <div class="carde">
    <h4>Registra tu cita</h4></div><br>

    <form action="" method="post">
      <div class="well">

                      <label for="nombre">Nombre:</label>
                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresa tu nombre" >
                  </div>
              </div>
  

                      <label for="apellido">Apellido:</label>
                      <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingresa tu apellido">
                  </div>
              </div>
          </div> <br>
  
          <div class="row">
  
              <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="Documento">Documento:</label>
                      <input type="number" name="Documento" id="Documento" class="form-control" placeholder="Ingresa tu numero de documento" >
                  </div>
              </div>
  
              <div class="col-xs-6 col-sm-6 col-md-6">
                  <div class="form-group">
                      <label for="celular">Celular:</label>
                      <input type="number" name="celular" id="celular" class="form-control" placeholder="Ingresa tu celular" >
                  </div>
              </div>
          </div> <br>

          <div class="row">
  
          <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
              <label for="fecha">Fecha:</label>
              <input type="date" name="fecha" id="fecha" class="form-control">
          </div></div> <br>
          
          <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
              <label>Hora:</label>
              <select  name="hora" class="form-control">
                    <option >Seleccione la hora</option>
                    <?php
                     foreach($datos as $filtro){
                        ?>
                        <option><?php echo $filtro['Horario']?>
                    </option>
                        <?php
                     }
                                ?>
        </select>
             </div>
         </div>
     </div>
  <br>
  <?php

include_once '../modelo/config.php';
$personal = $conectar->query("SELECT * FROM personal")

?>


  <div class="form-group">
  <label>Profesional:</label>
              <select  name="personal" class="form-control">
                    <option >Seleccione el profesional solicitado</option>
                    <?php
                     foreach($personal as $per){
                        ?>
                        <option><?php echo $per['id']?>---<?php echo $per['Profesional']?>
                    </option>
                        <?php
                     }
                                ?>
        </select>
  </div></div> <br>

              <input id="boton" type="submit" name="btn_guardar" value="Enviar" class="btn btn-success btn-lg">

            <?php
              include("../modelo/config.php");
              if(isset($_POST['btn_guardar']))
                          {
                              $nombre = $_POST['nombre']; 
                              $apellidos = $_POST['apellido'];
                              $documento = $_POST['Documento']; 
                              $celular = $_POST['celular'];
                              $fecha = $_POST['fecha']; 
                              $horario = $_POST['hora']; 
                              $personal = $_POST['personal']; 

                              if($nombre=="" || $apellidos=="" || $documento=="" ||   $celular=="" || $fecha=="" || $horario=="" ||  $personal=="" )

                              {
                                echo "<script> alert('Todos los campos son obligatorios')
                                location.href = '../vista/citas.php'; </script>";
                                }
                                else{
                              
                            $query = "INSERT INTO paciente (Nombre, Apellido, Documento, Celular, Fecha) 
                            values ('$nombre', ' $apellidos',' $documento', ' $celular', '$fecha' )";

                              if(mysqli_query($conectar, $query)){
                                $id_usuario=mysqli_insert_id($conectar);

                                $query2 = "INSERT INTO citas (Id_horario, Id_personal, Id_paciente) 
                                values ('$horario', ' $personal',' $id_usuario')";


                          }
                          

                     else{
                      echo"<script> alert('Error')
                      location.href = '../vista/citas.php';</script>";
                              }
                              if(mysqli_query($conectar, $query2)){
                                  echo"<script> alert('Registro Exitoso')
                                  location.href = '../vista/citas.php';</script>";
                          }
                         
                      }
                    }
                              ?>
            </div>
  </form>
    
</section>

    
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