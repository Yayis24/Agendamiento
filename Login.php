

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image" href="img/logo.png" >
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/stylelogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://kit.fontawesome.com/1ade5e208e.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1ade5e208e.js" crossorigin="anonymous"></script>

</head>
<body>




<section id="do">

    <div id="contenedor">
            
        <div id="contenedorcentrado">
            <div id="login">
                <form action="vista/personal.php" method="post" id="loginform">
                    <label for="usuario">Usuario</label>
                    <input id="usuario" type="text" name="usuario" placeholder="Usuario" required>
                    
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" placeholder="Contraseña" name="contrasena" required><br>
                    
                    <input id="in" type="submit" name="ingresar" onclick = "location='vista/personal.php'"/>
                </form>
                
            </div>
            <div id="derecho">
                <div class="titulo">
                    Bienvenido
                </div>
                <hr>
                <div class="pie-form">
                    <a href="crearregistro.php">¿No tienes Cuenta? Registrate</a>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    </section>

<!-- Footer -->
<footer >
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