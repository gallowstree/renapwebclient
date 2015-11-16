

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/Principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Registro de Personas</title>
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
  <h1>Registro de Personas</h1>
  
  <form action="newpersona.php" method="post" name="datos">
	<table align="left">
		
        <tr valign="baseline">
			
		  <td nowrap="nowrap" align="right">CUI:</td>
		  <td><input type="text" name="cui"  id="cui" value="" size="15" /></td></tr>         
        
			<td nowrap="nowrap" align="right">Primer nombre:</td>
			<td><input type="text" name="nombre" " id="nombre" value="" size="15" /></td></tr>               
        
        	<td nowrap="nowrap" align="right">Segundo nombre:</td>
			<td><input type="text" name="nombredos" id="nombredos" value="" size="15" /></td></tr>       
        
        	<td nowrap="nowrap" align="right">Tercer nombre:</td>
			<td><input type="text" name="nombretres" id="nombretres" value="" size="15" /></td></tr>
        
        
        	<td nowrap="nowrap" align="right">Primer apellido:</td>
			<td><input type="text" name="apellido" id="apellido" value="" size="15" /></td></tr>
               
        
        	<td nowrap="nowrap" align="right">Segundo apellido:</td>
			<td><input type="text" name="apellidodos" id="apellidodos" value="" size="15" /></td><tr>        
							
        </tr>       
     </table>
		
	<table align="right">		
			<td nowrap="nowrap" align="right">Genero:</td>
			<td><input type="radio" align="right" name="genero" value="m" checked> Masculino
			<input type="radio" align="right" name="genero" value="f"> Femenino
			</td></tr>	
			
			<td nowrap="nowrap" align="right">Fecha de nacimiento:</td>
			<td><input type="date" name="nacimiento" id="nacimiento" value="" size="15" /></td><tr> 
			
			<td nowrap="nowrap" align="right">Departamento:</td>
			<td>
				
			<?php
			$urll = "http://192.168.0.101:8080/departamentos/";
			$contentt = file_get_contents($urll);
			$json  = json_decode($contentt, true);
			$dep = $json_decode['nombre'];


			$opts = '';
			foreach($json as $departamento)
			{
			$opts .= '<option value="'.$departamento['id_departamento'].'">'.$departamento['nombre'].'</option>';
			}

			echo  '<select name="json">'.$opts.'</select>';

			?>				
			</td><tr>
				
			<td nowrap="nowrap" align="right">Municipio:</td>
			<td><input type="texto" name="municipio" id="municipio" value="" size="20" /></td><tr> 
				
			<td nowrap="nowrap" align="right">Direccion::</td>
			<td><input type="texto" name="direccion" id="direccion" value="" size="20" /></td><tr> 
			
			<td nowrap="nowrap" align="right">Pais:</td>
			<td><input type="texto" name="pais" id="pais" value="" size="20" /></td><tr> 
				
				
	</table>
	<table align="center">	
		<form>	
			<br><br><br><br><br><br><br><br>
			<tr valign="baseline">
			<td nowrap="nowrap" align="center">&nbsp;</td>
			<td><input type="submit" class="boton" value="Registrar" /></td> 
			</tr>
			</form>
	</table>	
	
	<?php
	$url = "http://192.168.0.101:8080/personas/";
    $cui = $_POST['cui'];
    $nombre = $_POST['nombre'];
    $nombredos = $_POST['nombredos'];
    $nombretres = $_POST['nombretres'];
    $apellido = $_POST['apellido'];
    $apellidodos = $_POST['apellidodos'];
    $genero = $_POST['genero'];
    $nacimiento = $_POST['nacimiento'];
    $departamento = $_POST['departamento'];
    $municipio = $_POST['municipio'];
    $direccion = $_POST['direccion'];
    $pais = $_POST['pais'];
    
    $arreglo = array(
		"dpi"					=>	$cui,
		"nombre"				=>	$nombre,
		"segundo_nombre"		=>	$nombredos,
		"tercer_nombre" 		=>	$nombretres,
		"primer_apellido"		=>	$apellido,
		"segundo_apellido"		=>	$apellidodos,
		"genero"				=>	$genero,
		"nacimiento"			=>	$nacimiento,
		"id_municipio" 			=>	$municipio,	
		"direccion" 			=>	$direccion,
		"id_pais"				=>	$pais,
		);			

	$data = array('http' =>
	array(
	'method' => 'POST',
	'header' => 'Content-type: application/json',
	'content' => json_encode($arreglo)
	)
	);
	$context = stream_context_create($data);
	$result = file_get_contents($url, false, $context);			
	$data_string = json_encode($data);

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Type: application/json',
	'Content-Length: ' . strlen($data_string))
	);

	$result = curl_exec($ch);	
    
	?>
	
		
	     
</form>		
		</div>
		</table>
		
</body>
<!-- InstanceEnd --></html>
