<?php
session_start();
include('api/ApiClass.php');
if(isset($_GET['hook']) && $_GET['hook'] == 'logout' ){
	unset($_SESSION['permision']);
}

$base_url = '/site/';
$info = false;
if(isset($_SESSION['permision']) && $_SESSION['permision'] == 'allow' ){


//adaugare
if(isset($_POST['name']) && isset($_POST['hook_action']) && $_POST['hook_action'] == 'add'){
$data = array(
	'action' => 'add',
	'entity_type' => 'books',
	'name' => $_POST['name'],
	'author' => $_POST['author'],
	'year' => $_POST['year']
	);
$api3 = new Api($data);
}
if(isset($_GET['id']) && isset($_GET['hook']) &&$_GET['hook'] == 'delete' ){
	// delete
	$data = array(
	'action' => 'delete',
	'entity_type' => 'books',
	'entity_id' => $_GET['id']
	);

	$api2 = new Api($data);
	header("Location: ".$base_url);
	exit();
}

if(isset($_POST['hook_action']) && $_POST['hook_action'] == 'edit'){
	// //update
	$data = array(
		'action' => 'update',
		'entity_type' => 'books',
		'entity_id' => $_POST['id'],
		'data' => array(		
			'name' =>  $_POST['name'],
			'author' =>  $_POST['author'],
			'year' =>  $_POST['year'])

		);

	$api = new Api($data);
	header("Location: ".$base_url);
	exit();
}
if(isset($_GET['id']) && isset($_GET['hook']) &&$_GET['hook'] == 'edit' ){
	$info = true;
	// delete
	$data = array(
	'action' => 'info',
	'entity_type' => 'books',
	'entity_id' => $_GET['id']
	);

	$api2 = new Api($data);
	$info_item = json_decode($api2->response);
}

//get list
$data = array(
	'action' => 'all',
	'entity_type' => 'books'
	);
$api = new Api($data);

$books = json_decode($api->response);

?>
<html>
<head>
<title>Rest Api</title>


			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
<div class="container">
<div class="row">
<div class="col-lg-12">
<br />
<a href="<?php echo $base_url; ?>index.php?hook=logout" class="btn btn-default pull-right" >Iesire cont</a>
</div>
</div>
<?php 

if($info == false){ ?>
	<form action="" method="POST" enctype="multipart/form-data">
<input type="hidden" name="hook_action" value="add">
<label>Nume</label>
<input name="name" value="" class="form-control" />
<label>Autor</label>
<input name="author" class="form-control"/>
<label>An</label>
<input name="year" class="form-control"/>
<br />
<button type="submit" class="btn btn-primary">Save</button>
</form>
<table class="table table-bordered" >
	<tr>
	<th>Nume</th>
	<th>Autor</th>
	<th>An</th>
	<th colspan="2">Actiuni</th>
	</tr>
	<?php
foreach ($books as $key => $book) { ?>

	<tr>
	<td><?php echo $book->name; ?></td>
	<td><?php echo $book->author; ?></td>
	<td><?php echo $book->year; ?></td>
	<td><a href="<?php echo $base_url; ?>index.php?id=<?php echo $book->id; ?>&hook=edit" class="btn btn-success">Edit</a></td>
	<td><a href="<?php echo $base_url; ?>index.php?id=<?php echo $book->id; ?>&hook=delete" class="btn btn-danger">Delete</a></td>
	</tr>
	<?php } ?>
	</table>
<?php
}else{
?>
<form action="" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $info_item->id; ?>">
<input type="hidden" name="hook_action" value="edit">
<label>Nume</label>
<input name="name" value="<?php echo $info_item->name; ?>" class="form-control" />
<label>Autor</label>
<input name="author" value="<?php echo $info_item->author; ?>" class="form-control" />
<label>An</label>
<input name="year" value="<?php echo $info_item->year; ?>" class="form-control" />
<button type="submit" class="btn btn-primary">Save</button>
</form>
<?php
}
?>
</div>
</body>
</html>
<?php }else{

//login
$errors = '';
if(isset($_POST['name']) && isset($_POST['hook_action']) && isset($_POST['password']) && $_POST['hook_action'] == 'login'){
$data = array(
	'action' => 'login',
	'name' => $_POST['name'],
	'password' => md5($_POST['password'])
	);
$api3 = new Api($data);
$status= $api3->response;
if($status == true){
	$_SESSION['permision'] = 'allow';
	header("Location: ".$base_url);
	exit();

}else{
	$errors = 'Autentificare esuata';
}

}

?>
    <html>
<head>
<title>Rest Api</title>


			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			 </head>

<body>
<div class="container">
<h1 align="center">Login</h1>
<form action="" method="POST" enctype="multipart/form-data">

<?php 
if($errors){ ?>
	<div class="alert alert-danger">
<?php
echo $errors; ?>
</div>
<?php } ?>
<input type="hidden" name="hook_action" value="login">
<label>Nume</label>
<input type="text" name="name" value="" class="form-control" />
<label>Parola</label>
<input type="password" name="password" class="form-control"/>
<br/>
<button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
</body>
<?php

	} ?>