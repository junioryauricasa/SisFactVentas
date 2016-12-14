<?php

/*
function validarfoto ( $iD, $nombre ) {
    
       
    global $dirSubidaR ;
    global $rutaSubida ;
    global $errorR ;
    
                 $dirSubidaR = "fotos/$iD/$nombre/" ;
             
                  $foto = $_FILES['foto'];
                  $nombrefoto = $foto['name'];
                  $nombretmp = $foto['tmp_name'];
                  $rutaSubida = "{$dirSubidaR}profile.jpg";
                  $extArchivo = preg_replace ('/image\//','',$foto['type']) ;
                  
                  if ( $extArchivo == "jpeg" || $extArchivo == 'png') {
                      
                       if ( !file_exists( $dirSubidaR ) ) {
                           
                      mkdir( $dirSubidaR, 0777, true );
                           
                             }
                              
                      if ( move_uploaded_file ( $nombretmp, $rutaSubida)) {
                          
                         // echo " <img src='$rutaSubida' alt='' class='img-fluid'> " ;
                          return true ;
                      } else {
                          $error = "no se pudo mover el archivo" ;
                             }
                      
                      } else {
                      
                      $error = 'No es un archivo de imagen valido' ;
                        
                    }
    
    return $error ;
    
          }
*/



    
function updateimg( $actName, $idUpdate ) {
    
    global $dirdelete;
    global $newrutaSubida ;
    global $error ;
    
    $dirdelete = "fotos/$idUpdate/$actName" ;
    
    if ( !file_exists( "backup/$idUpdate/$actName" ) ) {
                           
           mkdir( "backup/$idUpdate/$actName" , 0777, true );
                           
                             }
  
    $gestor = opendir(  "$dirdelete/" );
    
    while ( ( $archivo = readdir( $gestor ) ) != false ){
        
        if ( $archivo != "." && $archivo != ".." ) {
            
            rename( "$dirdelete/$archivo", "backup/$idUpdate/$actName/$archivo" );
        }
    }
    
    closedir( $gestor );
   
    unlink( $dirdelete );
        
                  $dirSubida = "fotos/$idUpdate/$nombre/" ;
                  $foto = $_FILES['foto'];
                  $nombrefoto = $foto['name'];
                  $nombretmp = $foto['tmp_name'];
                  $newrutaSubida = "{$dirSubida}profile.jpg";
                  $extArchivo = preg_replace ('/image\//','',$foto['type']) ;
                  
                  if ( $extArchivo == "jpeg" || $extArchivo == 'png') {
                      
                       if ( !file_exists( $dirSubida ) ) {
                           
                      mkdir( $dirSubida, 0777, true );
                           
                             }
                              
                      if ( move_uploaded_file ( $nombretmp, $newrutaSubida ) ) {
                          
                         // echo " <img src='$rutaSubida' alt='' class='img-fluid'> " ;
                          return true ;
                      } else {
                          $error = "no se pudo mover el archivo" ;
                             }
                      
                      } else {
                      
                      $error = 'No es un archivo de imagen valido' ;
                        
                    }
    
    return $error ;
    
        
    
}