<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link rel="icon" type="image" href="img/logo.png" >
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylecitas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit.fontawesome.com/1ade5e208e.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1ade5e208e.js" crossorigin="anonymous"></script>

</head>
<body>

<section class="re">
    <div class="carde">
    <h4>Registrate</h4></div><br>

    <form action="" method="post">
      <div class="well">

                      <label for="nombre">Usuario:</label>
                  <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingresa tu usuario" required >
                  </div>
              </div><br>
  

                      <label for="apellido">Contraseña:</label>
                      <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Ingresa tu contraseña" required>
                  </div>
              </div>
          </div> 
  
          
     </div>
  <br>
  </div></div> 

              <input id="boton2" type="submit" name="btn_guardar" value="Enviar" class="btn btn-success btn-lg"> <br>

            <?php
              $conectar=mysqli_connect('localhost','root','','clinica');
              if(isset($_POST['btn_guardar']))
                          {
                              $usuario = $_POST['usuario']; 
                              $contrasena = $_POST['contrasena'];

                              $query = mysqli_query ($conectar, "INSERT INTO usuarios (usuario, contrasena) 
                              values ('$usuario', ' ".password_hash($contrasena, PASSWORD_DEFAULT)."' )");
                                
                                if($query){
                                    echo"<script> alert('Registro exitoso')
                                    location.href = 'Login.php';</script>";


                                } else{
                                    echo "Error: ". $query . "<br>" . mysqli_error($conectar);
                              }

                              mysqli_close($conectar);}
                    
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