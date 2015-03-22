<div class="container">
	<div class="row">
	<div class="col-md-12">
	<h1><?php echo $this->item->title; ?> <small>Editar</small></h1>
	<hr>


<form role="form" method="post" id="newitem" name="newitem" action="<?php echo R::rlink(array("m"=>"item","v"=>"update"));?>">







<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#basicdata">
          Datos basicos
        </a>
      </h4>
    </div>
    <div id="basicdata" class="panel-collapse collapse in">
      <div class="panel-body">

        <div class="form-group">
    <label for="exampleInputEmail1">Tipo</label>
<select name="kind_id" id="kind_id" class="form-control" required>
    <option value="">-- SELECCIONE UN TIPO --</option>
<?php foreach($this->kinds as $k):?>
    <option value="<?php echo $k->id;?>" <?php if($k->id==$this->item->kind_id){ echo "selected"; }?> ><?php echo $k->name;?></option>
<?php endforeach; ?>
</select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Titulo</label>
    <input type="text" name="title" class="form-control" value="<?php echo $this->item->title; ?>" id="title" placeholder="Escriba el titulo">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Descripcion</label>
    <textarea type="text" name="description" class="form-control"  id="description" placeholder="Escriba la descripcion"><?php echo $this->item->description; ?></textarea>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo $this->item->email; ?>" id="email" placeholder="Escriba el email de contacto">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Telefono</label>
<div class="row">
<div class="col-md-4">
    <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $this->item->phone; ?>" placeholder="Escriba el telefono de contacto">
</div>
<div class="col-md-4">
    <input type="text" name="phone2" class="form-control" id="phone2" value="<?php echo $this->item->phone2; ?>" placeholder="Escriba el telefono 2">
</div>
<div class="col-md-4">
    <input type="text" name="phone3" class="form-control" id="phone3" value="<?php echo $this->item->phone3; ?>" placeholder="Escriba el telefono 3">
</div>
</div>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Sitio web</label>
    <input type="text" name="website" class="form-control" value="<?php echo $this->item->website; ?>" id="website" placeholder="Escriba el sitio web">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Redes</label>
<div class="row">
<div class="col-md-4">
    <input type="text" name="fburl" class="form-control" value="<?php echo $this->item->fburl; ?>" id="fburl" placeholder="Facebook">
</div>
<div class="col-md-4">
    <input type="text" name="twurl" class="form-control" value="<?php echo $this->item->twurl; ?>" id="twurl" placeholder="Twitter">
</div>
<div class="col-md-4">
    <input type="text" name="gpurl" class="form-control" value="<?php echo $this->item->gpurl; ?>" id="gpurl" placeholder="Google+">
</div>
</div>
  </div>

      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#addressdata">
        Direccion
            </a>
      </h4>
    </div>
    <div id="addressdata" class="panel-collapse collapse ">
      <div class="panel-body">

  <div class="form-group">
    <label for="exampleInputEmail1">Ciudad</label>
    <input type="text" name="city" class="form-control" value="<?php echo $this->item->city; ?>" id="city" placeholder="Escriba la ciudad">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Pais/Estado</label>
<div class="row">
<div class="col-md-12">
<select name="state_id" id="state_id" class="form-control" required>
    <option value="">-- SELECCIONE UN PAIS/ESTADO --</option>
<?php foreach($this->countries as $k):?>
<?php $states = $k->getStates(); ?>
<?php if(count($states)>0):?>
<optgroup label="<?php echo $k->name; ?>">
<?php foreach($states as $state):?>
    <option value="<?php echo $state->id;?>" <?php if($state->id==$this->item->state_id){ echo "selected"; }?>><?php echo $state->name;?></option>
<?php endforeach;?>
</optgroup>
<?php endif; ?>
<?php endforeach; ?>
</select></div>
</div>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Zona</label>
<select name="zone_id" id="zone_id" class="form-control" required>
    <option value="">-- SELECCIONE UNA ZONA --</option>
<?php foreach($this->zones as $k):?>
    <option value="<?php echo $k->id;?>" <?php if($k->id==$this->item->zone_id){ echo "selected"; }?>><?php echo $k->name;?></option>
