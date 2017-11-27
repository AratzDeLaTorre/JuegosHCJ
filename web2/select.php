<html>
<title>Tienda de Videojuegos</title>
<head>
<link rel="stylesheet" href="css\barra.css">
</head>
<body>
<div id="header">
</div>
<ul>
  <li><a href="index.html">Inicio</a></li>
  <li class="dropdown">
    <a class="dropbtn">Tienda</a>
    <div class="dropdown-content">
      <a href="nintendo.html">Nintendo</a>
      <a href="sony.html">Sony</a>
      <a href="xbox.html">Microsoft</a>
    </div>
    <li> <a href="insert.php">Insertar Juego</a></li>
  </li>
    <li> <a href="select.php">Futuros lanzamientos</a></li>
  </li>
</ul>
<div>
	<br></br>
Próximos lanzamientos<br></br>

<?php
$username = aratz;
$password = aratz;
$servername = localhost;
$database = juegos;
$table = lanzamientos;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Conexión con la base de datos $database del servidor $servername reali.<br/>";
    $sql = "SELECT * FROM ".$table."";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result_array = $stmt->fetchAll();
    print "<table border='1px solid grey'>";
    print "<tr>";
    print "<th>";print "Juego";print "</th>";
    print "<th>";print "Consola";print "</th>";
    print "</tr>";
    foreach ( $result_array as $linea ) {
        print "<tr>";
        print "<td>";print $linea['Nombre'];print "</td>";
        print "<td>";print $linea['Consola'];print "</td>";
        print "</tr>";
    }
    print "</table>";
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>
<div id="pie">
</div>
</body>
</html>
