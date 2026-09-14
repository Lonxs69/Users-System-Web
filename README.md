# Users-System-Web

Sistema web de control de usuarios con registro, inicio de sesión y dashboard,
construido con HTML, CSS, JavaScript y PHP sobre MySQL (PHPMyAdmin).

## Características

- Registro de usuarios con nombre, correo y contraseña.
- Inicio de sesión con validación en el servidor y respuesta en JSON.
- Contraseñas almacenadas con hash, nunca en texto plano.
- Sesiones PHP para mantener al usuario autenticado.
- Dashboard de bienvenida tras iniciar sesión.
- Formulario animado con panel deslizante entre "Crear cuenta" e "Iniciar sesión".

## Estructura del proyecto

| Archivo | Descripción |
| --- | --- |
| `index.html` | Pantalla principal con los formularios de registro e inicio de sesión. |
| `style.css` | Estilos y animación del panel deslizante. |
| `script.js` | Alterna entre los formularios de registro e inicio de sesión. |
| `registro.php` | Recibe el formulario de registro, valida y guarda el usuario. |
| `login.php` | Recibe el formulario de inicio de sesión y valida las credenciales. |
| `Conexion.php` | Conexión PDO a la base de datos MySQL. |
| `dashboard.html` | Página de bienvenida una vez autenticado. |
| `BD.txt` | Script SQL para crear la tabla `usuarios`. |

## Requisitos

- PHP 7.4 o superior con la extensión `pdo_mysql`.
- MySQL o MariaDB (por ejemplo, XAMPP, WAMP o Laragon).
- Un navegador moderno.

## Instalación

1. Clona el repositorio dentro de la carpeta pública de tu servidor
   (`htdocs` en XAMPP, `www` en WAMP o Laragon):

   ```bash
   git clone https://github.com/Lonxs69/Users-System-Web.git
   ```

2. Crea la base de datos en PHPMyAdmin y ejecuta el script de `BD.txt`
   para crear la tabla `usuarios`.

3. Abre `Conexion.php` y ajusta el nombre de la base de datos, el usuario
   y la contraseña según tu entorno local.

4. Inicia Apache y MySQL, y abre en el navegador:

   ```
   http://localhost/Users-System-Web/index.html
   ```

## Uso

1. En la pantalla principal, pulsa **Registrarse** para crear una cuenta nueva.
2. Vuelve a **Iniciar sesión** e ingresa el correo y la contraseña registrados.
3. Si las credenciales son correctas, serás redirigido al dashboard.

## Notas

- Los endpoints `login.php` y `registro.php` responden en formato JSON, por lo
  que pueden reutilizarse desde cualquier frontend.
- La cabecera `Access-Control-Allow-Origin: *` está activa solo para pruebas
  locales. Elimínala o restríngela antes de publicar el proyecto.

## Licencia

Proyecto de uso educativo. Puedes usarlo y modificarlo libremente citando el
repositorio original.
