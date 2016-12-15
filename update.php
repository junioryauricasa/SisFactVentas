<?php
           
session_start();

require 'libs/validadorimg.php' ;
require 'libs/config.php' ;
    
spl_autoload_register( function( $clase) {

  require_once "libs/$clase.php" ;
    
}) ;


if (!$_SESSION['idUsuario'] &&  !$_SESSION['nombre'] ){
    
    header( "Location: index.php" ) ;
    exit;
    
} 

extract( $_POST, EXTR_OVERWRITE ) ;


?>


<?php if ( isset( $id ) ) {
    
    
  if ( $nombre && $email && $contrasena && $contrasena2 ) {
      
  $db = new Database( DB_HOST, DB_USER, DB_PASS, DB_NAME ) ;
  $expreg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

  if ( preg_match( $expreg, $email ) ) {

      if( strlen( $contrasena ) > 6 ) {

          if( $contrasena == $contrasena2 ) { 

           $validarEmail = $db->validarDatos ('email', 'usuarios', $email);

              if ( $validarEmail == 0 ) {

                    if ( updateimg ( $actname, $id, $nombre ) ) {
                        
                         echo "$dirdelete" ;

                        $fecha = time();
                          // echo " <img src='$rutaSubida' alt='' class='img-fluid'> " ;
                            if ( $db->preparar( " UPDATE usuarios SET
                                                   nombre = ?,
                                                   apellido = ?, 
                                                   edad = ?,
                                                   telefono = ?,
                                                   ciudad = ?,
                                                   departamento = ?, 
                                                   direccion = ?,
                                                   email = ?,
                                                   contrasena = ?,
                                                   imagen = ?
                                                   WHERE IDusuario = ? " ) ){

                            $db->prep()->bind_param( 'ssiissssisi', $nombre, $apellido, $edad, $telefono, $ciudad, $departamento, $direccion, $email, $contrasena, $newrutaSubida, $id ) ;
                            $db->ejecutar();
                            $db->liberar() ;
                            
                            echo "todo salio perfecto" ;
                            header( "Refresh:5; url:editar.php") ;
                        }

                    } else { 

                    echo "$error";

                    }

              } else {

                  echo "Correo ya registrado $email";
                  echo "depurando $newrutaSubida" ;


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

} else {

      echo " Porfavor ingresa los campos " ;
  }

      
    
    
    
}
?>