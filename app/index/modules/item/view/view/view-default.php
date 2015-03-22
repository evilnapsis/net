<div class="container">
<div class="row">
<div class="col-md-12">
<!-- -->
<div class="row">
<div class="col-md-3">



	<div class="panel panel-default">
	<div class="panel-heading">Busqueda Avanzada</div>
	<div class="panel-body">

	<form role="form">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Nombre</label>
	    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Tipo</label>
	    <input type="text" name="kind_id" class="form-control" id="exampleInputEmail1" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Direccion</label>
	    <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Rango</label>
	    <input type="range" name="range" style="width:100%;" min="100" step="10" max="10000" id="exampleInputEmail1" placeholder="">
	  </div>


	  <button type="submit" class="btn btn-default btn-block"><i class="fa fa-search"></i> Buscar</button>
	</form>
	</div>
	</div>



</div>
<div class="col-md-9">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-10">
<h1><?php echo $this->item->title; ?></h1>
<p><?php echo $this->item->description; ?></p>

<ul type="none">
<?php if($this->item->city!=""):?>	<li><i class="fa fa-home"></i> <?php echo $this->item->city;?></li><?php endif; ?>
<?php if($this->item->phone!=""):?>	<li><i class="fa fa-phone"></i> <?php echo $this->item->phone;?></li><?php endif; ?>
<?php if($this->item->website!=""):?>	<li><i class="fa fa-globe"></i> <?php echo $this->item->website;?></li><?php endif; ?>
<?php if($this->item->email!=""):?>	<li><i class="fa fa-envelope-o"></i> <?php echo $this->item->email;?></li><?php endif; ?>
<?php if($this->item->fburl!=""):?>	<li><i class="fa fa-facebook"></i> <?php echo $this->item->fburl;?></li><?php endif; ?>
<?php if($this->item->twurl!=""):?>	<li><i class="fa fa-twitter"></i> <?php echo $this->item->twurl;?></li><?php endif; ?>
</ul>

<?php if(isset($_COOKIE["qualified"])):?>
	<p class="alert alert-info" id="alert"  >Calificacion agregada exitosamente,aun pendiente de aprobar por el propietario del restaurant.</p>
<?php 
setcookie("qualified","",time()-18600);
endif; ?>
<?php if(isset($_COOKIE["isqualified"])):?>
	<p class="alert alert-danger" id="alert"  >Ya has calificado este <?php echo $this->item->getKind()->name; ?>.</p>
<?php 
setcookie("isqualified","",time()-18600);
endif; ?>
</div>
</div>
<hr>
<!-- -->
<div class="row">
<div class="col-md-6">
<h4>Servicios</h4>
<?php if(count($this->services)>0):?>
<?php foreach($this->services as $s):?>
<span class="badge"><?php echo $s->getService()->name; ?></span>
<?php endforeach;?>
<?php endif;?>
</div>
<div class="col-md-6">
<h4>Especialidades</h4>
</div>

</div>
<!-- -->

<hr>
<div class="panel panel-default">
<div class="panel-heading">Calificar</div>

	<div class="panel-body">

	<div role="form">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Comida: <span id="food_val">0%</span></label><br>
	    <input type="range" name="food_range" min="0" max="5" step="0.5" value="0"  id="food_range" placeholder="">
<br>
	    <label for="exampleInputEmail1">Servicio: <span id="service_val">0%</span></label><br>
	    <input type="range" name="service_range" min="0" max="5" step="0.5" value="0"  id="service_range" placeholder="">
<br>
	    <label for="exampleInputEmail1">Precio: <span id="price_val">0%</span></label><br>
	    <input type="range" name="price_range" min="0" max="5" step="0.5" value="0"  id="price_range" placeholder="">


	  </div>

<?php if(isset($_SESSION["client_id"])):?>
 <!-- Button trigger modal -->
  <a data-toggle="modal" href="#myModal" class="btn btn-warning btn-block"><i class="fa fa-star"></i> Calificar</a>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Enviar Calificacion</h4>
        </div>
        <div class="modal-body">
	<center><p id="food_cal">0%</p></center>
	<hr>
	<form role="form" method="post" action="<?php echo R::rlink(array("m"=>"item","v"=>"qualify"));?>">
	  <div class="form-group">
	    <label for="exampleInputEmail1">Comentario</label>
	    <input type="hidden" name="item_id" value="<?php echo $this->item->id;?>">
	    <input type="hidden" name="food" id="food_q">
	    <input type="hidden" name="service" id="service_q">
	    <input type="hidden" name="price" id="price_q">
	    <textarea  name="comment" class="form-control" placeholder="Envia un comentario (requerido)" required></textarea>
	  </div>

	  <div class="form-group">
        <div class="row">
        <div class="col-md-4">
          <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cambiar Calificacion</button>
          </div>
        <div class="col-md-8">
          <button type="submit" class="btn btn-primary btn-block">Enviar Calificacion</button>
          </div>
        </div>
        </div>



	  </form>

        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<?php endif;?>


	</div>
	</div>

</div>

</div>
</div>
<!-- -->
</div>
</div>
</div>
<script>
	$("#food_range").change(function(){
		$("#food_val").html($("#food_range").val()+"%");
		$("#food_cal").html($("#food_range").val()+"%");
		$("#food_q").val($("#food_range").val());
	});

	$("#service_range").change(function(){
		$("#service_val").html($("#service_range").val()+"%");
		$("#food_cal").html($("#food_cal").html()+"+"+$("#service_range").val()+"%");
		$("#service_q").val($("#service_range").val());
	});

	$("#price_range").change(function(){
		$("#price_val").html($("#price_range").val()+"%");
		$("#food_cal").html($("#food_cal").html()+"+"+$("#price_range").val()+"%");
		$("#price_q").val($("#price_range").val());
	});

</script>

<br><br><br>
<br><br><br>

