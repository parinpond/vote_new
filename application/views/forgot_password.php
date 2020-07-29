<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>Vote - Forgot Password</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
	
	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
	<style>
	.bd-placeholder-img {
	font-size: 1.125rem;
	text-anchor: middle;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	}
	
	@media (min-width: 768px) {
	.bd-placeholder-img-lg {
	font-size: 3.5rem;
	}
	}
	</style>
	<link href="<?php echo base_url(); ?>assets/css/signin.css" rel="stylesheet">
	
	</head>
	<body class="text-center">
	<form class="form-signin" action="<?php echo base_url();?>login/change_password"  method="post">
	<h1 class="h3 mb-3 font-weight-normal">Forgot Your Password?</h1>
	<p class="mb-4">Char more 6 digit</p>
	<?php if($status) {?>
	<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	Email not found, Plase contact to Admin.
	</div>
	<?php } ?>
	<label for="inputEmail" class="sr-only">Email address</label>
	<input type="email" id="username" name="username"  class="form-control" placeholder="Email address" required autofocus>
	<label for="inputPassword" class="sr-only">Password</label>
	<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
	
	<button class="btn btn-lg btn-primary btn-block submit_login" type="submit">Reset Password</button>
	<div class="text-center">
	<a class="small" href="<?php echo base_url();?>login">Home</a>
	</div>
	<p class="mt-5 mb-3 text-muted">&copy; 2020</p>
	</form>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/validate.js"></script>
	</body>

</html>


