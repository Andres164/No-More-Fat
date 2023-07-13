<?php
session_start();
if( empty($_SESSION['credencialesDeSesionNutri']) ) {
  header('Location: index.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Register prescriptions</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

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

    
    <!-- Custom styles for this template -->
    <link href="../styles/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
      <h2>Register prescriptions</h2>
    </div>

      <div class="container">
        <form method="POST" action="../php/generarReceta.php" class="needs-validation" novalidate>
          <div class="row g-3">
            <br>
            <h4>Pacient Information</h4>
            <hr class="my-4">
            <div class="col-12">
              <label for="id_cita" class="form-label">Enter the appointment number</label>
              <input name="id_cita" type="text" class="form-control" id="firstName" required>
              <div class="invalid-feedback">
                Please provide a valid appointment number.
              </div>
            </div>
            
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Username</label>
              <input name="nombre_usuario" type="text" class="form-control" id="firstName" required>
              <div class="invalid-feedback">
                Valid Username is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Weight (Kg)</label>
              <input name="peso_inicial" type="number" step="0.01" min="1" max="999.99" class="form-control" id="lastName" placeholder="Weight" required>
              <div class="invalid-feedback">
                Valid Weight is required.
              </div>
            </div>
            <h4 style="margin-top: 4rem;">Prescription Information</h4>
            <hr class="my-4">

            <div class="col-12">
              <label for="username" class="form-label">Finish date</label>
              <div class="input-group has-validation">
                <input name="fecha_final" type="date" class="form-control" id="username" required>
              <div class="invalid-feedback">
                  Finish date is required
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="descripcion" class="form-label">Description</label>
              <textarea maxlength="600" name="descripcion" type="text" id="descripcion" class="form-control"></textarea>
            </div>

          <div class="col-12">
            <label for="medicamento" class="form-label">Select the medicine to add for the prescription</label>
            <select name="medicamentos" class="form-select" id="medicamento">
              <option value="">Choose...</option>
              <!-- select id, medicamento from medicamentos -->
              <?php
            require_once '../dbConnection/SELECT/medicamentos.php';
            $medicamentos = selectMedicamentos();
            while($medicamento = mysqli_fetch_array($medicamentos)) {
              echo '<option>' . $medicamento['id_medicamento'] . ' '  . $medicamento['medicamento'] .'</option>';
            }
            ?>
            </select>
            <button style="margin-top: 0.5rem;" type="button" class="btn btn-primary btn-sm">Add</button>
          </div>

          <div class="col-12">
            <label for="comida" class="form-label">Select the meals to add for the prescription</label>
            <select name="alimentos" class="form-select" id="comida">
              <option value="">Choose...</option>
              <!-- select id, nombre from alimentos -->
              <?php
              require_once '../dbConnection/SELECT/alimentos.php';
              $alimentos = selectAlimentos();
              
              while($alimento = mysqli_fetch_array($alimentos)) {
                echo '<option>' . $alimento['id_alimento'] . ' '  . $alimento['alimento'] .'</option>';
              }
              ?>
            </select>
            <button style="margin-top: 0.5rem;" type="button" class="btn btn-primary btn-sm">Add</button>
          </div>

          <button class="w-100 btn btn-primary btn-lg" type="submit">Finish</button>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2022 No More Fat</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


    <script src="../js/form-validation.js"></script>
  </body>
</html>
