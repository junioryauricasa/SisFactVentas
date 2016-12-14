<?php require 'inc/head.inc' ; ?>

<?php 


?>

<body>
   <div class="container-fluid" id="principal-container">
       <div class="row" id="title-cont">
           <div class="col-md-12 text-xs-center">
               <h3>SISTEMA DE FACTURACION Y STOCK</h3>
           </div>
       </div>
       <div class="row" id="form-cont">
          <div class="col-md-10 col-centrar border-form">
                  
            <?php 
              $ok = false ;
              
              require 'libs/config.php' ;
              
              spl_autoload_register( function( $clase){
                  
                  require_once "libs/$clase.php" ;
                  
              }) ;
              
              
              
              if ($_POST) {
                  
                  extract( $_POST, EXTR_OVERWRITE );
                  
                  if ( !file_exists("fotos")) {
                      
                      mkdir("fotos", 0777) ;
                  }
                  $nombre = strtolower ( $nombre );
                  
              if ( $nombre && $email && $contrasena && $contrasena2 ) {
                  
                  $db = new Database( DB_HOST, DB_USER, DB_PASS, DB_NAME ) ;
                    
                  $expreg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
                  
                  if ( preg_match( $expreg, $email ) ) {
                      
                      if( strlen( $contrasena ) > 6 ) {
                          
                          if( $contrasena == $contrasena2 ) { 
                              
                           $validarEmail = $db->validarDatos ('email', 'usuarios', $email);
                              
                              if ( $validarEmail == 0 ) {
                                  
                                        $fecha = time();
                     
                                          // echo " <img src='$rutaSubida' alt='' class='img-fluid'> " ;
                                        
                                        if ( $db->preparar( "INSERT INTO usuarios VALUES ( NULL, '$nombre','$apellido','$email','$contrasena',$dni,$telefono,'$direccion', $edad, '$ciudad', '$departamento','preparando','$fecha' )") ) {
                                            
                                            $db->ejecutar();
                                            $db->liberar() ;
                                           
                                            
                                            $db->preparar( "SELECT IDusuario, nombre FROM usuarios
                                                   WHERE email = ? " ) ;
                                            $db->prep()->bind_param( 's', $email) ;
                                            $db->ejecutar();
                                            $db->prep()->bind_result($imgID, $imgname);
                                            $db->resultado();
                                            $db->liberar() ;

                                            if ( validarfoto( $imgID, $imgname )) {
                                               
                                                $db->preparar( "UPDATE usuarios SET imagen = ? WHERE IDusuario = ?");
                                                $db->prep()->bind_param( 'si',$rutaSubida, $imgID ) ;
                                                $db->ejecutar();
                                                $db->liberar() ;
                                                $ok = true ;
                                                 echo "imagen subida con ID como nombre";
                                                }

                                            } else { 

                                            echo "$error";

                                            }
                                  
                                              } else {

                                                  echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                               <span aria-hidden="true">&times;</span>
                                                             </button>
                                                             <strong>Holy guacamole!</strong> Este correo ya esta registrado.
                                                           </div>';


                                              }


                                            } else {

                                              echo "las contraseñas no coinciden";
                                          }

                                      } else {

                                          echo "La Contraseña tiene que ser mayor a 7 caracteres";
                                      }

                                  } else {

                                      echo "Email erroneo, porfavor ingresa un Email valído";
                                  }

                              };
                                  }


             /* 
              $db->preparar ( "SELECT nombre, apellido, ciudad FROM usuarios");
              $db->ejecutar ();
              $db->prep()->bind_result( $nombre, $apellido, $ciudad );*/
              
            /*  echo "<table class='table table cell'
                    <thead>
                    <tr>
                    <td>nombre</td>
                    <td>Apellido</td>
                    <td>Ciudad</td>
                    </tr>
                    <tbody>
              " ;
              while ( $db->resultado() ) {
                  
                  echo "<tr>
                        <td>$nombre</td>
                        <td>$apellido</td>
                        <td>$ciudad</td>
                      <tr>" ;
                  
              };*/
              
              
//              echo "</tbdoy>
//                    </table>" ;
//                  
//              echo $db->validarDatos( 'nombre', 'usuarios', 'José');
              
              
                  
             // $array = $db->getClientes();

             /* foreach ( $array as $v ) {
                  foreach( $v as $k2 => $v2){
                      
                       echo "$k2 -> $v2 <br>" ;
                  }
                 
              }*/
            ?>
                 
                  <?php 
              
                      if ( $ok ) :  ?>
              
                      <div class="alert alert-success" role="alert">
                      <strong>Well done! <?php echo $nombre ?></strong>Te has registrado correctamente, porfavor incia sesion</strong>
                      <br>
                       <a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Inicia sesion</a>
                      </div>
                      
                      <?php else :?>
             
                   <form action="" method="POST" role="form" class="border" enctype="multipart/form-data">
	                 <legend class="text-xs-center">Registrate</legend>
	                 <div class="form-group">
		               <label for="">Nombre</label>
		              <input type="text" class="form-control" id="" name="nombre" placeholder="Escriba su nombre">
	                 </div>
                     <div class="form-group">
	                  <label for="">Apellido</label>
		              <input type="text" class="form-control" id="" placeholder="Escriba su apellido" name="apellido">
	                 </div>
                       <div class="form-group">
		               <label for="">DNI</label>
		              <input type="text" class="form-control" id="" placeholder="Escriba su DNI.." name="dni">
	                 </div>
                       <div class="form-group">
		               <label for="">Edad</label>
		              <input type="text" class="form-control" id="" placeholder="Escriba su edad..." name="edad">
	                 </div>
                       <div class="form-group">
		               <label for="">Telefono</label>
		              <input type="text" class="form-control" id="" placeholder="Escriba su telefono" name="telefono">
	                 </div>
                       <div class="form-group">
		               <label for="">Ciudad</label>
		              <input type="text" class="form-control" id="" placeholder="Escriba su ciudad" name="ciudad">
	                 </div>
                       <div class="form-group">
		               <label for="">Departamento</label>
		              <input type="text" class="form-control" id="" placeholder="Escriba su departamento" name="departamento">
	                 </div>
                      <div class="form-group">
		               <label for="">Dirección</label>
		              <input type="text" class="form-control" id="" placeholder="Escriba su dirección" name="direccion">
	                 </div>
                       <div class="form-group">
		               <label for="">Email</label>
		              <input type="text" class="form-control" id="" placeholder="Escriba su email" name="email">
	                 </div>
                       <div class="form-group">
		               <label for="">Password</label>
		              <input type="password" class="form-control" id="" placeholder="Pass.." name="contrasena">
	                 </div>
                     <div class="form-group">
		               <label for="">Repeat password</label>
		              <input type="password" class="form-control" id="" placeholder="Pass.." name="contrasena2">
	                 </div>
                      <div class="form-group">
		               <label for="">Escoge una imagen de perfil</label>
		              <input type="file" class="form-control" id="" placeholder="User.." name="foto">
	                 </div>
                       <button type="submit" class="btn btn-primary">Registrarse</button>
                       <a href="index.php" class="pull-xs-right">Click aquí si ya tienes una cuenta</a>
                  </form>
                  <?php endif; ?>
              </div>
       </div>
   </div>            
      
    <?php require 'inc/footer.inc' ; ?>
