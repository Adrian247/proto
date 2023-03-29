<h1 align="center">Prototype Project</h1>
<p align="center">Versión 1.0.0</p>

## Plantilla de proyectos

Plantilla de proyecto Laravel con Vue 3, componentes incluidos

- Laravel 10.
- Sails
- Sanctum
- Vue 3
- Vuetify
- Calidad (Php Cs Fixer, Code Sniffer, Mess Detector, Psalm, Php Stan)
- Pest (Pruebas unitarias)

## Instalación

1. Ingrese al directorio del proyecto.
2. Ejecute comando de instalación para composer, se requiere para ejecutar instrucciones de sail.

    `docker run --rm --interactive --tty -v $(pwd):/app composer install`
3. Ejecute de migraciones y seeders.
`./vendor/bin/sail artisan comman:start-project`
4. Instalar componentes
`./vendor/bin/sail npm i`
5. Iniciar sail
`./vendor/bin/sail up`
6. Iniciar servidor
`./vendor/bin/sail npm run dev`

## Configuración de alias

En el home de su usuario, en el archivo .bashrc o .zshrc dependiendo de la terminal que esté utilizando, pegue en la sección de alias las siguientes líneas

`alias sail="./vendor/bin/sail"`

`alias artisan="./vendor/bin/sail artisan"`

Ejecute el comando `. ~/.bashrc` (ejemplo para bashrc) o inicie de nuevo su terminal para cargar los nuevos alias.
Esto le permite abreviar la instruccion de comandos. Por ejemplo, si quisiera listar las rutas solo introduzca el comando  `artisan route:list` 
este será el equivalente a `./vendor/bin/sail artisan route:list` ó si desea iniciar el servicio de sail
solo seria necesario ejecutar el comando `sail up` esto sería el equivalente a `./vendor/bin/sail up"`

## Documentación de Api
https://documenter.getpostman.com/view/17285993/2s93RRxtsU
