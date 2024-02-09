<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    teachers: Array,
});
</script>

<template>
    <AppLayout title="Teachers">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Professeurs
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <ul class="bg-white rounded-lg overflow-hidden divide-y-2">
                    <li
                        class="p-4"
                        v-for="teacher in teachers"
                        :key="teacher.id"
                    >
                        <Link :href="route('teachers.edit', teacher)">
                            {{ teacher.userable.name }}
                        </Link>
                    </li>
                </ul>
                <div class="mt-4">
                    <Link :href="route('teachers.create')"
                        >Créer un nouveau professeur</Link
                    >
                </div>
            </div>
        </div>
    </AppLayout>
</template>
