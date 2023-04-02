<?php
// Conexión a la base de datos
$conectar = mysqli_connect("localhost", "usuario", "clinica");

// Verifica la conexión
if (!$conectar) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtiene los datos del formulario
$id= $_POST['id'];
$nombre = $_POST['nombre']; 
$apellidos = $_POST['apellido'];
$documento = $_POST['documento']; 
$celular = $_POST['celular']; 
$fecha = $_POST['fecha'];
$idhorario = $_POST['horario']; 
$idprofesional = $_POST['profesional']; 

// Actualiza los datos del usuario
$sql = "UPDATE paciente SET nombre='$nombre',nombre='$nombre', apellido='$apellidos',
documento='$documento', celular='$celular' WHERE id='$id'";
$result = mysqli_query($conectar, $sql);

// Verifica si la consulta SQL fue exitosa
if ($result) {
    // Actualiza el grupo asociado al usuario
    $sql = "UPDATE citas SET Id_horario='$idhorario', Id_personal='$idprofesional', 
     WHERE Id_paciente='$id'";
    $result = mysqli_query($conectar, $sql);

    // Verifica si la consulta SQL fue exitosa
    if ($result) {
        echo "Datos actualizados correctamente.";
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($conectar);
    }
} else {
    echo "Error al actualizar los datos: " . mysqli_error($conectar);
}

// Cierra la conexión a la base de datos
mysqli_close($conectar);
?>
