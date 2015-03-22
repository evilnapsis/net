<?php
?>
<div class="container">
	<div class="row">
		<div class="col-md-3">

<div class="row">
<div class="col-md-4">
<?php if($this->profile->image!=""):?>

<img src="<?php echo "storage/users/".$this->user->id."/profile/".$this->profile->image;?>" class="img-responsive img-circle">


<?php else:?>
<a class="btn btn-default" href="<?php echo R::rlink(array("m"=>"users","v"=>"edit"));?>"><i class="fa fa-user"></i></a>
<?php endif; ?>

</div>
<div class="col-md-8">
<h4><?php echo $this->user->getFullname();?></h4>
<a href="<?php echo R::rlink(array("m"=>"users","v"=>"edit"));?>">Editar perfil</a>
</div>
</div>

<br><br>



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
		<div class="panel-heading">Publicar Estado
		</div>
		<div class="panel-body">
<form role="form" id="status" enctype="multipart/form-data" method="post" action="./?r=users/publish">
  <div class="form-group">
    <textarea rows="1" name="content" id="statusarea" class="form-control" placeholder="Publicar Estado"></textarea>
    <input type="hidden" name="receptor_type_id" value="1">
    <input type="hidden" name="receptor_ref_id" value="<?php echo $this->user->id; ?>">

  </div>
<div class="buttons">
  <div class="form-group">
  <div class="row">
  <div class="col-md-4">
  </div>
<div class="col-md-4">
<input type="file" name="image" class="btn btn-defalt btn-block">
  </div>
<div class="col-md-4">
<!--  <button type="button" id="publish" class="btn btn-primary btn-block">Publicar</button>-->
  <button type="submit" id="publish" class="btn btn-primary btn-block">Publicar</button>
  </div>

  </div>
  </div>
  </div>
</form>
		</div>
		</div>
		<!-- -->
<?php if(count($this->posts)>0):?>
	<div id="statuses">
<?php foreach($this->posts as $p):
$pis = $p->getPIS();
?>
<div class="thumbnail" style="padding-bottom:0;">
      <div class="caption" style="padding-bottom:0;">

<!-- Single button -->
<div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle btn-xs " data-toggle="dropdown">
    <i class="fa fa-chevron-down"></i>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">Editar</a></li>
    <li class="divider"></li>
    <li><a href="#">Eliminar</a></li>
  </ul>
</div>
<?php 
$authordata = $p->getAuthor();
$authorprofiledata = $p->getAuthor()->getProfile();
if($authorprofiledata->image!=""):?>
<img src="<?php echo "storage/users/".$this->user->id."/profile/".$this->profile->image;?>" class="img-circle" style="width:38px;float:left;">
<?php endif; ?>
      <h4 style="margin:0px;margin-left:48px;"><?php echo $authordata->getFullname();?></h4>
<p style="margin:0px;margin-left:48px;" class="text-muted"><?php echo date("d/M/Y h:i:s",strtotime($p->created_at));?></p>
<div class="clearfix"></div>
      <hr style="margin:5px;">
        <p><?php echo $p->content; ?></p>
<?php if(count($pis)==1):?>
<?php foreach($pis as $pi):?>
<?php 
$fullpath = $pi->getImage()->getFullpath();
if(file_exists($fullpath)):?>
<a data-toggle="modal" href="#imgModal-<?php echo $pi->image_id;?>"><img src="<?php echo $fullpath; ?>" class="img-responsive"></a>

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade"  id="imgModal-<?php echo $pi->image_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><?php echo $p->content;?></h4>
        </div>
        <div class="modal-body">
<img src="<?php echo $fullpath; ?>" class="img-responsive">
        </div>
        <div class="modal-footer">
<!--          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> -->

        <?php 
        $l = HeartModel::getByType($_SESSION["user_id"],3,$p->id);
        $c = HeartModel::countByType(3,$p->id)->c;
        $b = "btn-default";
        if($l!=null){ $b="btn-primary";}
        ?>

        <a href="javascript:void()" onclick="like(3,<?php echo $p->id; ?>)" id="ilk-<?php echo $pi->image_id; ?>" class="btn btn-sm <?php echo $b; ?>"><i class="fa fa-thumbs-up"></i> <?php if($c>0){ echo $c;}?></a>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<br><?php endif; ?>
<?php endforeach;?>
<?php endif; ?>
        <p>
        <?php 
        $l = HeartModel::getByType($_SESSION["user_id"],1,$p->id);
        $c = HeartModel::countByType(1,$p->id)->c;
        $b = "btn-default";
        if($l!=null){ $b="btn-primary";}
        ?>
        <a href="javascript:void()" onclick="like(1,<?php echo $p->id; ?>)" id="lk-<?php echo $p->id; ?>" class="btn btn-sm <?php echo $b; ?>"><i class="fa fa-thumbs-up"></i> <?php if($c>0){ echo $c;}?></a>


<form role="form" id="status">
  <div class="form-group" style="max-width:100%;">

    <textarea rows="1" name="content" class="form-control" placeholder="Escribe un comentario"></textarea>
  </div>
</form>

      </div>
    </div><br>
<?php endforeach;?>
</div>
<?php endif;?>


		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>










<script>
	$(".buttons").hide();
	$("#statusarea").focus(function(){
		$(".buttons").show("fast");
		$(this).prop("rows",3);
	});

	$("#statusarea").blur(function(){
		if($(this).val()==""){
			$(".buttons").hide("fast");
			$(this).prop("rows",1);
		}
	});
function like(type,id){
	var base = "lk";
	if(type==3){ base = "ilk"; }
	console.log(base);
	var xhr = new XMLHttpRequest();
	xhr.open("GET","./?r=users/like&t="+type+"&pid="+id,false);
	xhr.send();
	$("#"+base+"-"+id).html("<i class='fa fa-thumbs-up'></i> "+xhr.responseText);

	if($("#"+base+"-"+id).hasClass("btn-default")){
		$("#"+base+"-"+id).removeClass("btn-default");
		$("#"+base+"-"+id).addClass("btn-primary");
	}else if($("#"+base+"-"+id).hasClass("btn-primary")){
		$("#"+base+"-"+id).removeClass("btn-primary");
		$("#"+base+"-"+id).addClass("btn-default");		
	}


}
/*	$("#publish").click(function(){
		var data = $("#status").serialize();
		var xhr = new XMLHttpRequest();
		xhr.open("GET","./?r=users/publish&"+data,false);
		xhr.send();
		$("#statuses").prepend(xhr.responseText);
		$("#statusarea").val("");
		$(".buttons").hide("fast");
		$("#statusarea").prop("rows",2);

	});
*/
</script>