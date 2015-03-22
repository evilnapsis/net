<?php
$is_me = $this->is_me;
$is_logged = $this->is_logged;
?>
<div class="container">
  <div class="row">
    <div class="col-md-3">

<div class="row">
<div class="col-md-4">
<?php if($this->profile->image!=""):?>

<img src="<?php echo "storage/users/".$this->person->id."/profile/".$this->profile->image;?>" class="img-responsive img-circle">


<?php else:?>
<a class="btn btn-default" href="<?php echo R::rlink(array("m"=>"users","v"=>"edit"));?>"><i class="fa fa-user"></i></a>
<?php endif; ?>

</div>
<div class="col-md-8">
<h4><?php echo $this->person->getFullname();?></h4>
<?php if($is_logged):?>
<?php if($is_me):?>
<a href="<?php echo R::rlink(array("m"=>"users","v"=>"edit"));?>">Editar perfil</a>
<?php else:
// si no soy yo, entonces le puedo pedir que sea mi amigo ...
    $friend = FriendModel::getFriend($_SESSION["user_id"],$_GET["uid"]);

?>

<?php if($friend==null):?>
<a href="javascript:void()" onclick="friend(<?php echo $this->person->id;?>)" id="f-<?php echo $this->person->id;?>" class="btn btn-success btn-sm"><i class='fa fa-male'></i> Solicitud de amistad</a>
<?php elseif($friend->sender_id==$_SESSION["user_id"]):
// si el usuario actual envio la solicitud
?>
<?php if($friend->is_accepted):?>
<a href="javascript:void()" onclick="friend(<?php echo $this->person->id;?>)" id="f-<?php echo $this->person->id;?>" class="btn btn-primary btn-sm"><i class='fa fa-male'></i> Amigo</a>
<?php else:?>
<a href="javascript:void()" onclick="friend(<?php echo $this->person->id;?>)" id="f-<?php echo $this->person->id;?>" class="btn btn-info btn-sm"><i class='fa fa-male'></i> Solicitud enviada</a>
<?php endif;?>


<?php elseif($friend->receptor_id==$_SESSION["user_id"]):
// si el usuario actual recibe la solicitud
?>
<?php if($friend->is_accepted):?>
<a href="javascript:void()" onclick="friend(<?php echo $this->person->id;?>)" id="f-<?php echo $this->person->id;?>" class="btn btn-primary btn-sm"><i class='fa fa-male'></i> Amigo</a>
<?php else:?>
<a href="javascript:void()" onclick="accept(<?php echo $friend->id;?>)" id="ai-<?php echo $friend->id;?>" class="btn btn-info btn-sm"><i class='fa fa-male'></i> Aceptar invitacion</a>
<?php endif;?>

<?php endif;?>


<?php endif;?>
<?php else:?>
<a href="javascript:void()" class="btn btn-warning btn-sm">Registrate o Entra</a>
<?php endif;?>
</div>
</div>

<br><br>



<div class="list-group">
  <a href="<?php echo R::rlink(array("m"=>"users","v"=>"friends","uid"=>$this->person->id));?>" style="padding:5px;" class="list-group-item">Amigos</a>
  <a href="<?php echo R::rlink(array("m"=>"users","v"=>"photos","uid"=>$this->person->id));?>" style="padding:5px;" class="list-group-item">Fotos</a>
<?php if($is_me):?>
  <a href="#" style="padding:5px;" class="list-group-item">Mensajes</a>
<?php endif;?>
  <a href="#" style="padding:5px;" class="list-group-item">Grupos</a>
</div>
    </div>
    <div class="col-md-7">
    <!-- -->
<h2 style="margin:0;">Amigos</h2>    <!-- -->
<br><?php if(count($this->posts)>0):?>
  <div id="statuses">
<?php foreach($this->posts as $p):
//print_r($p);
$mode = "";
$friend = null;
if($p->sender_id==$this->person->id){
  $mode = "sender";
  $friend = ProfileModel::getByUserId($p->receptor_id);
}else if($p->receptor_id==$this->person->id){
  $mode = "receptor";
  $friend = ProfileModel::getByUserId($p->sender_id);
}
//$pis = $p->getPIS();
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
$authordata = $friend->getUser();
$authorprofiledata = $friend;

if($authorprofiledata->image!=""):?>
<img src="<?php echo "storage/users/".$authordata->id."/profile/".$authorprofiledata->image;?>" class="img-circle" style="width:38px;float:left;">
<?php endif; ?>
<?php 
$receptordata = $friend->getUser();
if($authordata->id==$receptordata->id):?>
<h4 style="margin:0px;margin-left:48px;"><?php echo $authordata->getFullname();?></h4>
<?php else:?>
<?php if($is_logged && $receptordata->id==$_SESSION["user_id"]):?>
<h4 style="margin:0px;margin-left:48px;"><?php echo $authordata->getFullname();?></h4>
<?php else:?>
  <h4 style="margin:0px;margin-left:48px;"><?php echo $authordata->getFullname();?> <i class="fa fa-chevron-right"></i> <?php echo $receptordata->getFullname();?></h4>

<?php endif;?>

<?php endif;?>
<?php if($p->is_accepted):?>
        <a  style="margin-left:10px;" href="javascript:void()" class="btn btn-sm btn-primary"><i class="fa fa-male"></i> Amigos</a>

<?php endif; ?>
<div class="clearfix"></div>
<br>
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
