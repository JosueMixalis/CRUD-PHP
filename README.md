# Proyecto de Administración de Autos

Este proyecto de administración de autos fue desarrollado en PHP y utiliza operaciones CRUD (Crear, Leer, Actualizar, Eliminar) para gestionar la información de los autos en una base de datos. La aplicación permite a los usuarios llevar a cabo las siguientes acciones:

### Funcionalidades

- **Agregar Autos:** Añadir nuevos autos a la base de datos especificando la marca, modelo, año y kilometraje.
- **Ver Autos:** Visualizar la lista de todos los autos almacenados en la base de datos con sus detalles.
- **Editar Autos:** Modificar la información de un auto existente, incluyendo la capacidad para cambiar la marca, modelo, año y kilometraje.
- **Eliminar Autos:** Eliminar autos de la base de datos.

### Tecnologías Utilizadas

- **PHP:** El backend de la aplicación está desarrollado en PHP, un lenguaje de scripting ampliamente utilizado para aplicaciones web.
- **MySQL:** Se utiliza una base de datos MySQL para almacenar la información de los autos.
- **HTML/CSS:** Para el frontend de la aplicación se han utilizado HTML y CSS para el diseño y la estructura de la página web.
- **CRUD:** La aplicación sigue el paradigma CRUD para realizar operaciones en la base de datos.

### Requisitos del Sistema

- Servidor web (por ejemplo, Apache, Nginx)
- PHP 7.x
- MySQL

### Instrucciones de Instalación

1. Clona este repositorio en tu servidor local.
2. Crea una base de datos MySQL llamada `autos`.
3. Importa el archivo `autos.sql` en la base de datos para crear la estructura de la tabla.
4. Configura la conexión a la base de datos en el archivo `pdo.php`.
5. Accede a la aplicación a través de tu navegador web visitando `http://localhost/tu-carpeta-de-proyecto`.

### Capturas de Pantalla

!<img src="images/access.png" alt="Captura de Pantalla 1" width="75%">
!<img src="images/delete_success.png" alt="Captura de Pantalla 1" width="75%">
!<img src="images/edit_error.png" alt="Captura de Pantalla 1" width="75%">
!<img src="images/entry.png" alt="Captura de Pantalla 1" width="75%">
!<img src="images/redireccion.png" alt="Captura de Pantalla 1" width="75%">
!<img src="images/sql_entry.png" alt="Captura de Pantalla 1" width="75%">
!<img src="images/validation.png" alt="Captura de Pantalla 1" width="75%">

