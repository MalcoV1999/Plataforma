<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Requisitos Previos
- PHP ^8.1
- Laravel ^10.0
- Postgres ^16.4

## Instalación y Configuración

1. *Clonar el Repositorio:*
   ```bash
    https://github.com/MalcoV1999/Plataforma.git
   ``` 
2. *Instalar Dependencias de Composer:*
    ```bash
     composer install
    ```
3. *Configurar el Archivo de Entorno:*
   - Copiar .env.example a .env
     ```bash
      cp .env.example .env
     ```
   - Editar .env con las configuraciones adecuadas

4. *Generar Clave de Aplicación:*
  ``` bash
   php artisan key:generate
  ```  
## Información Adicional
5. *Migraciones y Seeders:*
  - Ejecutar migraciones:
   ``` bash
    php artisan migrate
   ```  
## Levantar servidor de laravel
  - Ejecute: 
   ```bash 
    php artisan serve
   ```