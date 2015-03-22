<div class="container">
	<div class="row">
	<div class="col-md-8">
	<h1>Tu red social</h1>
  <hr>
  <img src="res/imgs/social.jpg" class="img-responsive">
	<br><p class="lead">Comparte momentos, pensamientos , imagenes y mucho mas con tus amigos!</p>

	</div>
	<div class="col-md-4">
	<!-- start a panel-->
	<!-- <div class="panel panel-default">
	<div class="panel-heading">Iniciar Sesi&oacute;n</div>
	<div class="panel-body">
		
		<form role="form" method="post" action="./index.php?r=users/login">
  <div class="form-group">
    <label for="exampleInputEmail1">Correo Electronico</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Escribe tu correo electronico">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contrase&ntilde;a</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Escribe tu Contrase&ntilde;a">
  </div>
  <button type="submit" class="btn btn-default">Iniciar Sesi&oacute;n</button>
</form>

	</div>
	</div>
  -->
	<!-- end a panel -->
	<!-- start a panel-->
	<div class="panel panel-default">
	<div class="panel-heading">Registrate</div>
	<div class="panel-body">
		
		<form role="form" method="post" action="./index.php?r=users/register">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Escribe tu correo electronico">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Apellidos</label>
    <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" placeholder="Escribe tu correo electronico">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Fecha de nacimiento</label>
    <input type="date" name="day_of_birth" class="form-control" id="exampleInputEmail1" placeholder="Fecha de nacimiento">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Genero</label>
    <input type="radio" name="gender" value="m" required> Hombre
    <input type="radio" name="gender" value="f" required> Mujer
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Pais</label>
    <select name="country_id" class="form-control" required>
    <?php foreach($this->countries as $country):?>
      <option value="<?php echo $country->id;?>"><?php echo $country->name;?></option>
    <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Correo Electronico</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Escribe tu correo electronico">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contrase&ntilde;a</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Escribe tu Contrase&ntilde;a">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirma Contrase&ntilde;a</label>
    <input type="password" name="confirm" class="form-control" id="exampleInputPassword1" placeholder="Escribe tu Contrase&ntilde;a">
  </div>

  <button type="submit" class="btn btn-default">Registrate</button>
</form>

	</div>
	</div>
	<!-- end a panel -->
	</div>
	</div>
</div>