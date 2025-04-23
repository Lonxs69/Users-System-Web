<?php
     header('Content-Type: application/json');
     header('Access-Control-Allow-Origin: *'); // Agregado para pruebas
     session_start();
     require_once 'conexion.php';

     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $correo = trim($_POST['correo'] ?? '');
         $contrasena = trim($_POST['contrasena'] ?? '');

         // Validaciones
         if (empty($correo) || empty($contrasena)) {
             echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
             exit;
         }

         try {
             // Buscar usuario por correo
             $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE correo = ?');
             $stmt->execute([$correo]);
             $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

             if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
                 // Credenciales correctas, iniciar sesión
                 $_SESSION['usuario_id'] = $usuario['id'];
                 $_SESSION['nombre'] = $usuario['nombre'];
                 echo json_encode([
                     'success' => true,
                     'message' => 'Inicio de sesión exitoso. ¡Bienvenido, ' . $usuario['nombre'] . '!',
                     'nombre' => $usuario['nombre']
                 ]);
                 exit;
             } else {
                 echo json_encode(['success' => false, 'message' => 'Correo o contraseña incorrectos.']);
                 exit;
             }
         } catch (PDOException $e) {
             echo json_encode(['success' => false, 'message' => 'Error al iniciar sesión: ' . $e->getMessage()]);
             exit;
         }
     }

     echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
     ?>