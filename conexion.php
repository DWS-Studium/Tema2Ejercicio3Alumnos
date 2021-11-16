<?php
//Datos de conexion
$servidor = 'localhost';
$usuario = 'root';
$clave = 'root';
$baseDeDatos = 'dws';
$conexion = mysqli_connect($servidor,$usuario,$clave,$baseDeDatos);
 
if(!$conexion) {
    echo "La conexión con la base de datos ha fallado";
} else {
    $id = (int)$_POST["id"];
    $nombre = $_POST["nombre"];
 
    $where = "";
    if ($id) {
        $where = "WHERE idAlumno=" . $id;
    }
    if(!empty($nombre)){
        if(!empty($where)){
            $where .= " AND nombre LIKE '%" . $nombre . "%'";
        }else{
            $where = "WHERE nombre LIKE '%" . $nombre . "%'";
        }
    }
        
    $consulta = "SELECT * FROM alumnos " . $where;
    $resultado = mysqli_query($conexion, $consulta);
 
    echo '<table border="1"><thead><tr><td>Id</td><td>Nombre</td><td>nota</td></tr>';
    echo "<tbody>";
    while($fila = mysqli_fetch_array($resultado)) {
        echo "<tr><td>" . $fila["idAlumno"]."</td><td>"; 
        echo $fila["nombre"] . "</td><td>";
        echo $fila["nota"] . "</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
 
?>