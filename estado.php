
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

<div class="container">
  <div class="header"><?php include("includes/cabecera.php"); ?></div> 
  <p>&nbsp;</p> 
  <div class="sidebar1"><?php include("includes/menuizquierda.php"); ?>
  </div>
  
  <div class="content"><!-- InstanceBeginEditable name="Contenido" --> 

  
   <h1>Consultar estado de DPI</h1>   
  
  
  </h1><form action="estado.php" method="post" name="datos">
	<table align="left">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">CUI:</td>
          <td><input type="text" name="cui" class="campo" id="cui" value="" size="15" /></td>
        
		<table>			
		  </tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" class="boton" value="Buscar" /></td>  
        </table>  
		
		<br></br>
				
	
		</table>
		</form>
			<h5>
		
		<?php
		if(isset($_POST['cui']) && $_POST['cui'] != ""){
			$urll = "http://192.168.0.101:8080/documento/".$_POST['cui'];
			$contentt = file_get_contents($urll);
			$json  = json_decode($contentt, true);
			$dep = $json_decode['descripcion'];

			$opts = '';
			foreach($json as $dpi){
				echo '<option value="'.$dpi['id_dpi'].'">'.$dpi['descripcion'].'</option>';
				echo '<option value="'.$dpi['id_dpi'].'">'.$dpi['fecha_emision'].'</option>';
				echo '<option value="'.$dpi['id_dpi'].'">'.$dpi['fecha_vencimiento'].'</option>';
				
				
				include("includes/line.php");
			}
			}		

		?>	
		
		
		
		
			</h5>	
</body>


<!-- InstanceEnd --></html>
