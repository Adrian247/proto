<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</Link
                >
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <h1 class="text-white">Proto <span style="color: grey">Documentation</span></h1>
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-1 gap-12 lg:gap-12">
                    <div class="scale-200 p-6 bg-dark dark:bg-gray-900/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none  focus:outline focus:outline-2 focus:outline-red-500">


                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-gray-400">Plantilla de Proyectos <span class="text-gray-600">Versión 1.0.0</span></h2>
                        <v-divider></v-divider>
                        <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                            Paquetes incluidos en esta plantilla son los siguientes
                        </p>
                        <p style="color: grey">
                            Laravel 10
                            | Php 8.1
                            | Sail
                            | Sanctum
                            | Vue 3
                            | Vuetify
                            | QA (Code Sniffer, Php Cs Fixer, Mess Detector, Php Stan, Psalm)
                            | Pest
                        </p>
                        <br>
                        <h5 class="text-gray-400">Instalación</h5>
                        <br>
                        <div class="text-gray-500">
                            <v-chip>vendor/bin/sail artisan command:start-project</v-chip>
                        </div>
                        <br>
                        <h5 class="text-gray-400">Comandos</h5>
                        <div class="text-gray-500">
                            <p>Sail: vendor/bin/sail up</p>
                            <p>Npm: vendor/bin/sail npm run dev</p>
                            <p>Composer: vendor/bin/sail composer install</p>
                        </div>
                        <br>
                        <h5 class="text-gray-400">Ejemplos</h5>
                        <div class="text-gray-500 ml-2">
                            <strong class="text-green">Api</strong>
                            <a href="https://documenter.getpostman.com/view/17285993/2s93RRxtsU" class="text-cyan-darken-1" target="_blank">  (ver documentación) </a>
                            <div class="ml-2">
                                <p>localhost/api/session/user</p>
                                <p>localhost/api/session/login</p>
                                <p>localhost/api/session/logout</p>
                                <p>localhost/api/session/user</p>
                            </div>
                            <strong class="text-green">Vue 3</strong>
                            <p class="ml-2">localhost/user (se requiere iniciar sesión)</p>
                            <strong class="text-green">Pest</strong>
                            <p class="ml-2">tests/Feature/Api/V1/ApiSessionTest.php</p>
                            <strong class="text-green">QA</strong>
                            <p class="ml-2">app/Http/Controllers/Api/V1/User/UserApiController.php</p>
                        </div>
                        <br>
                        <h5 class="text-gray-400">Dependencias</h5>
                        <div class="text-green-600">
                            <ul style="color: grey">
                                <li>Docker</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
