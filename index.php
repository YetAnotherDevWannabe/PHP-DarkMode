<?php
// Couleurs de fond
define('LIGHTMODEBGCOLOR', 		'#FFFFFF');				// Light mode background
define('DARKMODEBGCOLOR', 		'#212529');				// Dark mode background
// Couleurs du text (Bootstrap)
define('LIGHTMODETEXTCOLOR', 	'text-dark');			// Light mode color
define('DARKMODETEXTCOLOR', 	'text-light');			// Dark mode color
// Couleurs de la bordure des icones du footer (Bootstrap)
define('LIGHTMODEOUTLINECOLOR', 'btn-outline-dark');	// Light mode color
define('DARKMODEOUTLINECOLOR', 	'btn-outline-light');	// Dark mode color
// Bootstrap class for checkbox
define('CHECKED', 				'checked');
define('UNCHECKED', 			'unchecked');


//// $_POST ////
//// 1. Check if form vars exists ////
if ( isset($_POST['darkModeSwitch']) )
{
	//// 2. Check if there are errors ////
	if ( $_POST['darkModeSwitch'] != 'on' && $_POST['darkModeSwitch'] != 'off' )
	{
		// ERROR : stop code execution
		trigger_error('$_POST[\'darkModeSwitch\'] only accept value \'on\'', E_USER_ERROR);
	}

	//// 3. If no error then continue ////
	if ( $_POST['darkModeSwitch'] == 'on' )
	{ // Dark mode
		$bgColor 		= DARKMODEBGCOLOR;
		$txtColor 		= DARKMODETEXTCOLOR;
		$outlineColor 	= DARKMODEOUTLINECOLOR;
		$checkStatus	= CHECKED;
		setcookie('darkMode', $_POST['darkModeSwitch'], time()+3600, null, null, false, true);
	}
	else
	{ // Light mode
		$bgColor 		= LIGHTMODEBGCOLOR;
		$txtColor 		= LIGHTMODETEXTCOLOR;
		$outlineColor 	= LIGHTMODEOUTLINECOLOR;
		$checkStatus	= UNCHECKED;
		setcookie('darkMode');
	}
}
//// $_COOKIE ////
//// 1. Check if form vars exists ////
elseif ( isset($_COOKIE['darkMode']) )
{
	//// 2. Check if there are errors in $_COOKIE ////
	if ( $_COOKIE['darkMode'] != 'on' && $_COOKIE['darkMode'] != 'off' )
	{
		// ERROR : stop code execution
		trigger_error('$_COOKIE[\'darkMode\'] only accept value \'on\' or \'off\'', E_USER_ERROR);
	}

	//// 3. If no error then continue ////
	if ( $_COOKIE['darkMode'] == 'on' )
	{ // Dark mode
		$bgColor 		= DARKMODEBGCOLOR;
		$txtColor 		= DARKMODETEXTCOLOR;
		$outlineColor 	= DARKMODEOUTLINECOLOR;
		$checkStatus	= CHECKED;
	}
	else
	{ // Light mode
		$bgColor 		= LIGHTMODEBGCOLOR;
		$txtColor 		= LIGHTMODETEXTCOLOR;
		$outlineColor 	= LIGHTMODEOUTLINECOLOR;
		$checkStatus	= UNCHECKED;
	}

}
//// Default ////
else
{
	// Valeurs par défaut
	$bgColor 		= LIGHTMODEBGCOLOR;
	$txtColor 		= LIGHTMODETEXTCOLOR;
	$outlineColor 	= LIGHTMODEOUTLINECOLOR;
	$checkStatus	= UNCHECKED;
}
?>

