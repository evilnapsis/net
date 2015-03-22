<div class="container">
<div class="row">
<div class="col-md-12">
<h1><?php echo $this->item->title; ?> <small>Administraci&oacute;n</small></h1>
<hr>
<!-- -->
<div class="row">
<div class="col-md-3">

<div class="panel panel-default">
<div class="panel-heading">Administraci&oacute;n</div>
<div class="list-group">
<a href="<?php echo R::rlink(array("m"=>"item","v"=>"califications","itid"=>$this->item->id));?>" class="list-group-item"><i class="fa fa-star"></i> Calificaciones</a>
<a href="<?php echo R::rlink(array("m"=>"item","v"=>"edit","itid"=>$this->item->id));?>" class="list-group-item"><i class="fa fa-pencil"></i> Editar</a>
</div>
</div>

</div>
<div class="col-md-9">
</div>
</div>
<!-- -->
</div>
</div>
</div>
<br><br><br>
<br><br><br>

