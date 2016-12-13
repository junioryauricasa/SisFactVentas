<?php

function validarfoto ( $nombre,  $update = false ) {
    
   
    
    global $dirSubida ;
    global $rutaSubida ;
    global $error ;
    
                 $dirSubida = "fotos/$nombre/" ;
             
                  $foto = $_FILES['foto'];
                  $nombrefoto = $foto['name'];
                  $nombretmp = $foto['tmp_name'];
                  $rutaSubida = "{$dirSubida}profile.jpg";
                  $extArchivo = preg_replace ('/image\//','',$foto['type']) ;
                  
                  if ( $extArchivo == "jpeg" || $extArchivo == 'png') {
                      
                       if ( !file_exists( $dirSubida)) {
                           
                      mkdir( $dirSubida, 0777 );
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
    