<!DOCTYPE HTML>
<html lang="fr">
	<head>
		<title>Exo14 - Dark mode</title>
		<meta charset="UTF-8">
		<meta name="description" content="Description de la page affiché dans les moteurs de recherches">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- To deactivate IE compatibility mode which can create bugs -->
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- Add compatibility for informative tags with the oldest IE versions (IE9 and before) -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<![endif]-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"> <!-- Includes Bootstrap.css from CDN -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Includes font-awesome from CDN -->
	</head>


	<body <?php echo 'style="background-color: ' .htmlspecialchars($bgColor). '"'; ?> > <!-- Ajout du PHP pour récupérer la couleur de fond -->

		<!-- Navbar -->
		<!------------>
		<div class="bd-example" id="nav">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">Anthony.com</a>
					<button
							class="navbar-toggler"
							type="button"
							data-bs-toggle="collapse"
							data-bs-target="#navbarColor01"
							aria-controls="navbarColor01"
							aria-expanded="false"
							aria-label="Toggle navigation"
					>
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarColor01">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link active text-warning" aria-current="page" href="#nav">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#gallery">Gallery</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#footer">Footer</a>
							</li>
						</ul>

						<form action="index.php" method="POST">
							<div class="form-check form-switch me-2">
								<label class="form-check-label text-light" for="darkModeSwitch">Dark mode</label>
								<input type="hidden" name="darkModeSwitch" value="off">
								<input class="form-check-input" type="checkbox" id="darkModeSwitch" name="darkModeSwitch" value="on" onChange="this.form.submit()" <?php echo $checkStatus;?> >
							</div>
						</form>

						<form class="d-flex" action="index.php" method="GET">
							<input class="form-control me-2" type="search" placeholder="Search" name="q">
							<button class="btn btn-outline-light" type="submit">Search</button>
						</form>
					</div>
				</div>
			</nav>
		</div>
		<!-- End of Navbar -->


		<!-- Gallery -->
		<!------------->
		<div class="row" id="gallery">
			<div class="col-lg-4 col-md-12 mb-4 mb-lg-0 mt-4">
				<img
						src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg"
						class="w-100 shadow-1-strong rounded mb-4"
						alt=""
				/>

				<img
						src="https://mdbootstrap.com/img/Photos/Vertical/mountain1.jpg"
						class="w-100 shadow-1-strong rounded mb-4"
						alt=""
				/>
			</div>

			<div class="col-lg-4 mb-4 mb-lg-0 mt-4">
				<img
						src="https://mdbootstrap.com/img/Photos/Vertical/mountain2.jpg"
						class="w-100 shadow-1-strong rounded mb-4"
						alt=""
				/>

				<img
						src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg"
						class="w-100 shadow-1-strong rounded mb-4"
						alt=""
				/>
			</div>

			<div class="col-lg-4 mb-4 mb-lg-0 mt-4">
				<img
						src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
						class="w-100 shadow-1-strong rounded mb-4"
						alt=""
				/>

				<img
						src="https://mdbootstrap.com/img/Photos/Vertical/mountain3.jpg"
						class="w-100 shadow-1-strong rounded mb-4"
						alt=""
				/>
			</div>
		</div>
		<!-- End of Gallery -->



		<!-- Footer -->
		<!------------>
		<footer
				class="text-center text-lg-start text-white"
				style="<?php echo 'style="background-color: ' .htmlspecialchars($bgColor). '"'; ?>"
				id="footer"
		>
			<!-- Grid container -->
			<div class="container p-4 pb-0">

				<!-- Section: Copyright -->
				<section class="p-3 pt-0">
					<div class="row d-flex align-items-center">
						<!-- Grid column -->
						<div class="col-md-7 col-lg-8 text-center text-md-start">
							<!-- Copyright -->
							<div class="p-3 <?php echo htmlspecialchars($txtColor); ?>">
								© 2020 Copyright:
								<a class="<?php echo htmlspecialchars($txtColor); ?>" href="https://mdbootstrap.com/"
								>MDBootstrap.com</a
								>
							</div>
							<!-- Copyright -->
						</div>
						<!-- Grid column -->
						<div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
							<!-- Facebook -->
							<a
									class="btn <?php echo htmlspecialchars($outlineColor); ?> btn-floating m-1"
									class="<?php echo htmlspecialchars($txtColor); ?>"
									role="button"
									style="color: #3b5998;"
							><i class="fab fa-facebook-f"></i
							></a>

							<!-- Twitter -->
							<a
									class="btn <?php echo htmlspecialchars($outlineColor); ?> btn-floating m-1"
									class="<?php echo htmlspecialchars($txtColor); ?>"
									role="button"
									style="color: #55acee;"
							><i class="fab fa-twitter"></i
							></a>

							<!-- Google -->
							<a
									class="btn <?php echo htmlspecialchars($outlineColor); ?> btn-floating m-1"
									class="<?php echo htmlspecialchars($txtColor); ?>"
									role="button"
									style="color: #dd4b39;"
							><i class="fab fa-google"></i
							></a>

							<!-- Instagram -->
							<a
									class="btn <?php echo htmlspecialchars($outlineColor); ?> btn-floating m-1"
									class="<?php echo htmlspecialchars($txtColor); ?>"
									role="button"
									style="color: #ac2bac;"
							><i class="fab fa-instagram"></i
							></a>
						</div>
					</div>
				</section>
			</div>
		</footer>
		<!-- End of footer -->

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script> <!-- Includes Bootstrap & Popper from CDN -->
	</body>
</html>