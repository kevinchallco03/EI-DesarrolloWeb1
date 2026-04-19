<?php
// Solo iniciar sesión si no existe una activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'librerias/PHPMailer/src/Exception.php';
require 'librerias/PHPMailer/src/PHPMailer.php';
require 'librerias/PHPMailer/src/SMTP.php';

// Conexión a la base de datos
function conexion($host, $bd, $user, $pass){
    try {
        $db = new PDO("mysql:host=$host;dbname=$bd;charset=utf8mb4", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
       echo "<h2 class='alert alert-danger' style='color:red; text-align:center'>Error de conexión: ". $e->getMessage() ."</h2>";
       exit;
    } 
}

// Registrar usuario
function registrarUsuario($bd, $tabla, $datos, $image){
    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $email = $datos['email'];
    $contrasena = password_hash($datos['contrasena'], PASSWORD_DEFAULT);
    $perfil = 1;

    $sql = "INSERT INTO $tabla (nombre, apellido, email, password, perfil, image) 
            VALUES (:nombre, :apellido, :email, :contrasena, :perfil, :image)";

    $query = $bd->prepare($sql);
    $query->bindValue(':nombre', $nombre);
    $query->bindValue(':apellido', $apellido);
    $query->bindValue(':email', $email);
    $query->bindValue(':contrasena', $contrasena);
    $query->bindValue(':perfil', $perfil);
    $query->bindValue(':image', $image);

    $query->execute();
    header('location: login.php');
    exit;
}

// Validar registro
function validarRegistroUsuario($datos){
    $errores = [];
    $nombre = trim($datos['nombre']);
    $apellido = trim($datos['apellido']);
    $email = trim($datos['email']);
    $contrasena = trim($datos['contrasena']);
    $confirmacion = trim($datos['confirmacion']);

    if (empty($nombre)) $errores['nombre'] = 'El campo nombre no puede estar vacío';
    if (empty($apellido)) $errores['apellido'] = 'El campo apellido no puede estar vacío';
    if (empty($contrasena)) $errores['contrasena'] = 'El campo password no puede estar vacío';
    if (empty($confirmacion)) $errores['confirmacion'] = 'El campo confirmación del password no puede estar vacío';
    if ($contrasena !== $confirmacion) $errores['contrasena'] = 'Las contraseñas deben ser iguales';

    return $errores;
}

    function  buscarPorEmail($bd, $tabla, $email ){
      $sql = "select * from $tabla where email = :email"; 
        $query = $bd->prepare($sql);
        $query->bindValue(':email',$email);
        $query->execute();
           $usuario = $query->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    }

// Validar login
function validarIniciar($datos){
    $errores = [];
    if(empty($datos['email'])) $errores['email'] = "Correo no puede estar vacío";
    if(empty($datos['contrasena'])) $errores['contrasena'] = "El password no puede estar vacío";
    return $errores;
}

// Setear sesión de usuario
function seteoUsuario($usuario){
    $_SESSION['nombre'] = $usuario['nombre'];
    $_SESSION['apellido'] = $usuario['apellido'];
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['perfil'] = $usuario['perfil'];
    $_SESSION['image'] = $usuario['image'];
}

// Setear cookie
function seteoCookies($email){
    setcookie('email', $email, time() + 3600, "/");
}

// Procesar imagen subida
function armarImagen($archivo){
    if(isset($archivo['imagen']) && $archivo['imagen']['error'] === 0){
        $nombreOriginal = $archivo['imagen']['name'];
        $ext = pathinfo($nombreOriginal, PATHINFO_EXTENSION);
        $archivoOrigen = $archivo['imagen']['tmp_name'];
        $nombreArchivo = uniqid('image-') . '.' . $ext;
        $ruta = __DIR__ . '/../img/'; 
        move_uploaded_file($archivoOrigen, $ruta . $nombreArchivo);
        return $nombreArchivo;
    }
    return null; 
}

//Registrar Postre
function registrarPlato($bd,$tabla,$datos,$imagen){
    $name = $datos['name'];
    $descripcion= $datos['descripcion'];
    $price= $datos['price'];
    $discount = $datos['discount'];

    $image = $imagen;    

    $sql ="insert into $tabla (name, descripcion, price, discount, image) 
    values (:name, :descripcion, :price, :discount, :image)";

    $query = $bd-> prepare($sql);
    $query -> bindValue (':name' ,$name );
    $query -> bindValue (':descripcion' ,$descripcion );
    $query -> bindValue (':price' ,$price );
    $query -> bindValue (':discount' ,$discount );
    $query -> bindValue (':image' ,$image );

    $query->execute();
    header('location:index.php');

}
// buscar usuario
function buscarUsuario($bd, $tabla, $id){
    $sql = "SELECT * FROM $tabla WHERE id = :id";
    $query = $bd->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $usuario = $query->fetch(PDO::FETCH_ASSOC);
    return $usuario;
}



// Enviar correo
function enviarCorreo($usuario, $mensajePersonal){
$nombreCompleto = $usuario['nombre'].' '.$usuario['apellido'];
$email = $usuario['email'];



    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'life.vida.2003@gmail.com';
        $mail->Password   = 'skwkxzhjabgxbjbz';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('life.vida.2003@gmail.com', 'Paradise Cake');
        $mail->addAddress($email, $nombreCompleto);
        $mail->isHTML(true);
        $mail->Subject = 'Paradise Cake: Postres con amor';
        $mail->Body = '
        <html>
          <body>
            <h1>Paradise Cake</h1>
            <p>'.nl2br(htmlspecialchars($mensajePersonal)).'</p>
         </body>
         </html>';

        $mail->send();
    } catch (Exception $e) {
        echo "Error al enviar correo: {$mail->ErrorInfo}";
    }
}

?>
