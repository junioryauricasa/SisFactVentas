
<?php require 'inc/head.inc' ; ?>


<?php 

if ($_POST) {
                  
         extract( $_POST, EXTR_OVERWRITE );
                
        $nombre = strtolower ( $nombre );

        if ( $email && $contrasena) {
            
              $db = new Database( DB_HOST, DB_USER, DB_PASS, DB_NAME ) ;
              $validarEmail = $db->validarDatos ('email', 'usuarios', $email);
              $expreg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            

       if ( preg_match( $expreg, $email ) ) {
           
           
           
       if ( $validarEmail != 0 ) {
         
            $db->preparar ("SELECT contrasena, nombre, email FROM usuarios WHERE email = '$email'");
           $db->ejecutar();
           $db->prep()->bind_result( $dbnombre, $dbcontrasena, $dbemail );
           $db->resultado();
           
           if ( $email == $dbemail ) {
               
               if ( $contrasena == $dbcontrasena ) {
                   
                   $ok = true ; 
                   
               } else {
                   
                   echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Lo siento!</strong> La contraseña no coincide con el correo.
                          </div>'
                   
               }
               
           }
           
           
          } else {
           
            echo '<div class="alert alert-danger" role="alert">
                                            <strong>Lo sentimos!</strong> Ese correo no esta registrado porfavor intenta con otro.
                                          </div>';
       }
       
       } else {
           
             echo '<div class="alert alert-danger" role="alert">
                                            <strong>Lo sentimos!</strong>Porfavor ingresa un correo valido.
                                          </div>';
       }
                      
            
            
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
                   <form action="admin/" method="POST" role="form" class="border">
	                 <legend class="text-xs-center">LOGUEATE</legend>
	                 <div class="form-group">
		               <label for="">Usuario</label>
		              <input type="text" class="form-control" id="" placeholder="User..">
	                 </div>
                     <div class="form-group">
	                  <label for="">Contraseña</label>
		              <input type="password" class="form-control" id="" placeholder="Password..">
	                 </div>
                       <button type="submit" class="btn btn-primary">Ingresar</button>
                       <a href="register.php" class="pull-xs-right">Registrarse</a>
                  </form>
              </div>
       </div>
   </div>
   
 <?php require 'inc/footer.inc' ; ?>