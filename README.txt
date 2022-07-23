Victor Manuel Morales Sauz


Posición deseada: Full-stack


Lenguajes/Frameworks


MySql 85%
Php 80%
Javascript 80%
Css 70%
TailwindCss80%
Laravel 90%
Vuejs 70%


Contacto:
Correo: victormmsauz@gmail.com Tel: 411-1440010


Referencias
GitHub https://github.com/vicmms?tab=repositories
Plataforma Saldo HVAC: Un e-commerce en proceso (90%)
https://plataforma.saldohvac.com/


Cálculo de costos de mantenimiento de equipos HVAC
https://hvacopcostla.sarsoftware.com


Registro de asesorías brindadas y bitácora de proyecto (Plataforma Privada)
https://asesorias.sarsoftware.com/


Plataforma con Moodle con cursos para Técnicos HVAC (privada)
https://universidadhvac.sarsoftware.com/


Nivel elegido: Intermedio


Instrucciones de instalación
* Clonar el proyectocon el comando git clone  https://github.com/vicmms/Light-Agency.git  o descargarlo directamente de https://github.com/vicmms/Light-Agency/archive/refs/heads/main.zip
* Una vez descargado, abrir el proyecto y ejecutar el script  “createDatabase.sql” que se encuentra la carpeta “install” en el direcorio_raiz desde algún manejador SQL, en mi caso uso Workbeanch, con esto creamos la Base de datos con algunos registros.
* Agregamos unos registros extra ingresando desde línea de comandos a la carpeta de nuestro proyecto -> install -> scripts y ejecutamos el comando “ php -f fillDatabase.php”, un ejemplo de la ruta a acceder seria algo asi “proyecto/install/script”,  dar enter para ejecutarlo, el estatus de esta operación se quedara registrado en la raiz del proyecto en un archivo “log”.
* Abrimos el archivo en la carpeta de nuestro proyecto -> install -> config.php donde configuraremos las variables necesarias para conectarnos a la base de datos.
* Finalmente brirmos el proyecto desde el navegador, en mi caso uso XAMPP para ejecutar php por lo que para acceder a mi proyecto es con la ruta http://127.0.0.1:8080/Light-Agency/public_html/index.php, pero esto varia de acuerdo con cada caso.




Actividades completadas:


* Creación de las tablas Productos, Categorias y Comentarios con 10 registros c/u
* Cada tabla tiene sus índices, claves primarias y foraneas
* Archivo de configuración con las variables para conexión a base de datos
* Conexion via PDO y script para agregar 10 registros adicionales a cada tabla.
* Pagina Home con listado de las categorias padre y sus subcategorias
* Listado de 10 productos destacados en la vista principal.
* Listado de 10 productos mas vendidos en la vista principal.
* Listado de productos de acuerdo con la categoria seleccionada, si es categoria padre se muestran todos los productos de esa categoria y sus subcategorias.
* Vista de producto con sus comentarios y su informacion general
* Funcionalidad para calcular el pago diferido a meses de cada producto
* Vista de productos ordenados por calificacion
* Archivo Log con informacion de las operaciones realizadas


* Se agregaron ademas 2 tablas extra, una para determinar las categorias y sus subcategorias en donde se almacena cada categoria con su categoria padre y la tabla de ordenes donde se indica el detalle de cada venta y con el que se puede determinar la cantidad de productos vendidos individualmente,