Verificar el tener instalado los programas:
1- Composer-Setup
2- node-v10.0.0
3- xampp con la versión de php 7.1.3 (la version del php viene dentro del xampp)

npm install
Paso 1:
En la carpeta storage crear la carpeta Framework.
Dentro de Framework crear las carpetas cache, sessons y view.
Y dentro de la carpeta cache crear una carpeta llamada data.

Paso 2: 
Dentro de la carpeta public, crear una carpeta llamada storage.
Y dentro de esta storage colocar el archivo listadoPagina.xlsx

Paso 3:
En la terminal (control+Ñ) hacer: composer require laravel/passport
Para descargar los passport y crear la carpeta vendor.

Paso 4:
Al archivo .env.example cambiarle el nombre por .env
Y en la línea DB_DATABASE= colocarle el nombre de la
base de datos llamada mlv2mlre_db
A la linea DB_PASSWORD=root dejarla igualada a nada,
Así DB_PASSWORD= porque al instalar xampp la contraseña es vacía
En phpmyadmin crear una base de datos llamada mlv2mlre_db
En la terminal hacer php artisan migrate y luego php artisan passport:install

Paso 5:
En la terminal hacer:
php artisan make:auth
php artisan cache:clear
php artisan view:clear
php artisan route:cache
php artisan config:cache
php artisan config:clear
php artisan cache:clear

Paso 6:
En la carpeta xampp buscar el archivo de configuración php.ini
Para cambiar el tamaño del archivo a importar del phpmyadmin.
Buscar upload_max_filesize= y post_max_size= y darles el valor deseado.

Paso 7:
En phpmyadmin, en mlv2mlre_db, borrarle todas las tablas e importarle el archivo mlv2mlre_db.sql (DUMB)

Paso 8:
Ir a la carpeta llamada app y dentro del archivo User.php, agregar la linea
use Laravel\Passport\HasApiTokens;
debajo del namespace App;

Paso 9:
Ir a la carpeta config, abrir app.php y en los 'providers' => [
agregar al último Laravel\Passport\PassportServiceProvider::class,
No olvidar poner la coma (,)

Paso 10:
En la terminal hacer npm install (teniendo node v10 instalado sin versiones superiores)

<!-- #Post Migraciones
Ejecutar en la base de datos estos alters para modificar la relacion con la tabla origen previo llenado de datos

- ALTER TABLE `productos` CHANGE `origen_id` `origen_id` VARCHAR(3) NOT NULL;
- ALTER TABLE `productos` ADD  FOREIGN KEY (`origen_id`) REFERENCES `origen`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
- ALTER TABLE `productos` CHANGE `id` `id` INT(11) NOT NULL;
- ALTER TABLE `estados_productos` CHANGE `id` `id` VARCHAR(2) NOT NULL;
- ALTER TABLE `productos` CHANGE `estado_id` `estado_id` VARCHAR(2) NOT NULL;
- ALTER TABLE `productos` ADD  CONSTRAINT `producto_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados_productos`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION; --> no usar migraciones y usar DUMP

#RECORDATORIO
No utilizar php artisan serve
Utilizar el debugger

Version de node necesaria: 10.x (Mirar al realizar npm install)

En storage faltan las carpetas Framework -> cache/data, sessions, views.
Creación de los passport.
Son precisos unos altertables ya documentados en el repositorio.

#Error con la creación de token => Passport error
Eliminacion de vendor y siguientes comandos

php artisan cache:clear

php artisan view:clear

php artisan route:cache

php artisan config:cache

php artisan optimize

#Error ADMIN_RECIPIENT: Retorno de JSON (Undefined variable)

php artisan config:cache
php artisan config:clear
php artisan cache:clear

#Error en oauth_Clients
Modificar id de usuario y asignar id=1 en oauth_clients id. Por algún motivo siempre referencia a id 1 en access tokens.

#Para importar los productos
Crear una carpeta denominada storage en public y guardar el excel hallado en storage/app/public * Solucion I

Crear link simbolico desde public llamado storage hacia storage/app/public/ * Solucion II

#ERROR - Las rutas nuevas no aparecen en la lista
Utilizar php artisan route:cache

#FirebaseKey
FCM_SERVER_KEY=AAAAKe-PGaA:APA91bHDxWBI__-9B7ptgYX8vdarcRFVsmWF3OBGewXu6-OCi1uZjzJW2DkgD7lxfgGhNj49m_Sy1AfCDC5ezQIPnoMvTV-36iRIFAKWHqvmVjq6lVwoxsNhbGpvwiV6ptzjp6QxHL5L

Si no carga la lista de los productos, ir a phpmyadmin.
Entrar en la data base creada que se llama mlv2mlre_db, abrir las tablas.
Ir a vistas, boton estructura en v2_promovista. Editar vista.
Cambiar en el campo "definidor" por root@localhost y luego boton continuar.