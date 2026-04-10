<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 🚗 Concesionario de Automóviles — Laravel + PostgreSQL

Sistema de gestión de un concesionario de automóviles desarrollado con Laravel 12 y PostgreSQL.

---

## 📋 Requisitos

- PHP >= 8.2
- Composer
- Node.js >= 18
- PostgreSQL

---

## ⚙️ Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/concesionario.git
cd concesionario
```

### 2. Instalar dependencias

```bash
composer install
npm install
npm run build
```

### 3. Configurar el archivo de entorno

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configurar la base de datos en `.env`

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=concesionario
DB_USERNAME=postgres
DB_PASSWORD=tu_password
```

### 5. Crear la base de datos en PostgreSQL

```sql
CREATE DATABASE concesionario;
```

### 6. Ejecutar migraciones y seeders

```bash
php artisan migrate:fresh --seed
```

### 7. Iniciar el servidor

```bash
php artisan serve
```

Abre tu navegador en `http://localhost:8000`

---

## 👤 Usuario de prueba

| Campo      | Valor                      |
|------------|----------------------------|
| Email      | admin@concesionario.com    |
| Contraseña | password                   |

---

## ✅ Funcionalidades

### Autenticación
- Registro de usuarios con nombre, correo y contraseña
- Login con correo y contraseña
- Solo usuarios autenticados pueden gestionar carros

### Gestión de Carros (CRUD)
- Listado de todos los carros registrados
- Agregar nuevos carros
- Editar carros existentes
- Ver detalle de un carro
- Eliminar carros

### Cada carro tiene los siguientes atributos
- Marca
- Modelo
- Año
- Color
- Precio
- Kilometraje

### Bonus
- 🔍 Búsqueda y filtrado por marca, modelo, color, año y precio máximo
- 📊 Panel de administración con estadísticas (total de carros, precio promedio, precio máximo, precio mínimo, carros por marca y por año)

---

## 🏗️ Estructura del proyecto

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── CarController.php
│   │   └── DashboardController.php
│   ├── Middleware/
│   │   └── EnsureCarManager.php
│   └── Requests/
│       ├── StoreCarRequest.php
│       └── UpdateCarRequest.php
└── Models/
    └── Car.php

database/
├── migrations/
│   └── xxxx_create_cars_table.php
└── seeders/
    └── CarSeeder.php

resources/views/
├── cars/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
└── dashboard.blade.php
```

---

## 🛠️ Decisiones técnicas

- **Laravel Breeze** para el sistema de autenticación
- **Form Requests** para separación de responsabilidades en las validaciones (`StoreCarRequest` como base, `UpdateCarRequest` hereda de él)
- **Middleware personalizado** `EnsureCarManager` para proteger las rutas de gestión de carros
- **Route Model Binding** para la resolución automática de modelos en el controlador
- **`ilike`** en las búsquedas para compatibilidad con PostgreSQL sin distinción de mayúsculas/minúsculas

---

## 📦 Tecnologías utilizadas

- Laravel 12
- PostgreSQL
- Laravel Breeze
- Tailwind CSS
- Blade Templates