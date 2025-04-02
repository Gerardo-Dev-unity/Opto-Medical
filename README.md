<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <strong>Sistema de Agenda Médica</strong> con Laravel 11 + Filament<br>
    Gestión de citas y bloqueos de disponibilidad para clínicas u ópticas.
</p>

---

## 📋 Acerca del proyecto

Este sistema permite a los pacientes agendar citas disponibles, mientras que el administrador puede gestionar citas, bloquear días o rangos horarios específicos, y visualizar el resumen diario o semanal de las actividades.

---

## 🚀 Características principales

- 📆 Agenda de citas con horarios dinámicos.
- 🛑 Bloqueo de días completos o por rangos de horas.
- 📥 Formulario público para agendar con validación automática.
- 📊 Panel de administración con Filament.
- ⏱ Duración de cita predeterminada: 30 minutos.

---

## 🧰 Tecnologías utilizadas

- Laravel 11
- Filament Admin
- MySQL
- PHP 8.2+
- Blade (Frontend)
- Git + GitHub

---

## 🛠 Instalación local

```bash
git clone https://github.com/TU_USUARIO/laravel-agenda.git
cd laravel-agenda
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Accede al sistema en: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🔐 Acceso al panel de administración

1. Crea un usuario admin:

```bash
php artisan make:filament-user
```

2. Entra al panel:

[http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin)

---

## 📸 Capturas (opcional)

> Aquí puedes añadir capturas del dashboard, resumen de citas o formulario público de agendamiento.

---

## ✍ Créditos

Proyecto creado por **Gerardo García**  
Desarrollador con experiencia en Unity, Unreal Engine y Laravel.

---

## 📜 Licencia

Este proyecto es de uso interno. Contacta al autor para licenciamiento comercial o colaboraciones.

---

## ✅ ¿Qué sigue?

1. Guarda este contenido como `README.md` en la raíz del proyecto.
2. Realiza tu commit y súbelo a GitHub:

```bash
git add README.md
git commit -m "Agregado README estilo Laravel"
git push
```
