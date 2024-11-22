# PROYECTO CONTABILIDAD
## insalacion de laravel
``
composer install
``
``
## insalacion de Xampp y mysql
``
tener instalado y crear la base de datos db_contable
``
``
//configurar las rutas para la conexion con la base de datos
configurar .env
``
``
// configurar las migraciones de las tablas a la DB ejecutar en la consola:
php artisan migrate:refresh --seed 

//puede ejecutar el comando 

php artisan serve

//puede ver la ejecucion del proyecto de formal local

``
### Configurar migracion de las tablas a la DB
````
``
### PUBLICAR STORAGE LINK PARA ARCHIVOS LA CARPETA DONDE SE ALMACENARA
````
/borrar el acceso directo que hay en public y volver a publicar 

php artisan storage:link

````
### Verificar el archivo .env
````
/si no se tiene el archivo .env crear y pegar el siguiente codigo

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:XQsQLBG8nXLsx7Ea6MeQPvMjInP0+8rhlKuTU5d2Vqs=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_contable
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}" 

````
### Solucion al error de  APP_KEY vacio
````
/En caso de tener el APP_KEY=    vacio ejecutar el siguiten comado
php artisan key:generate 
````
### Verificar Forms & HTML 
````
/Instalar  la version es opcional 5.8
composer require laravelcollective/html
composer require laravelcollective/html 5.8
````

### Solucion al error de  base de datos
````
/Ir Mysql y crear la base de datos con el nombre ==> db_contable
````
### otros comandos utiles
````
php artisan migrate:refresh                 / migra y refresca las tablas
php artisan migrate:refresh --seed          / migra las tablas y inserta los datos
php artisan make:model Nombre -mcr          / crear modelo + controlador + migracion
php artisan make:controller NombreController --resource         / crea el controlador mas sus metodos
php artisan make:model Nombre                                   / crea solo el modelo
````
### subir datos a bitbucket
````
git add .
git commit -m "mensaje"
git push origin master
````
### Solucion a filemanager
````
reemplazar
vendor/unisharp/laravel-filemanager/src/Controllers/UploadController.php
linea 46
$response = count($error_bag) > 0 ? $error_bag : array(parent::$success_response);
````
