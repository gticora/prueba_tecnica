<?php

include("clases/formulario.class.php");

    $data = new formulario;
    $valor_areas= $data->listado_area();
    $valor_roles= $data->listado_roles();

?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>CRUD</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"></head>

<body>
<header> 
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="index.php">CRUD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a> </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
      </form>
    </div>
  </nav>
  
</header>

<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">Prototipo de formulario (crear/modificar)</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
<!-- Content Section --> 
<!-- crud jquery-->
<div class="da">
  <div class="row">
    <div class="col-md-12">
      <div class="pull-right">
        <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">NUEVO REGISTRO</button>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <div id="records_content"></div>
    </div>
  </div>
</div>
<!-- /Content Section --> 

<!-- Bootstrap Modals --> 
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <h5 class="modal-title">Crear empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-primary" role="alert">
        Los campos con asteriscos (*) son obligatorios
      </div>
      <form id='formulario' class="needs-validation" novalidate>
      <div class="modal-body">
        <div class="form-group">
          <label for="NumeUsua">Nombres completos*</label>
          <input  type="text" id="nombre" value=""  class="form-control" required/>
          <div class="invalid-feedback">
            Por favor, elije un nombre de empleado.
          </div>
        </div>
        <div class="form-group">
          <label for="Nombre1">Correo electronico*</label>
          <input type="email" id="email" value=""   class="form-control" required/>
          <div class="invalid-feedback">
            Por favor, elije un correo valido
          </div>
        </div>
        <label class="form-check-label" for="flexCheckDefault"> Sexo* </label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" id="M" value="M" required>
          <label class="form-check-label" for="flexRadioDefault1">
            Masculino
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" id="F" value="F" required>
          <label class="form-check-label" for="flexRadioDefault2">
            Femenino
          </label>
          <div class="invalid-feedback">
            Por favor, elije un sexo
          </div>
        </div>
        <div class="form-group">
        <label for="area">Area*</label>
        <select name="area" id="area" class="form-control" required>
          <?php $m=0;
            while($m<count($valor_areas)){
              echo '<option value="'.$valor_areas[$m]['id'].'">'.$valor_areas[$m]['nombre'].'</option>';
              $m++;
            }
          ?>
        </select>
        <div class="invalid-feedback">
          Selecciona un estado v??lido.
        </div>
        </div>
        <div class="form-group">
          <label for="Nombre1">Descripci??n*</label>
          <textarea class="form-control" id="descripcion" rows="3" required></textarea>
          <div class="invalid-feedback">
            Por favor, diligenciar una descripcion valida
          </div>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="1" id="boletin">
          <label class="form-check-label" for="flexCheckDefault">
            Deseo recibir boletin informativo
          </label>
        </div>
        <hr>
        <label class="form-check-label" for="flexCheckDefault"> Roles* </label>
        <?php $r=0; while($r<count($valor_roles)):?>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?=$valor_roles[$m]['id']?>" id="rol <?=$valor_roles[$m]['id']?>">
            <label class="form-check-label" for="flexCheckDefault">
              <?=$valor_roles[$r]['nombre']?>
            </label>
          </div>
        <?php $r++; endwhile; ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary" type="submit">Enviar formulario</button>
        <input type="hidden" id="hidden_user_id">
      </div>
      </form>
    </div>
  </div>
</div>
<!-- // Modal --> 

<script>

// Ejemplo de JavaScript inicial para deshabilitar el env??o de formularios si hay campos no v??lidos
(function () {
'use strict'

// Obtener todos los formularios a los que queremos aplicar estilos de validaci??n de Bootstrap personalizados
var forms = document.querySelectorAll('.needs-validation')

// Bucle sobre ellos y evitar el env??o
Array.prototype.slice.call(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }else{
        addRecord();
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>

<!-- // Modal --> 
<!-- Jquery JS file --> 
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script> 
<!-- Bootstrap JS file --> 
<!-- Custom JS file --> 
<script type="text/javascript" src="js/script.js"></script> 
<!-- Fin crud jquery-->
<scriptsrc="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 
  
</div>
<!-- Fin container -->
<footer class="footer">
  <div class="container"> <span class="text-muted">
    <p>Gustavo Ticora </p>
    </span> </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== --> 
<script src="dist/js/bootstrap.min.js"></script> 

<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>