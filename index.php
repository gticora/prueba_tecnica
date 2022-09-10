<?php

include("clases/formulario.class.php");


    $data = new formulario;
    $valor_areas= $data->listado_area();
    $valor_roles= $data->listado_roles();
    // echo '<pre>';
    //      print_r($valor_roles );
            
    //          echo '</pre>';


?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>CRUD SINERGIA</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"></head>

<body>
<header> 
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="index.php">Prototipo de formulario (crear/modificar)</a>
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
  <h3 class="mt-5">DEMO</h3>
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
        <h5 class="modal-title">Agregar nuevo registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      <div class="modal-body">
        <div class="form-group">
          <label for="NumeUsua">Nombres completos</label>
          <input  type="text" id="NumeUsua" value=""  class="form-control"/>
        </div>
        <div class="form-group">
          <label for="Nombre1">Correo electronico</label>
          <input type="text" id="Nombre1" value=""   class="form-control"/>
        </div>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" id="M">
          <label class="form-check-label" for="flexRadioDefault1">
            Masculino
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sexo" id="F">
          <label class="form-check-label" for="flexRadioDefault2">
            Femenino
          </label>
        </div>

        <div class="form-group">
        <label for="Genero">Area</label>
        <select name="marca" id="Genero" class="form-control">
          <?php $m=0;
            while($m<count($valor_areas)){
              echo '<option value="'.$valor_areas[$m]['id'].'">'.$valor_areas[$m]['nombre'].'</option>';
              $m++;
            }
          ?>
        </select>
        </div>
        <div class="form-group">
          <label for="Nombre1">Descripción</label>
          <textarea class="form-control" id="descripcion" rows="3"></textarea>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Deseo recibir boletin informativo
          </label>
        </div>

        <?php $r=0; while($r<count($valor_roles)):?>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?=$valor_roles[$m]['id']?>" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              <?=$valor_roles[$r]['nombre']?>
            </label>
          </div>
        <?php $r++; endwhile; ?>
       
        <!-- <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
          <label class="form-check-label" for="flexCheckChecked">
            Checked checkbox
          </label>
        </div> -->


      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="addRecord()">Agregar</button>
      </div>
    </div>
  </div>
</div>
<!-- // Modal --> 

<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
        <h5 class="modal-title">nuevos registros</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      
      <div class="modal-body">
        <div class="form-group">
          <label for="idalumno">Tipo Documento</label>
           <select name="tipo" id="tipoDocu" class="form-control">
            <option value="1">CC</option>
            <option value="2">TI</option>
            <option value="3">RC</option>
        </select>
        </div>
        <div class="form-group">
          <label for="NumeUsua">Documento</label>
          <input  type="text" id="NumeUsua" value=""  class="form-control"/>
        </div>
        <div class="form-group">
          <label for="Nombre1">Primer Nombre</label>
          <input type="text" id="Nombre1" value=""   class="form-control"/>
        </div>
        <div class="form-group">
          <label for="Nombre2">Segundo Nombre</label>
          <input type="text" id="Nombre2" value=""   class="form-control"/>
        </div>
        <div class="form-group">
          <label for="Apellido1">Primer Apellido</label>
          <input type="text" id="Apellido1" value=""   class="form-control"/>
        </div>
        <div class="form-group">
          <label for="Apellido2">Segundo Apellido</label>
          <input type="text" id="Apellido2" value=""   class="form-control"/>
        </div>
  
          <div class="form-group">
        <label for="Genero">Genero</label>
        <select name="marca" id="Genero" class="form-control">
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
        </select>
        </div>
       <div class="form-group">
          <label for="IdDepa">Departamento</label>
          <select  name="IdDepa" id="IdDepa"  class="form-control">
            <option value="tolima">Tolima</option>
            <option value="huila">Hulia</option>
          </select> 
          </div>

           <div class="form-group">
          <label for="IdMuni">Municipio</label>
           <select  name="IdMuni" id="IdMuni"  class="form-control">
          </select>
          </div> 

      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick=" UpdateUserDetails()" >Guardar Cambios</button>
        <input type="hidden" id="hidden_user_id">
      </div>
    </div>
  </div>
</div>

<!-- // Modal --> 
<!-- Jquery JS file --> 
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script> 
<!-- Bootstrap JS file --> 
<!-- Custom JS file --> 
<script type="text/javascript" src="js/script.js"></script> 
<!-- Fin crud jquery-->
<scriptsrc="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script language="javascript">
var options = {
    tolima : ["Ibague","Alvarado","Espinal"],
    huila : ["Neiva","Tello","Garzon"]
}

$(function(){
  var fillSecondary = function(){
    var selected = $('#IdDepa').val();
    $('#IdMuni').empty();
    options[selected].forEach(function(element,index){
      $('#IdMuni').append('<option value="'+element+'">'+element+'</option>');
    });
  }
  $('#IdDepa').change(fillSecondary);
  fillSecondary();
});

</script>
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