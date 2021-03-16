<?php
    
    $host = "localhost";
    $dbname = "veterinaria";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   //2. construir la sentencia sql
    $sql = "SELECT p.nombre, p.animal, p.edad, p.nombre_dueño, e.enfermedad,
     r.medico FROM pacientes as p JOIN registro r ON p.id = r.id_paciente JOIN 
     enfermedades e ON r.id_enfermedad = e.id ORDER BY p.nombre ASC";

    //3.preparar sentencia sql
    $q = $cnx->prepare($sql);

    //4. ejecutar la sentencia sql

    $result = $q->execute();

    $registros = $q->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de registros</title>

    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="css/styles2.css" type="text/css">

</head>
<body>

<header id="main-header">
		<a id="logo-header" href="">
			<span class="site-name">Huellitas de amor</span>
            <span class="site-desc">"Siempre al cuidado de tu mascota"</span>
		</a>
	<nav>
		<ul>
            <li><a href="crear-paciente.php">PACIENTE</a></li>
			<li><a href="registro-paciente/crear-registro.php">REGISTRO</a></li>
			<li><a href="reportes/registro-completo.php">LISTA DE REGISTRO</a></li>
        </ul>
	</nav>
	</header>


    <section id="main-content">

            <center>
<h1>Lista de Registros</h1>
    <table border = "1">
    <tr>
     <td>
        Nombre del Paciente
     </td>
     <td>
        Tipo de Animal
     </td>
     <td>
        Edad
     </td>
     <td>
        Nombre del Dueño
     </td>
     <td>
        Enfermedad
     </td>
     <td>
        Medico
     </td>
    </tr>
    

<?php
    for($i =0; $i<count($registros); $i++) {
?>
    <tr>
    <td>
        <?php echo $registros[$i]["nombre"] ?>
 </td>
 <td>
 <?php echo $registros[$i]["animal"] ?>
 </td>
 <td>
 <?php echo $registros[$i]["edad"] ?>
 </td>
 <td>
 <?php echo $registros[$i]["nombre_dueño"] ?>
 </td>
 <td>
 <?php echo $registros[$i]["enfermedad"] ?>
 </td>
 <td>
 <?php echo $registros[$i]["medico"] ?>
 </td>
    </tr>
<?php
    }
?>
    </table>
    </center>
        <br>
    </section> 
</body>
</html>