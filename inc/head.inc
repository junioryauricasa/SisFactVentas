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
 
<div class="container-fluid" id="cont-nav">
  <div class="row bg-blue">
      <nav class="bg-blue" id="nav-bar-top">
            <div class="hidden-sm-down col-md-2 col-lg-2 no-padd-aside" id="cont-logo">
               <div class=" height-nav aling-c">
                  <a href="index.php"><img src="img/logowhite.png" alt="logo" class="img-fluid" ></a>
               </div>
            </div>
            <div class="col-xl-6 col-sm-6 col-md-7 col-lg-7 no-padd-aside">
                     <div class="height-nav" id="nav-main">
                     <a href="admin.php" class="<?php if($_SERVER['SCRIPT_NAME'] == '/portalweb/admin.php') { echo "current-nav" ;} else { echo "no" ;} ?> link-nav">Panel</a>
                     <a href="editar.php" class="<?php if($_SERVER['SCRIPT_NAME'] == '/portalweb/editar.php') : echo "current-nav" ; endif; ?> link-nav">Clientes</a>
                     <a href="" class="link-nav">Ventas</a>
                     <a href="" class="link-nav">Compras</a>
                     <a href="" class="link-nav">Usuarios</a>
                     
                     </div>
            </div>
            <div class="col-sm-6 col-xl-4 col-md-3 col-lg-3 no-padd-aside  nav-profile">
                 <div class="aling-c height-nav">
                     <div class="hidden-xs-down col-sm-6 col-xl-6 col-md-2 col-lg-3 no-padd-aside">
                        <!--<p style="color:white">Lorem ipsum dolor sit amet.</p>-->
                     </div>
                  <div class="hidden-sm-down col-xl-2 col-md-3 col-sm-2 col-lg-3  no-padd-aside">
                         <div class="img-round ">
                           <img src="<?php echo "$uimagen" ?>" alt="" class="img-fluid rounded"> 
                         </div>
                  </div>
                  <div class="col-xl-4 col-md-7 col-lg-6 no-padd-aside ">
                        <div class="alig-cent">
                            <div class=" fuente-name ">
                              <spam><?php echo ucwords($unombre)?></spam>
                            </div>
                            <div>
                               <a href="logout.php" class="link-logout"><spam class="">Cerrar sesion </spam><span class="icon-exit"></span></a>
                             </div>
                        </div>
                  </div>
                 </div>
             </div>
      </nav>
  </div>
</div>
                 

                    
         

                      
<?php endif; ?>