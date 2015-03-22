<?php
?>
<div class="container">
<div class="row">

<div class="col-md-12">
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>
</div>
</div>
	<div class="row">
		<div class="col-md-3">

<div class="list-group">
  <a href="#" style="padding:5px;" class="list-group-item">Amigos</a>
  <a href="#" style="padding:5px;" class="list-group-item">Fotos</a>
  <a href="#" style="padding:5px;" class="list-group-item">Mensajes</a>
  <a href="#" style="padding:5px;" class="list-group-item">Grupos</a>
</div>
		</div>
		<div class="col-md-7">
		<!-- -->
		<div class="panel panel-default">
		<div class="panel-heading">Editar perfil
		</div>
		<div class="panel-body">
<form role="form" id="status" enctype="multipart/form-data" method="post" action="./?r=users/updatebasic">


  <div class="form-group">
<?php if($this->profile->image!=""):?>
<img src="<?php echo "storage/users/".$this->user->id."/profile/".$this->profile->image;?>" class="img-responsive"><br>
<?php endif; ?>
    <label for="exampleInputEmail1">Imagen (480x480)</label>
<input type="file" name="image" class="btn btn-defalt btn-block">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" name="name" value="<?php echo $this->user->name;?>" class="form-control" id="exampleInputEmail1" placeholder="Escribe tu correo electronico">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Apellidos</label>
    <input type="text" name="lastname" value="<?php echo $this->user->lastname;?>" class="form-control" id="exampleInputEmail1" placeholder="Escribe tu correo electronico">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Fecha de nacimiento</label>
    <input type="date" name="day_of_birth" value="<?php echo $this->profile->day_of_birth;?>" class="form-control" id="exampleInputEmail1" placeholder="Fecha de nacimiento">
  </div>


  <button type="submit" class="btn btn-default">Registrate</button>
</form>






</div>
</div>

		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>









