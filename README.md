# Levantar el proyecto en local

A continuación se describen pasos para ejecutar el proyecto localmente.

Prerequisitos

Git
PHP 8.1+ (si no usas Docker)
Composer
Docker & Docker Compose (para la opción Sail)
Preparar el repositorio
Clona el repositorio (si aún no lo has hecho) y entra en la carpeta del proyecto:


```bash
git@github.com:ArielEzequielPerez/api.git
```
## Antes de copiar .env
- Modificar la varaible de entorno para la base de datos(Se puede usar cualquiera pero se debe modificar .env.example)

### Con MySQL
- Si quqeres usar mysql podrias solo descomentar estas estas variables:

- DB_CONNECTION
- DB_HOST
- DB_PORT
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD

### Con sqlite

Si usas SQLite, en .env establece:
DB_CONNECTION=sqlite
DB_DATABASE=/full/path/to/laravel-crud-api/database/database.sqlite

```bash
cp .env.example .env
```

## Levantar los contenedores (en entorno local):

```bash
./vendor/bin/sail up -d
```

Parar y remover contenedores:

./vendor/bin/sail down

## Sin Docker (entorno local PHP + Composer)

Instala dependencias PHP:
```bash
composer install
```

Asegúrate de tener el DB_ configurado en .env. Para SQLite, ver sección anterior.

- Ejecuta migraciones:
```bash
php artisan migrate --seed
```

- Levanta el servidor de desarrollo:

```bash
php artisan serve --host=127.0.0.1 --port=8000
```


## Uso de la API


Listar estudiantes: GET /api/students
Ver estudiante: GET /api/students/{id}
Crear estudiante: POST /api/students
Actualizar: PUT /api/students
Eliminar: PUT /api/students/{id}

