<html>
<head>
	<title>FATEC BEAUTY HAIR</title>


	<!-- define a viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<!-- formatação de unicode -->
	<meta charset="utf-8">

	<!-- adicionar CSS Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

	<!-- css personalizado -->
	<link href="css/estilo.css" rel="stylesheet" media="screen">
</head>

<body>
	<!-- CABEÇALHO PADRÃO --> 
	<header>
		<nav class="navbar navbar-light  navbar-expand-lg" style="background-color: #DEBBD6;">
			<a class="navbar-brand" href="Index.html"><img src="img/jaila.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav1" aria-controls="#nav1" aria-expanded="false" aria-label="Alterna navegação">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="nav1">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item active">
						<a class="nav-link" href="Index.html">Página Inicial<span class="sr-only"></span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Sobre.html">Sobre</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="TrabalheConosco.html">Trabalhe conosco</a>
					</li>
					<!-- BOTÕES --> 
					<li>
						<div class="btn-group">
							<button type="button" class="btn " style="background-color:#D378D9; ">Agendamentos</button>
							<button type="button" class="btn  dropdown-toggle" style="background-color:#D378D9;"data-toggle="dropdown" aria-expanded="false">
								<span class="caret"></span>
								<span class="sr-only">Agendamentos</span>
							</button>
							<ul class="dropdown-menu" style="background-color: #D378D9; "role="menu">
								<li><a class="dropdown-item" href="cabelos.html">Cabelos</a></li>
								<li><a class="dropdown-item" href="unhas.html">Unhas</a></li>
								<li><a class="dropdown-item" href="depilacao.html">Depilação</a></li>
								<li class="divider"></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
			<a href="Login.html"><button type="button" class="btn btn-outline" style="background-color: #573159; color:#F9CB3E;">Entrar</button></a>
			<!--icones na parte superios direito-->
			<!--icone do login ou entrada de cadastramento-->
			<div class="mt-2 ml-2 mx-sm-2">

				<a href="Cadastro.html"><svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="#573159" xmlns="http://www.w3.org/2000/svg">
					<path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
					<path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
					<path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
				</svg></a> 
				Cadastre-se
			</div>
		</nav>
	</header>
	<main>
		<!-- Slide Show !-->
		<br>
		<div class="container">
			<div class="row">
				<div class="col-12">

					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="img/salao1.jpg" class="d-block w-100" alt="..." >
							</div>
							<div class="carousel-item">
								<img src="img/salao2.jpg" class="d-block w-100" alt="..." >
							</div>
							<div class="carousel-item">
								<img src="img/salao3.jpg" class="d-block w-100" alt="..." ></a>
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Voltar</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Próximo</span>
						</a>
					</div>

				</div>
			</div>
		</div>
		<!--FOOTER PADRÃO -->
		<br>
		<footer class="container-fluid >">
			<div class="p-3 mb-2 text-white" style="background-color: #DEBBD6;">
				<!-- SIMBOLO TELEFONE -->
				<div> 
					<br>
					<center>
						<p>
							<b>

								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
								</svg>
							<!-- SIMBOLO TELEFONE -->
						(13)9999-9999
							</b>
						</p>
					</center>
				</div>
				<div class="p-3 mb-2 text-white text-center" style="background-color: #DEBBD6;" >
					<center>
						<b>@Desenvolvido por Ananda Hike, Amanda Fernandez, Isadora Alves, Juliane Monteiro e Luciano Rodrigues.</b>
					</center>
					<br>
				</div>

			</div>
		</footer>


	</main>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>


</body>
</html>