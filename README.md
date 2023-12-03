------------
# Punto de Venta - Tienda Hernandez

## Dependencias
- Se debe tener instalado [XAMPP](https://laragon.org/download/index.html "Laragon") (versión **PHP** **8.1** o superior)  
- Se debe tener instalado [Composer](https://getcomposer.org/download/ "Composer") (versión **2.6.5** o superior)
- Se debe tener configurado composer y asosiciado a la version de php de su servidor web
- Se debe tener instalado [Node.js](https://nodejs.org/en "Composer") (versión **20.10.0 LTS**)


## Instalar de forma Local
1. Clone o descargue el repositorio a una carpeta en Local

1. Abra el repositorio en su editor de código favorito (**Visual Studio Code**)

1. Ejecute el servidor web **Laragon** e inice los módulos de **Apache** y **MySQL**

1. Abra una nueva terminal en su editor 

1. Compruebe de que tiene instalado todas dependencias correctamente, ejecute los siguientes comandos: **(Ambos comandos deberán ejecutarse correctamente - ejecutar en la terminal)**
```bash
php -v
```
```bash
composer -v
```

1. Ahora ejecute los comandos para la configuración del proyecto (**ejecutar en la terminal**):

- Este comando nos va a instalar todas la dependencias de composer
```bash
composer install
```
- En el directorio raíz encontrará el arhivo **.env.example**, dupliquelo, al archivo duplicado cambiar de nombre como **.env**, este archivo se debe modificar según las configuraciones de nuestro proyecto. Ahí se muestran como debería quedar, recuerde que es un ejemplo, ya que los parametros de configuracion depende de su caso.
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_sistema_ventas 
DB_USERNAME=root
DB_PASSWORD=
```
- Ejecutar el comando para crear la Key de seguridad
```bash
php artisan key:generate 
```
- Ingrese al administrador de [PHP MyAdmin](http://localhost/phpmyadmin/) y cree una nueva base de datos, el nombre es opcional, pero por defecto nombrarla **db_sistema_ventas**

- Habilitar la funcion storage para las imagenes
```bash
php artisan storage:link
```
- Correr la migraciones del proyecto
```bash
php artisan migrate
```
- Ejecute los seeders, esto creará un usuario administrador, puede revisar las credenciales en el archivo (**database/seeders/UserSeeder**)
```bash
php artisan db:seed
```
- Ejecute el proyecto
```bash
php artisan serve
```

## Nota
El proyecto esta construido en Laravel 10

Fecha: Noviembre de 2023

Listo ya puede hacer uso del sistema y hacerle las moficcaciones que usted necesite. 
