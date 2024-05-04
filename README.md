
# Realizacion del CRUD en Laravel 
### Create Read Update Delete

- Para realizar el crud en este proyect, primero hemos creado el proyecto de laravel a atraves de la consola.
- Despues, se ha configurado una base de datos con mysql a traves de docker
- Se ha instalado Breeze, como este incluye TailwindCSS no es necesario instalar posteriormente este framework
- se ha actualizado el proyecto con composer
- Se incorpora el CSS con la directiva @vite
- Con los pasos anteriores tendriamos una base para empezar el CRUD

## Configuracion de Layout
Se ha configurado un layout usando blade. Este esta en la carpeta Resources/views/Components/layouts, siendo layout.blade quien es la plantilla, y completado por un header, un nav y un footer.

### Componentes de Layout
Se han usado componentes de dasyUI como botones, tablas, footer... para maquetar y dar forma a la web, ademñas de usar TailwindCSS. Tambien se ha usado SweetAlert2 para lanzar confirmaciones en borrar alumnos de la base de datos. Para que estos funcionen se ha necesitado Vite, el cual nos permite compilar para ver los resultados al momento.

## Configuración de bases de datos y CRUD

Como se ha comentado anteriormente, la base de datos se ha usado contenedores de docker de MySql y PHPMyAdmin, creando las correspondientes tablas, la de usuarios propia de Laravel y posteriormente Alumnos, para la tabla de usuarios se ha usado la migracion, asi Laravel ha creado las tablas segun sus necesidades.

### Tabla Alumnos
Para crear la tabla de alumnos, se ha usdo el comando:
<code>
php artisan make:migrations alumnos --create=alumnos
</code>

y con esto hemos obtenido un archivo donde ahi configuramos las columnas que quiero tener en la base de datos alumnos, en este caso a sido nombre, dni, edad y email. Despues con el comando siguiente creamos las tablas
<code>
php artisan migrate
</code>
si queremos actualizar, borrando lo anterior, se usa el comando
<code>
php artisan migrate:fresh
</code>

Con las tablas en la base de datos, creamos los modelos con
<code>php artisan make:model Alumno --all </code> y configuramos en ella lo necessario <code>$fillable=["nombre","dni", "email","edad"]</code>.
Con la base de datos y el modelo, creamos alumnos ficticios con la factorya, para poder tener alumnos para las pruebas.

Para ver los alumnos en una tabla, creamos un archivo .blade.php donde introduciremos los datos, despues en el controlador AlumnoController en la funcion index configuramos que nos devuelva una vista a la web que hemos creado con el compactado de todos los datos de la base de datos. Creamos una tabla y nos ayudamos de <code>@foreach</code> para iniciar un foreach con la informacion de los alumnos. Tambien añadimos las opciones de modificar y borrar, para que nos aparezcan por cada alumno que tenemos. Las opciones de editar son un enlace a la ruta alumnos.edit y para borrar debe ser un formulario a la ruta alumnos.destroy.Tambien añadimos encima de la tabla un boton para crear alumnos, para crear solo necesitamos una ruta de enlace a alumnos.create Para ver las rutas que hay que usar para ver, crear, editar y eliminar usuarios lo mejor es comprobar las rutas con el comando <code>php artisan route:list --path="alumno"</code> 

Para que los anteriores enlaces correspondientes funcionen correctamente, hay que gestionar esto en el controlador de alumno y crear las correspondientes paginas.

### Crear alumnos
Para crear alumnos se crea un formulario donde se pidan los datos necesarios para la tabla (nombre, dni, email y edad) y posteriormente tambien se realiza una validacion de estos datos, esto se hace en app/Http/Requests/StoreAlumnoRequest.php si cumple estas validaciones, el controlador alumnos en store ejecuta la funcion que guarda el alumno en la tabla, además añadimos una variable en session de tipo flash para comunicar que el alumno ha sido añadido.

### Modificar alumnos

Para modificar alumnos, como anteriormente, creamos la pagina, que puede ser muy igual a la de crear alumnos, pero en esta obtenemos los datos de los alumnos y los mostramos en el formulario. Además usamos la variable errors para mostrar los posibles errores de no cumplimiento de las validaciones. Para añadir unas validaciones en la edicion, que debe ser diferente a la de crear, lo hacemos desde UpdateAlumnoRequest que esta en App/Http/Requests. Que pueden ser las mismas validaciones que para crear excepto que el mail no debe ser unico.

### Eliminar alumnos

Para eliminar alumnos se hacre a traves de un formulario a la ruta alumnos.destroy, ademas hay que añadir <code>@method('DELETE')</code> (ademas del token <code>@csrf</code>)  para que funcione. Como extra se ha añadido una ventana para confirmar que realmente se desa borrar el usuario, a través de JavaScript y una funcion que nos laza una ventana preguntando por la accion.



Con esto ya tendriamos un CRUD en la web con la base de datos
