<?php 

require 'libs/validadorimg.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seltron</title>
    <meta name="viewport" content="width=device-width,initial-scale1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/iconos.css">
    <link rel="stylesheet" href="css/stiles.css">
</head>

<?php if ( ( $_SERVER['SCRIPT_NAME'] != '/portalweb/index.php' ) && ( $_SERVER['SCRIPT_NAME'] != '/portalweb/register.php' ) && ( $_SERVER['SCRIPT_NAME'] != '/portalweb/login.php' ) && ( $_SERVER['SCRIPT_NAME'] != '/portalweb/logout.php' ) ) : ?>
 
  <nav class="bg-blue">
      <div class="container-fluid">
        <div class="col-sm-3 col-md-2">
            <a href="index.php"><img src="img/logowhite.png" alt="logo" class="img-fluid"></a>
        </div>
        <div class="col-md-8">
             <div id="nav-main">
                 <a href="" class="current-nav link-nav">Panel</a>
                 <a href="" class="link-nav">Clientes</a>
                 <a href="" class="link-nav">Ventas</a>
                 <a href="" class="link-nav">Compras</a>
                 <a href="" class="link-nav">Usuarios</a>
            </div>   
        </div>
        <div class="col-md-2 " id="nav-main">
            <div class="alig-cent"><a href="logout.php" class="link-nav">Cerrar sesion</a><span class="icon-exit"></span></div>
        </div>          
      </div>
  </nav>
<?php endif; ?>