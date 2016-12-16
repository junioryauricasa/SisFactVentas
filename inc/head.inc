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
      <div class="container-fluid" id="cont-nav">
        <div class="col-sm-3 col-md-2" id="cont-logo">
            <a href="index.php"><img src="img/logowhite.png" alt="logo" class="img-fluid" ></a>
        </div>
        <div class="col-md-9">
             <div id="nav-main">
                 <a href="" class="current-nav link-nav">Panel</a>
                 <a href="" class="link-nav">Clientes</a>
                 <a href="" class="link-nav">Ventas</a>
                 <a href="" class="link-nav">Compras</a>
                 <a href="" class="link-nav">Usuarios</a>
            </div>   
        </div>
        <div class="col-md-3 " id="nav-main">
            <div class="row">
                <div class="col-md-4">
                   <img src="<?php echo "$uimagen" ?>" alt="" class="img-fluid"> 
                </div>
                <div class="col-md-10">
                    <div class="alig-cent">
                       <p><?php echo ucwords($unombre)?></p>
                    <a href="logout.php" class="link-nav">Cerrar sesion</a><span class="icon-exit"></span>
                    </div>
                </div>
            </div>
        </div>          
      </div>
  </nav>
<?php endif; ?>