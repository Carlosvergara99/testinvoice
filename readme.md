
<p align="center"><img src="https://cms-assets.tutsplus.com/uploads/users/769/posts/25334/preview_image/get-started-with-laravel-6-400x277.png" width="100"></p>



## Pre-requisitos :pencil:

- PHP : ≥7.2.
- [Composer](https://getcomposer.org/download/).
- [Git](https://git-scm.com/).
  
## Instalación :clipboard:

1. Abrir  la consola de comandos de Git (Windows) o la Terminal en sistemas basados en Unix (Mac o Linux) y posicionare en el directorio raíz.
2. Después Ejecutar el siguiente comando:  
```
git clone https://github.com/Carlosvergara99/testbrm.git
```
.
3. Luego debe ingresar a la carpeta del proyecto y ejecutar ejecuta el comando:
```
composer install
```
4. El siguiente paso es copiar el contenido del archivo **.env.example** en un nuevo archivo con el nombre **.env** , para eso debemos situarnos dentro del proyecto y ejecutar el siguiente comando:
 
```
cp .env.example .env

```
5. Generar APP_KEY, Para generar la **APP_KEY** del proyecto ejecuta el siguiente comando: 
```
php artisan key:generate

```

6. Crear una base de datos .
7. [Configurar la base de datos](https://richos.gitbooks.io/laravel-5/content/capitulos/chapter3.html)
8. Ejecutar las migraciones con el siguiente comando:

```
php artisan migrate

```

9. Para ejecutar la aplicación se recomienda abrir una nueva terminal,situarse dentro del proyecto y ejecutar el siguiente comando:
```
php artisan db:seed ,php artisan db:seed --class=ProductsTableSeeder ,php artisan serve


```
10.Credenciales
...
Email:admin@hotmail.com
Contraseña:password
## Autor

Carlos Vergara
