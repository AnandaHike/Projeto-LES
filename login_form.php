<?php
if ($_GET['msg']=='1'){
    $msg="Por favor , fetue o login para acessar!";
}
elseif ($_GET['msg']=='2'){
    $msg="Usu&aacute;rio j&aacute cadastrado";
}
?>

<html>
    <head>
        <title>Login</title>
        
        <!-- define a viewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <!-- formata��o de unicode -->
        <meta charset="utf-8">

        <!-- adicionar CSS Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        
        <!-- css personalizado -->
        <link href="css/estilo.css" rel="stylesheet" media="screen">
    </head>
    
    <body>
        
        <div class="container">
         <div class="card  mx-auto mt-5" style="width: 18rem;"> 

          <div class="card-header">Login </div>
           <div class="card-body">
            <form action="login.php" method="post">
            <div class="form-group mt-2 mx-sm-3 mb-2">
             
<?php                 
                  echo "<h2>".$msg."</h2>";
?>
               
              </div>
             <div class="form-group mt-2 mx-sm-3 mb-2">
              <label for="staticEmail2" class="sr-only"  >Login</label>
<?php              
             echo" <input type='text' size=20 class='form-control'  id='staticEmail2' value=".$_GET['email']." name='email'>";
?>             
             </div>
             <div class="form-group mt-2 mx-sm-3 mb-2">
              <label for="inputPassword2" class="sr-only">Senha</label>
              <input type="password" class="form-control" name='senha' id="inputPassword2" placeholder="Senha">
             </div>
             <br>
            
            <div class="form-group mt-2 mx-sm-3 mb-2">   
             <button type="submit" class="btn btn-primary btn-block ">
              Confirmar identidade
             </button>
            </div>
            <div class="text-center mt-4">
             <a href="recuperarSenha.html" class="card-link">Esqueci a minha senha</a>
            </div>

          </div>
       </div>
      </div>

      <script src="js/jquery-3.5.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
	
    </body>
</html>