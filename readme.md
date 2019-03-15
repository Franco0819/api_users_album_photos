

## Api Albums Permission
La api nos permite manejar los permisos de un usuario para un album determinado.

### Instalación

- Tener clonado laravel v5.7
- Crear nuestra BD que vamos ultilizar.
- En nuestro laravel vamos a configurar nuestro archivo env.
<pre>
	<code> 
		PP_URL=http://localhost.com
		DB_CONNECTION=mysql
		DB_HOST=mysql
		DB_PORT=3306
		DB_DATABASE=nombre de nuesta BD
		DB_USERNAME=root
		DB_PASSWORD=root
	</code>
	</pre>
- Hacer un Composer Install.
- Tenmos que generarle una Key con este comando <code>php artisan key:generate</code>.
- Luego hacer un <code> php artisan migration --seed </code>.

## Tecnologia Utilizadas
- Laravel v5.7.
- Guzzly (utilizado para consumir servicio externo).
- Composer.
- Postman (utilizado para probar las pegadas).

## Endpoints de la Api

### /api/album/{albumID}/users
Este endpoint nos desvuelve todos los usuarios de un determinado album que tengan permisos.

-Url: http://localhost.com/api/album/{albumID}/users <br>
-Method: **Get** <br>
-Parametros: Id del album.

### /api/album/permission/store
Este endpoint nos permite guardar un permiso relacionado a un album y un usuario.

-Url: http://localhost.com/api/album/permission/store <br>
-Method: **Post** <br>
-Parametros: No recibe ningun parametro.

### /api/album/{albumID}/user/{userID}/permission/{permissionID}/destroy
Este endpoint nos permite eliminar un permiso relacionado a un album y un usuario.

-Url: http://localhost.com/api/album/{albumID}/user/{userID}/permission/{permissionID}/destroy <br>
-Method: **Delete** <br>
-Parametros: Recibe 3 parametros que son los Ids de album, usuario y permiso que juntos forman una clave compuesta.

### /api/album/{albumID}/user/{userID}/permission/{permissionID}/update
Este endpoint nos permite actualizar o modificar un permiso relacionado a un album y un usuario.

-Url: http://localhost.com/api/album/{albumID}/user/{userID}/permission/{permissionID}/update <br>
-Method: **Put** <br>
-Parametros: Recibe 3 parametros que son los Ids de album, usuario y permiso que juntos forman una clave compuesta.

### /api/comments/search
Este endpoint nos permite buscar comentarios a traves del name o email del usuario.

-Url: http://localhost.com/api/comments/search?name=alias odio sit&email=Hayden@althea.biz <br>
-Method: **Get** <br>
-Parametros: Los parametros los recibe por GET.

### /api/permissions/show
Este endpoint nos permite mostrar todos los permisos que tenemos para asociar.

-Url: http://localhost.com/api/permissions/show <br>
-Method: **Get** <br>
-Parametros: No recibe ningun parametro.

### /api/permissions/store
Este endpoint nos permite guardar un permiso nuevo.

-Url: http://localhost.com/api/permissions/store <br>
-Method: **Post** <br>
-Parametros: No recibe ningun parametro.

### /api/permissions/{permissionID}/update
Este endpoint nos permite modificar o actualizar un permiso.

-Url: http://localhost.com/api/permissions/{permissionID}/update <br>
-Method: **Put** <br>
-Parametros: Recibe el ID del permiso.

### /api/permissions/{permissionID}/destroy
Este endpoint nos permite eliminar un permiso.

-Url: http://localhost.com/api/permissions/{permissionID}/destroy <br>
-Method: **Delete** <br>
-Parametros: Recibe el ID del permiso.


