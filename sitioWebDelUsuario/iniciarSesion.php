<?php
session_start();
$logInInfo = '';
if( !empty($_POST['email']) && !empty($_POST['password']) ) {
  require '../dbConnection/SELECT/pacientes.php';
  $paciente = mysqli_fetch_array(selectPacientes($_POST['email']));
  if( !empty($paciente) && $paciente['password'] == $_POST['password']){
    $_SESSION['credencialesDeSesion'] = $paciente;
    header('Location: bioDeNutriologa.html'); // Debe redireccionar a la paguina que pidio el inicio de sesion 
  } else
    $logInInfo = 'email y/o contraseña incorrectos';
} else {
  $logInInfo = 'Escribe tu email y contraseña';
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de sesion</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


<!--CSS -->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <link href="../styles/signin.css" rel="stylesheet">
  </head>
  <!-- body -->
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form method="POST", action="iniciarSesion.php" class="shadow bg-body" id="logInContainer">
    <img class="mb-4" src="#" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Inicio de sesion</h1>
    
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
      <label for="floatingInput">Correo electronico</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Contraseña</label>
    </div>
    <?php echo '<p style="align-content: center; color: red;">' . $logInInfo . '</p>'; ?>
    <button class="w-100 btn btn-primary" type="submit">Iniciar sesion</button>
    <div class="checkbox mb-3" style="text-align: left; margin-top: 5px;">
      <label>
        <input type="checkbox" value="remember-me"> Recordarme
      </label>
    </div>
  </form>
  <br>
<br>
  <div>
    <label>¿No tienes cuenta?</label>
    <br>
    <p><a style="margin-top: 10px;" class="btn btn-sm btn-secondary" href="registrarCuenta.html">Registrate ahora</a></p>
  </div>
</main>


    
  </body>
</html>
<rm>
</body>
</html>