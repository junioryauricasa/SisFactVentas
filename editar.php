<?php 

session_start();

require 'libs/config.php' ;

spl_autoload_register( function( $clase) {

  require_once "libs/$clase.php" ;
    
}) ;


if (!$_SESSION['idUsuario'] &&  !$_SESSION['nombre'] ){
    
    header( "Location: index.php" ) ;
    exit;
    
}

$db = new Database( DB_HOST, DB_USER, DB_PASS, DB_NAME ) ;

$fecha = getdate() ;
$diaN = date('d') ;
$anio = date('y');
$meses  = ["Enero","Febrero","Marzo","Abril","Mayo", "Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
$diaS = ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
$dia2 = $diaS[$fecha['wday']];
$mes = $meses[$fecha['mon']-1];



$nombre = $_SESSION['nombre']; 
$imagen = $_SESSION['imagen'];


$sID = $_SESSION['idUsuario'] ;

$db->preparar( "SELECT CONCAT(nombre,' ', apellido)AS nombrecompleto,imagen FROM usuarios WHERE IDusuario = ? ") ;
$db->prep()->bind_param('i',$sID);
$db->ejecutar();
$db->prep()->bind_result( $unombre, $uimagen);
$db->resultado();
$db->liberar();



?>
<?php require 'inc/head.inc' ; ?>


<body class="bg-principal">
   <div class="container-fluid" id="principal-container">
      <div class="row">
          <div class="col-md-12">
            <div class="pull-xs-right" id="calendar">
             <span class="icon-calendar"></span><span>  <?php echo "$dia2 $diaN de $mes del 20$anio" ?></span>
            </div>
          </div>
      </div>
      </div>
      <div class="container">
       <div class="row">

     <div class="col-md-12 col-centrar border-form">
      <div class="row ">

       <div class="col-md-7">
            <h4><span class="icon-user"></span> Administra los usuarios:</h4>
       </div>
       <div class="col-md-5">
           <form class="form-inline pull-xs-right" id="busqueda" method="GET">
            <input name="busqueda" class="form-control" type="text" placeholder="Ingrese su busqueda...">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
       </div>
    </div>
                
           <!--<img src="<?php// echo $_SESSION['imagen'] ; ?>" alt="profile" class="img-fluid">-->
             
              <?php if ( isset( $_GET['editar'] ) ) : ?>
      
      <?php 
       
        $eID = $_GET['editar'] ;  
       
        $db->preparar( "SELECT nombre, apellido, email, telefono, direccion, edad FROM usuarios WHERE IDusuario = ? ") ;
        $db->prep()->bind_param( 'i',$eID );
        $db->ejecutar();
        $db->prep()->bind_result( $enombre, $eapellido, $eemail, $etelefono, $edireccion, $eedad );
        $db->resultado();
        $db->liberar();
       
       
       ?>
        
     
         
             <form action="update.php" method="POST" role="form" enctype="multipart/form-data">
	                 <legend class="text-xs-center">Actualizar registro</legend>
	                 
	                 <div class="form-group">
		               <label for="">Nombre</label>
		              <input type="text" class="form-control" id="" name="nombre" placeholder="<?php echo "$enombre" ;?>">
	                 </div>
                     <div class="form-group">
	                  <label for="">Apellido</label>
		              <input type="text" class="form-control" id="" placeholder="<?php echo "$eapellido"; ?>" name="apellido">
	                 </div>
                       <div class="form-group">
		               <label for="">DNI</label>
		              <input type="text" class="form-control" id="" placeholder="Escriba su DNI.." name="dni">
	                 </div>
                       <div class="form-group">
		               <label for="">Edad</label>
		              <input type="text" class="form-control" id="" placeholder="<?php echo "$eedad"; ?>" name="edad">
	                 </div>
                       <div class="form-group">
		               <label for="">Telefono</label>
		              <input type="text" class="form-control" id="" placeholder="<?php echo "$etelefono"; ?>" name="telefono">
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
		              <input type="text" class="form-control" id="" placeholder="<?php echo "$edireccion" ; ?>" name="direccion">
	                 </div>
                       <div class="form-group">
		               <label for="">Email</label>
		              <input type="text" class="form-control" id="" placeholder="<?php echo "$eemail"; ; ?>" name="email">
	                 </div>
                       <div class="form-group">
		               <label for="">Password</label>
		              <input type="password" class="form-control" id="" placeholder="password" name="contrasena">
	                 </div>
                     <div class="form-group">
		               <label for="">Repeat password</label>
		              <input type="password" class="form-control" id="" placeholder="Pass.." name="contrasena2">
	                 </div>
                     <div class="form-group">
		               <label for="">Escoge una imagen de perfil</label>
		              <input type="file" class="form-control" id="" placeholder="User.." name="foto">
	                 </div>
                     <div class="form-group">
		               <input type="hidden" class="form-control" name="id" value="<?php echo $eID; ?>" >
	                 </div>
                      <div class="form-group">
		               <input type="hidden" class="form-control" name="actname" value="<?php echo "$enombre"; ?>" >
	                 </div>
                      
                       <button type="submit" class="btn btn-primary">Actualizar</button>
                      
                  
                  </form>
         </div>
         </div>
         
     
    <?php elseif( isset( $_GET['confirmdelete'] ) ) :  ?>
              
              <div class="row">    
              <div class="col-md-7 col-centrar border-form text-xs-center">
                  
                  <h3>Estas seguro que deseas Eliminar a este usuario ?</h3>
                  <a class="btn btn-danger" href='<?php echo "editar.php?eliminar={$_GET['confirmdelete']}"; ?>'>Si</a>
                  <a class="btn btn-info" href="editar.php">NO</a>
              </div>
              
              </div>
              
    <?php elseif( isset( $_GET['eliminar'] ) ) :  ?>
              
              <div class="row">    
              <div class="col-md-7 col-centrar border-form text-xs-center">
                  
                 <?php
                  
                  
                  $eliminar = $_GET['eliminar'] ;
                  
                  $db->preparar ("DELETE FROM usuarios
                  WHERE IDusuario = ?
                                        ");
                  $db->prep()->bind_param( 'i', $eliminar );
                  $db->ejecutar();      
                  $db->resultado();
                  $db->liberar();
                  
                  if ( $db->filasAfectadas() > 0 ) {
                      
                      echo "Eliminacion correcta <br> seras redireccionado" ;
                          echo $db->filasAfectadas();
                          header( "Refresh:5; url=editar.php");
                  }
                  
                 ?>
              </div>
              
              </div>            

 <?php  else :  ?>
                 <br>
                 
                 <table class="table">
                     <thead class="thead-inverse">
                         <tr>
                             <th> # </th>
                             <th> Nombre </th>
                             <th> Email </th>
                             <th> DNI </th>
                             <th> Telefono</th>
                             <th> Direccion </th>
                             <th> Edad </th>
                             <th> Ciudad </th>
                             <th> Departamento </th>
                             <th> Fecha </th>
                             <th>Editar/Eliminar</th>
                         </tr>
                     </thead>
                     <tbody>
                         
                         <?php 
    
                        if  ( isset($_GET['busqueda']) ) {
                            
                            if( empty( $_GET['busqueda']) ) {
                                
                                 echo "porfavor escribe algo en el cuadro de busqueda" ;
                            
                            }
                            
                          $consulta = "SELECT
                                            IDusuario, 
                                            CONCAT(nombre, ' ', apellido) AS nombrecompleto,
                                            email,
                                            dni,
                                            telefono, 
                                            direccion, 
                                            edad,
                                            ciudad,
                                            departamento, 
                                            fecha
                                            FROM usuarios
                                            WHERE nombre LIKE" ;  
                            
                            $busqueda = explode( " ", $_GET['busqueda'] );
                        
                            for ( $i = 0 ; $i < count($busqueda); $i++ ){ 
                                
                                if ($busqueda[$i] != '') {
                                    if ( $i != 0 ) {
                                        
                                        $consulta .= ' OR nombre LIKE ' ;
                                    }
                                 
                                    $consulta .= " '%{$busqueda[$i]}%' " ;
                                    
                                }
                            
                            
                            }
                            
                            $consultabusqueda = " SELECT COUNT(IDusuario) FROM usuarios WHERE nombre LIKE" ;
                            
                            
                            for ( $i = 0 ; $i < count($busqueda); $i++ ){ 
                                
                                if ($busqueda[$i] != '') {
                                    if ( $i != 0 ) {
                                        
                                        $consultabusqueda .= ' OR nombre LIKE ' ;
                                    }
                                 
                                    $consultabusqueda .= " '%{$busqueda[$i]}%' " ;
                                    
                                }
                            
                            
                            }
                            
                        $db->preparar ( $consultabusqueda );
                        $db->ejecutar();
                        $db->prep()->bind_result( $contador );
                        $db->resultado();
                        $db->liberar() ;
                            
                        $porPagina = 3 ;
                        $paginas = ceil( $contador/$porPagina );
                        $pagina = ( isset( $_GET['pagina']) ) ? (int)$_GET['pagina'] : 1 ;
                        $iniciar = ( $pagina-1 ) * $porPagina  ;   
                        
                        $consulta .= " ORDER BY fecha LIMIT $iniciar, $porPagina" ;
                            
                        } else { 
                                
                                
                        $db->preparar (" SELECT COUNT(IDusuario) FROM usuarios");
                        $db->ejecutar();
                        $db->prep()->bind_result( $contador );
                        $db->resultado(); 
                        $db->liberar();
                        $porPagina = 5 ;
                        $paginas = ceil( $contador/$porPagina );
                        $pagina = ( isset( $_GET['pagina']) ) ? (int)$_GET['pagina'] : 1 ;
                        $iniciar = ( $pagina-1 ) * $porPagina ;
                         
                        $consulta = "SELECT
                                            IDusuario, 
                                            CONCAT(nombre, ' ', apellido) AS nombrecompleto,
                                            email,
                                            dni,
                                            telefono, 
                                            direccion, 
                                            edad,
                                            ciudad,
                                            departamento, 
                                            fecha
                                            FROM usuarios
                                            ORDER BY fecha 
                                            LIMIT $iniciar, $porPagina " ;
                            
                        }
                         
                       
                        $db->preparar ( $consulta );
                        $db->ejecutar();
                        $db->prep()->bind_result( $dbIDuser, $dbnombrecompleto, $dbemail, $dbdni,  $dbtelefono, $dbdireccion, $dbedad, $dbciudad, $dbdepartamento, $dbfecha );
                        $db->resultado();
                        

                        $conteo = $iniciar ;
                          while ( $db->resultado() ) {
                        $nombreC = ucwords($dbnombrecompleto);
                        $conteo ++;
              
                  echo "<tr>
                        <td>$conteo</td>
                        <td>$nombreC</td>
                        <td>$dbemail</td>
                        <td>$dbdni</td>
                        <td>$dbtelefono</td>
                        <td>$dbdireccion</td>
                        <td>$dbedad</td>
                        <td>$dbciudad</td>
                        <td>$dbdepartamento</td>
                        <td>".date('d/m/y', $dbfecha )."</td>
                        <td>
                        <a class=' btn btn-success botonsito 'href='editar.php?editar=$dbIDuser'><span class='icon-pencil'></span></a>
                        <a class=' btn btn-danger botonsito 'href='editar.php?confirmdelete=$dbIDuser'><span class='icon-cross'></span></a>
                        </td>
                      </tr>" ;
                              

                     };
            
                        $db->liberar();
                         ?>
                         
                     </tbody>
                     
                     
                 </table>
                 
                 <?php 
                  
              $anterior = ($pagina-1);
              $siguiente = ($pagina+1);
                   ?>
                   <div class="hori-cent">
                        <nav aria-label="Page navigation">
                          <ul class="pagination">

                            <?php if ( !($pagina <=1) ) : ?>

                                 <li class="page-item">
                                  <a class="page-link" href='<?php echo "?pagina=$anterior" ?>' aria-label="anterior">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                </li>

                            <?php endif; ?>

                                    <?php 

                                    if ( $paginas >= 1) {

                                      for( $x = 1; $x<=$paginas; $x++ ) {

                                            echo ( $x == $pagina ) ? "<li class='page-item active'><a class='page-link' href='?pagina=$x'>$x</a></li>" : 

                                                                     "<li class='page-item'><a class='page-link' href='?pagina=$x'>$x</a></li>" ;

                                      }

                                    }



                                      ?>
                           <?php if ( !($pagina >= $paginas) ) :?>

                             <li class="page-item">
                              <a class="page-link" href='<?php echo "?pagina=$siguiente" ?>' aria-label="siguiente">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>

                           <?php endif; ?>
                          </ul>
                        </nav>
                   </div>

      
       </div>
   
   
   <?php endif; ?>
    <?php require 'inc/footer.inc' ; ?>