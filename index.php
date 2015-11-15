<?php
$pnombre = "";
$snombre = "";
$tnombre = "";
$papellido = "";
$sapellido = "";
$genero = "";
$nacimiento = "";
$id_municipio = "";
$direccion = "";

if(isset($_POST['cui']) && $_POST['cui'] != ""){
	$url = "http://192.168.1.17/personas/".$_POST['cui'];
	$content = file_get_contents($url);
	$json  = json_decode($content, true);
	$cui = "CUI: ". $json['dpi'];
	$pnombre = "Nombre: ". $json['nombre'];
	$snombre = $json['segundo_nombre'];
	$tnombre = $json['tercer_nombre'];	
	$papellido = "Apellidos: ". $json['primer_apellido'];
	$sapellido = $json['segundo_apellido'];	
	$genero = "Genero: ".$json['genero'];
	$nacimiento = "Nacimiento: ". $json['nacimiento'];
	$id_municipio = "ID Municipio: ". $json['id_municipio'];
	$direccion = "Direccion: ". $json["direccion"];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Renap</title>
<p>&nbsp;</p> 
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<link href="css/principal.css" rel="stylesheet" type="text/css" />
<?php include("includes/header.php"); ?>

</head>

<body>
<?php include("includes/afterbody.php"); ?>

<div class="container">
  <div class="header"><?php include("includes/cabecera.php"); ?></div> 
  <p>&nbsp;</p> 
  <div class="sidebar1"><?php include("includes/menuizquierda.php"); ?>
  </div>
  
  <div class="content"><!-- InstanceBeginEditable name="Contenido" -->
 
  

  
   <h1>Consultar persona</h1>
  
  
  
  
  </h1><form action="index.php" method="post" name="datos">
	<table align="left">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">CUI:</td>
          <td><input type="text" name="cui" class="campo" id="cui" value="" size="15" /></td>
        
		<table>			
		  </tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" class="boton" value="Buscar" /></td>  
        </table>  
	
		<div class="footer">
			<h4>Datos Personales</h4> 
			<h5>
			<?php 
				include("includes/pie.php");
				echo $cui."<br>";
				echo $pnombre, " ", $snombre, " ", $tnombre, " "."<br>";
				echo $papellido, " ", $sapellido."<br>";
				echo $genero."<br>";
				echo $nacimiento."<br>";
				echo $direccion."<br>";
				echo $id_municipio."<br>";  
			?>	
			</h5>
			</div>		
		</div>
		</table>
		</form>
</body>



<!-- InstanceEnd --></html>
