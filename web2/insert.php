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

<body>

	<h3>Insertar juego</h3>


<?php
if ( !isset($_POST['juego']) ) {
?>
        
    <form action="<?php $_SERVER['PHP_SELF'] ?>"  method="post">
        Juego: <input type="text" name="juego" size="25" /><br/>
        Consola: <input type="text" name="consola" size="25" /><br/>
        <input type="submit" name="env" value="ENVIAR"/>
    </form>	  
    
<?php    
}
else {
    $username = aratz;
    $password = aratz;
    $servername = localhost;
    $database = juegos;
    $table = lanzamientos; 
try {
    //Conexión con una base de datos del servidor
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión con la base de datos '".$database."' del servidor '".$servername."' realizada.<br/>";
    
    echo "Arma: ".$_POST['juego']."<br/>";
    echo "Daño: ".$_POST['consola']."<br/>";   
    
    $sql = "INSERT INTO ".$table." (Nombre, Consola) VALUES ('".$_POST['juego']."','".$_POST['consola']."')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "Juego añadida correctamente.<br/>";
    }
catch(PDOException $e) {
    if ($e->getCode() == "23000")
        echo "Imposible insertar el registro porque esa clave ya existe."."<br/>";
    else
        echo $e->getMessage();
}
}    
 //print "<br/><br/><br/>sql: ".$sql;
?>


<div id="pie">
</div>
</body>
</html>
