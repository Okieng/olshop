	<link rel="stylesheet" type="text/css" href="style.css">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
				<div class="container">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="navbar-toggler-icon"></span>
					</button>
					<a class="navbar-brand" href="index.php"><img id="logo" src="img/ogola.png" alt=""></a>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<form class="form-inline">
							<ul class="navbar-nav">


							</ul>
						</form>
						<ul class="navbar-nav ml-md-auto">
							<li class="nav-item">
								<a class="nav-link" href="index.php">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="shop.php">Shop</a>
							</li>
							<?php 
							if (isset($_SESSION["pelanggan"])):?>
								<li class="nav-item">
									<a class="nav-link" href="checkout.php">Checkout</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="riwayat.php">Riwayat</a>
								</li>
								<li class="nav-item active">
									<a class="nav-link" href="logout.php">Log Out</a>
								</li>
							 <?php else: ?>
							 	<li class="nav-item active">
							 		<a class="nav-link" href="login.php">Sign In</a>
							 	</li>
							 <?php endif ?>
							<li class="nav-item">
								<a class="nav-link" href="keranjang.php"> <i class="fa fa-shopping-cart"></i></a>	
							</li>
							
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>
