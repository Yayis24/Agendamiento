
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="icon" type="image" href="../img/logo.png" >
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleconsulta.css">
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
        <li><a href="registros.php">Registros</a></li>
        <li><a class="active" href="consulta.php">Consultas</a></li>


    </ul>
</nav>

<section>
<center>
        <br>
<div id="container">
    <h2>Consulta de pacientes</h2>
<form action="" method="post">
    <table>
        <tr>
        <td><label>Digite El Numero De Documento</label><input type="text" name="ConsultaDocumento" 
        class="form-control"  style="width: 100%"></td>
        </tr><br>
        <tr>
        <td colspan="2"><br><center><input id="boton" type="submit" name="btn_consultar" value="Consultar" class="btn btn-info btn-lg"></center>
        </td>
        </tr>
        <tr>
        <td colspan="2"></td>
    </table>
    <br>
    </center>

    <?php
    
    include_once "../modelo/config.php";
    if(isset($_POST['btn_consultar']))
    {
        $documento = $_POST['ConsultaDocumento'];
        $existe =0;

        if($documento=="")
        {
            echo "<script> alert('Campo Obligatorio')
      location.href = '../vista/consulta.php';</script>";
        }
        else{
            $resultado = mysqli_query($conectar, "SELECT pe.Profesional as profesional, h.Horario as horario, p.id as id, p.Nombre as nombre, p.Apellido as apellido, p.Documento as documento, p.Celular as celular, p.Fecha as fecha  FROM paciente p INNER JOIN citas c ON p.id=c.Id_paciente INNER JOIN horario h ON c.Id_horario=h.id
            INNER JOIN personal pe ON c.id_personal=pe.id WHERE documento = '$documento'");
            

            while($consulta = mysqli_fetch_array($resultado))
            {
                echo "
                <center><table width=\"70%\border\"1\">
                <tr>
                <td><center><b>Nombre</b></center></td>
                <td><center><b>Apellido</b></center></td>
                <td><center><b>Documento</b></center></td>
                <td><center><b>Celular</b></center></td>
                <td><center><b>Fecha</b></center></td>
                <td><center><b>horario</b></center></td>
                <td><center><b>profesional</b></center></td>
                </tr>
                <tr>
                <td><center>".$consulta['nombre']."</center></td>
                <td><center>".$consulta['apellido']."</center></td>
                <td><center>".$consulta['documento']."</center></td>
                <td><center>".$consulta['celular']."</center></td>
                <td><center>".$consulta['fecha']."</center></td>
                <td><center>".$consulta['horario']."</center></td>
                <td><center>".$consulta['profesional']."</center></td>

                </tr>
                </table></center>";

                $existe++;

            if($existe==0){
                echo "<script> alert('Numero de Documento digitado no encontrado')
                location.href= '../vista/consulta.php';</script>";
           
           
           
              }

            }
        }
    }


?>
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