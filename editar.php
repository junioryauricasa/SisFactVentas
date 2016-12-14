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


<body>
   <div class="container-fluid" id="principal-container">
    
     
    
     
      <div class="row">
          <div class="col-md-12">
            <div class="pull-xs-right" id="calendar">
             <span class="icon-calendar"></span><span>  <?php echo "$dia2 $diaN de $mes del 20$anio" ?></span>
            </div>
          </div>
      </div>
       <div class="row" id="title-cont">
           <div class="col-md-12 text-xs-center">
               <h3>Celerix 1.0</h3>
           </div>
       </div>
       <div class="row" id="form-cont">
          <div class="col-md-12 col-centrar border-form">


<h2 class="text-xs-center"> Bienvenido Root <?php echo ucwords($unombre)?> </h2>
          <h4>Edita o elimina usuarios:</h4>
          <br>
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
        
     <div class="col-md-6 col-centrar border-form">
         <form action="update.php" method="POST" role="form" class="border" enctype="multipart/form-data">
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
                      
                       <button type="submit" class="btn btn-primary">Actualizar</button>
                      
                  
                  </form>
         
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
                 <br><br><br>
                 
                 <table class="table table-bordered">
                     <thead>
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
    
                            $db->preparar ("SELECT
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
                                        ");
                        $db->ejecutar();
                        $db->prep()->bind_result( $dbIDuser, $dbnombrecompleto, $dbemail, $dbdni,  $dbtelefono, $dbdireccion, $dbedad, $dbciudad, $dbdepartamento, $dbfecha );
                        $db->resultado();
                        

                        $conteo = 0 ;
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
                        <a class=' btn btn-success 'href='editar.php?editar=$dbIDuser'><span class='icon-pencil'></span></a>
                        <a class=' btn btn-danger 'href='editar.php?confirmdelete=$dbIDuser'><span class='icon-cross'></span></a>
                        </td>
                      </tr>" ;

                     };
            
                $db->liberar();
                         ?>
                         
                     </tbody>
                     
                     
                 </table>
             </div>
       </div>
   </div>
   
   <?php endif; ?>
    <?php require 'inc/footer.inc' ; ?>