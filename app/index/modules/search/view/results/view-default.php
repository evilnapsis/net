<div class="container">
<div class="row">
<div class="col-md-12">
<?php if($c=count($this->results)>0):?>
<h1>Resultados de la busqueda [<?php echo $_GET["q"];?>]</h1>
<br><br><?php foreach($this->results as $r):?>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-10">
<h3><a href="<?php echo R::rlink(array("m"=>"item","v"=>"view","itid"=>$r->id));?>"><?php echo $r->title; ?></a></h3>
<p><?php echo $r->description;?></p>
</div>
</div>
<hr>
<?php endforeach;?>
<?php else:?>
	<br><br><br>
	<div class="jumbotron">
	<h2>No hay resultados</h2>
	<p>Su busqueda no genero ningun resultado</p>
	</div>
<?php endif;?>
</div>
</div>
</div>
<br><br><br>