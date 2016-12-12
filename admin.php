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

$db->preparar( "SELECT CONCAT(nombre,' ', apellido)AS nombrecompleto,imagen FROM usuarios WHERE IDUsuario = ? ") ;
$db->prep()->bind_param('i',$sID);
$db->ejecutar();
$db->prep()->bind_result( $unombre, $uimagen);
$db->resultado();
$db->liberar();


$db->preparar ("SELECT
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
                LIMIT 10");
$db->ejecutar();
$db->prep()->bind_result( $dbnombrecompleto, $dbemail, $dbdni,  $dbtelefono, $dbdireccion, $dbedad, $dbciudad, $dbdepartamento, $dbfecha );
$db->resultado();

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
               <h3>SISTEMA DE FACTURACION Y STOCK</h3>
           </div>
       </div>
       <div class="row" id="form-cont">
          <div class="col-md-12 col-centrar border-form">
          




<h2 class="text-xs-center"> Bienvenido Root <?php echo ucwords($unombre)?> </h2>
           <!--<img src="<?php// echo $_SESSION['imagen'] ; ?>" alt="profile" class="img-fluid">-->
             
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
                         </tr>
                     </thead>
                     <tbody>
                         
                         <?php 
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
                      </tr>" ;

                                                      };
                
                         ?>
                     </tbody>
                     
                     
                 </table>
             </div>
       </div>
   </div>
   
    <?php require 'inc/footer.inc' ; ?>