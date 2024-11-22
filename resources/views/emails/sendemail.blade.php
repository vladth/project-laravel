<!DOCTYPE html>
<html>
<head>
	<title>Mensaje Nuevo</title>
</head>
<body>
	<p>Hola, Soy {{ $data['name'] }}</p>
	<p>Con el correo: {{ $data['email'] }}</p>
	<p>Asunto:</p>
	<p>Tengo alguna consulta como: <br> {{ $data['message'] }}.</p>
	<p>Se apreciaría la pronta revisión de este mensaje y espero su pronta respuesta gracias.</p>
</body>
</html>