<?php endforeach; ?>
</select>  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Num. ext/Num. int/CP</label>
<div class="row">
<div class="col-md-4">
    <input type="text" name="ext_num" value="<?php echo $this->item->ext_num; ?>" class="form-control" placeholder="Num. ext">
</div>
<div class="col-md-4">
    <input type="text" name="int_num" value="<?php echo $this->item->int_num; ?>" class="form-control" placeholder="Num. int">
</div>
<div class="col-md-4">
    <input type="text" name="cp" value="<?php echo $this->item->cp; ?>" class="form-control" id="cp" placeholder="C.P">
</div>
</div>
  </div>




      </div>
    </div>
  </div>






  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#featuredata">
          Caracteristicas
        </a>
      </h4>
    </div>
    <div id="featuredata" class="panel-collapse collapse">
      <div class="panel-body">


 <div class="form-group">
<?php foreach($this->services as $service):
$exist = ItemServiceModel::getByIS($this->item->id,$service->id);
?>
      <label class="checkbox-inline"><input type="checkbox" name="services[]" <?php if($exist!=null){ echo "checked"; }?> value="<?php echo $service->id; ?>"> <?php echo $service->name;?></label>
<?php endforeach; ?>
  </div>
        <div class="form-group">
    <label for="exampleInputEmail1">Tipo de cocina</label>
<select name="cusine_id" id="cusine_id" class="form-control" required>
    <option value="">-- SELECCIONE UN TIPO DE COCINA --</option>
<?php foreach($this->cusines as $k):?>
    <option value="<?php echo $k->id;?>" <?php if($k->id==$this->item->cusine_id){ echo "selected"; }?>><?php echo $k->name;?></option>
<?php endforeach; ?>
</select>
  </div>
        <div class="form-group">
    <label for="exampleInputEmail1">Rango de precios</label>
<select name="price_id" id="price_id" class="form-control" required>
    <option value="">-- SELECCIONE UN RANGO DE PRECIOS --</option>
<?php foreach($this->prices as $k):?>
    <option value="<?php echo $k->id;?>" <?php if($k->id==$this->item->price_id){ echo "selected"; }?>><?php echo $k->name;?></option>
<?php endforeach; ?>
</select>
  </div>

      </div>
    </div>
  </div>








    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#finish">
Finalizar        </a>
      </h4>
    </div>
    <div id="finish" class="panel-collapse collapse">
      <div class="panel-body">
      <input type="hidden" name="item_id" value="<?php echo $this->item->id; ?>">
  <button type="button" onclick="process()" class="btn btn-primary btn-block">Agregar Elemento</button>
      </div>
    </div>
  </div>


</div>























</form>

<script>
function process(){
with(document.newitem){
  var ok = true;

 if(kind_id.value==""){
    ok=false;
    alert("Debes seleccionar un tipo");
//$("#basicdata").collapse("show");
//$("#addressdata").collapse("hide");
//$("#featuredata").collapse("hide");
//$("#finishdata").collapse("hide")
  }
 if(ok && title.value==""){
    ok=false;
    alert("Debes escribir un titulo");
  }
 if(ok && description.value==""){
    ok=false;
    alert("Debes escribir una descripcion");
  }
 
 if(ok && email.value==""){
    ok=false;
    alert("Debes escribir un email");
  }
 
 if(ok && phone.value==""){
    ok=false;
    alert("Debes escribir un telefono");
  }
 
  if(ok &&zone_id.value==""){
    ok=false;
    alert("Debes seleccionar una zona");
  }

  if(ok &&state_id.value==""){
    ok=false;
    alert("Debes seleccionar un estado");
  }


  if(ok &&price_id.value==""){
    ok=false;
    alert("Debes seleccionar un rango de precios");
  }

  if(ok &&cusine_id.value==""){
    ok=false;
    alert("Debes seleccionar un tipo de cosina");
  }



  if(ok){
    c=confirm("Todo listo, deseas proceder?")
    if(c){submit();}
  }
}
}
</script>

	</div>
	</div>
</div>