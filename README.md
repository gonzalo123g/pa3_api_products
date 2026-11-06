 pa3_api_products

 iniciar en terminal de visual studio code (xampp) -> php S- localhost:8000 -t public

 acceder desde el navegador a localhost/pa3_api_products

 3.- Cargar la Base de Datos incluida con el nombre bdisildemo.sql. NOTA: Si se tiene otra bd con ese nombre se va a eliminar.

CREATE TABLE usuario (
id int NOT NULL,
nombre varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
contraseña varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
fecha datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
correo varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

4.- Se accede directamente al index.html y desde ahi se puede realizar el listado, registro, busqueda por ID, y eliminación de usuarios

5.- Ejemplo de usuario: nombre ->gonzalo, contraseña -> 12345 , correo -> gonzalo@gonzalo.com