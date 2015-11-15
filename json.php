
<?php
$ip = "192.168.1.17";
$url = "http://192.168.1.17/personas/";
$postdata = array(
		"dpi"				=>	"99",
		"nombre"			=>	"Guimi",
		"segundo_nombre"	=>	"Guimi",
		"tercer_nombre" 	=>	"Guimi",
		"primer_apellido"	=>	"Florian",
		"segundo_apellido"	=>	null,
		"genero"			=>	"m",
		"nacimiento"		=>	"1999-03-03",
		"id_municipio" 		=>	"1",	
		"direccion" 		=>	"su casa",
		"id_pais"			=>	"1",
		);	
		

$data = array('http' =>
array(
'method' => 'POST',
'header' => 'Content-type: application/json',
'content' => json_encode($postdata)
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
