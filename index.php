<?php require 'inc/head.inc' ; 

session_start();

if ( (isset( $_SESSION['nombre'] ) && isset( $_SESSION['idUsuario'] ) ) || isset( $_COOKIE['nombre'] ) ) {
    
  if( isset( $_COOKIE['nombre'] ) ){
      
      
    $_SESSION['idUsuario'] = $_COOKIE['id'];
    $_SESSION['nombre'] = $_COOKIE['nombre'];
    $_SESSION['imagen'] = $_COOKIE['img'];
      
  }
    
    
    header( "Location: admin.php" );
}



?>



<body>
   <div class="container-fluid" id="principal-container">
       <div class="row" id="title-cont">
           <div class="col-md-12 text-xs-center">
               <h3>SISTEMA DE FACTURACION Y STOCK</h3>
           </div>
       </div>
       <div class="row" id="form-cont">
          <div class="col-md-6 col-centrar border-form">
                   <form action="login.php" method="POST" role="form" class="border">
	                 <legend class="text-xs-center">LOGUEATE</legend>
	                 <div class="form-group">
		               <label for="">Email</label>
		              <input type="text" class="form-control" id="" placeholder="Correo.." name="email">
	                 </div>
                     <div class="form-group">
	                  <label for="">Contraseña</label>
		              <input type="password" class="form-control" id="" placeholder="Password.." name="contrasena">
	                 </div>
                       <button type="submit" class="btn btn-primary">Ingresar</button>    
                                                   <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input" name="recordar" value="activo">
                                  Mantener sesion inciada
                                </label>
                       <a href="register.php" class="pull-xs-right">Registrarse</a>
                  </form>
              </div>
       </div>
   </div>
   
    <?php require 'inc/footer.inc' ; ?>
