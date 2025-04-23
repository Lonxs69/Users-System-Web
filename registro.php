<?php
     header('Content-Type: application/json');
     header('Access-Control-Allow-Origin: *'); // Agregado para pruebas
     require_once 'conexion.php';

     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $nombre = trim($_POST['nombre'] ?? '');
         $correo = trim($_POST['correo'] ?? '');
         $contrasena = trim($_POST['contrasena'] ?? '');

         // Validaciones
         if (empty($nombre) || empty($correo) || empty($contrasena)) {
             echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
             exit;
         }

         if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
             echo json_encode(['success' => false, 'message' => 'El correo electrónico no es válido.']);
             exit;
         }

         // Verificar si el correo ya existe
         try {
             $stmt = $pdo->prepare('SELECT COUNT(*) FROM usuarios WHERE correo = ?');
             $stmt->execute([$correo]);
             if ($stmt->fetchColumn() > 0) {
                 echo json_encode(['success' => false, 'message' => 'El correo ya está registrado.']);
                 exit;
             }

             // Encriptar contraseña
             $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

             // Insertar usuario
             $stmt = $pdo->prepare('INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)');
             $stmt->execute([$nombre, $correo, $contrasenaHash]);

             echo json_encode(['success' => true, 'message' => 'Registro exitoso. Por favor, inicia sesión.']);
             exit;

         } catch (PDOException $e) {
             echo json_encode(['success' => false, 'message' => 'Error al registrar: ' . $e->getMessage()]);
             exit;
         }
     }

     echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
     ?>