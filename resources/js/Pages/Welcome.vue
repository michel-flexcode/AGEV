<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-blue-500 selection:text-white">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:end-0 p-6 text-end z-10">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="bg-blue-900 hover:bg-blue-950 text-white font-semibold py-2 px-4 rounded focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">Accueil</Link>

            <template v-else>
                <Link :href="route('login')" class="bg-blue-900 hover:bg-blue-950 text-white font-semibold py-2 px-4 rounded focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">Se connecter</Link>

                <Link v-if="canRegister" :href="route('register')" class="ms-4 bg-blue-900 hover:bg-blue-950 text-white font-semibold py-2 px-4 rounded focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">S'inscrire</Link>
            </template>
    </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <img src="../../../storage/images/logo.png" style="width: 30%;" alt="Logo">
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
                    <a href="#" class="scale-100 p-6 mx-auto bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-blue-500">
                        <div class="my-6 max-w-md flex flex-col items-center">

                            <div class="text-justify leading-12">
                                <h2 class="mt-4 text-xl font-semibold text-black dark:text-white">Formulaire - évaluation des cours</h2>

                                <p class="mt-4 text-black dark:text-black text-sm">
                                    Afin d'aider vos professeurs à s'améliorer ou à améliorer leurs supports de cours, nous vous demandons de remplir le formulaire suivant.
                                </p>
                                <p class="mt-4 text-black dark:text-black text-sm">
                                    Celui-ci permettra au corps enseignant de pouvoir connaître les points forts et leurs points d'amélioration dans chacun de leurs cours.
                                </p>
                                <p class="mt-4 text-black dark:text-black text-sm">
                                    Pour se faire, nous vous demanderont de vous connecter à nôtre plateforme afin d'y accéder.
                                </p>
                                <p class="mt-4 text-black dark:text-black text-sm">
                                    N.B : Pas d'inquiétude, votre avis sera toujours <b>anonyme</b>
                                </p>
                                <p class="text-center text-black dark:text-black text-sm">
                                    <b>L'équipe de l'IFOSUP</b>.
                                </p>

                            </div>


                            <p class="mt-4">
                                <button class="bg-blue-900 hover:bg-blue-950 text-white font-semibold py-2 px-4 rounded">
                                    <Link :href="route('login')" class="text-base">Se connecter</Link>
                                </button>
                            </p>
                        </div>
                    </a>
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
