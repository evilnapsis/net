<html>
<head>
	<title><?php echo $this->title; ?></title>
	<link rel="stylesheet" type="text/css" href="res/bootstrap3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="res/font-awesome/css/font-awesome.min.css">
  <script src="res/jquery.min.js"></script>
    <meta name="description" content="<?php echo $this->meta_description; ?>" />
</head>
<body style="background:#fafafa;">
<nav class="navbar navbar-default" role="navigation">
<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="./"><i class="fa fa-sitemap"></i> NET</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
<!--      <li><a href="./"><i class="fa fa-th-list"></i> Inicio</a></li> -->
      <li><a href="./"><i class="fa fa-newspaper-o"></i> Noticias</a></li>
    </ul>
<?php if(isset($_SESSION["user_id"])):?>
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
      <input type="hidden" name="r" value="search/results">
        <input type="text" style="min-width:300px;" name="q" class="form-control" placeholder="Buscar personas ...">
      </div>
      <button type="submit" class="btn btn-default">Buscar</button>
    </form>
<?php endif;?>
    <ul class="nav navbar-nav navbar-right">
<li>
  <?php if(!isset($_SESSION["user_id"])):?>
    <form class="navbar-form navbar-left" role="search" method="post" action="./index.php?r=users/login">
      <div class="form-group">
      <input type="hidden" name="r" value="search/results">
<div class="row">
<div class="col-md-6">
        <input type="text"  name="email" class="form-control" placeholder="Email" required>
</div>
<div class="col-md-6">
        <input type="password"  name="password" class="form-control" placeholder="Contrase&ntilde;a" required>
</div>
</div>
      </div>
      <button type="submit" class="btn btn-default">Entrar</button>
    </form>

<?php endif;?>

</li>
<?php if(isset($_SESSION["user_id"])):
$user = UserModel::getById($_SESSION["user_id"]);
$friends_pendings = FriendModel::countMyPendings();
$friends= FriendModel::getLast4Pendings();
?>
<li><a href="<?php echo R::rlink(array("m"=>"users","v"=>"view","uid"=>$user->id));?>"><?php echo $user->name; ?></a></li>
<?php if($friends_pendings->c>0):?>
<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp;<i class="fa fa-male"></i> <small ><sup><span class="label label-danger"><?php echo $friends_pendings->c;?></span></sup> </small> </a>
        <ul class="dropdown-menu">
 <?php foreach($friends as $f):
 ?>
          <li><a href="<?php echo R::rlink(array("m"=>"users","v"=>"view","uid"=>$f->sender_id));?>"><?php echo $f->getSender()->getFullname();?></a></li>
<?php endforeach;?>
        </ul>
      </li>
<?php endif; ?>
<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp;<i class="fa fa-bell"></i> </a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li><a href="#">Separated link</a></li>
        </ul>
      </li>
<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp; <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li class="divider"></li>
          <li><a href="./?r=users/logout">Salir</a></li>
        </ul>
      </li>
<?php else:?>
<!--<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
        </ul>
      </li> -->
<?php endif;?>
    </ul>
  </div><!-- /.navbar-collapse -->
  </div>
</nav>
	<?php 
	$this->renderView();	
	?>
  <br>
  <section style="background:#f0f0f0;">
    <div class="container">

    <div class="row">
    <div class="col-md-6">
    <h1>InFlask, Inc.</h1>
    <p>El portal de lugares "donde comer?" mas surtido de Mexico.</p>
    </div>
    <div class="col-md-3">
    <h3>SEGURIDAD</h3>
      <ul>
        <li><a href="">Terminos y condiciones</a></li>
        <li><a href="">Politicas y privacidad</a></li>
      </ul>
    </div>

    </div>
    <div class="row">
    <div class="col-md-12">
    <p class="text-muted">InFlask &copy; 2015. Todos los derechos reservados</p>
    </div>
    </div>

    </div>
  </section>
	<script src="res/bootstrap3/js/bootstrap.min.js"></script>
</body>
</html>