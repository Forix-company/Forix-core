<?php

namespace App\Listeners;

use App\Events\InstallComposerEvent;

class InstallComposerListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\InstallComposerEvent  $event
     * @return void
     */
    public function handle(InstallComposerEvent $event)
    {
    // Crear la base de datos si no existe
    exec('php artisan db:create');
    exec('php artisan migrate');
    exec('php artisan db:seed');
    // Habilitar el módulo
    exec('php artisan module:enable');

    // Ejecutar migraciones, semillas y generar llave del env

    exec('php artisan module:seed');
    exec('php artisan key:generate');

    // Ejecutar el storage de los archivos
    exec('php artisan storage:link');
    }
}
