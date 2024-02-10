<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
const questions = [
    {
        label: "Qualité du support de cours",
        model: "quality_of_course_material",
        type: "number",
        options: [
            { value: 1, text: "1 - Très mauvais" },
            { value: 2, text: "2 - Mauvais" },
            { value: 3, text: "3 - Moyen" },
            { value: 4, text: "4 - Bon" },
            { value: 5, text: "5 - Excellent" },
        ],
        placeholder: "Sélectionnez une note",
    },
    {
        label: "Qualité des exercices proposés",
        model: "quality_of_exercises",
        type: "number",
        options: [
            { value: 1, text: "1 - Très mauvais" },
            { value: 2, text: "2 - Mauvais" },
            { value: 3, text: "3 - Moyen" },
            { value: 4, text: "4 - Bon" },
            { value: 5, text: "5 - Excellent" },
        ],
        placeholder: "Sélectionnez une note",
    },
    // Ajoutez d'autres questions ici selon le même modèle
];

const form = useForm({
    quality_of_course_material: null,
    quality_of_exercises: null,
    // Initialiser le reste des champs ici
});

function submitForm() {
    form.post("/route-pour-soumettre-formulaire");
    // Remplacez '/route-pour-soumettre-formulaire' par l'URL réelle où vous souhaitez soumettre le formulaire
}
</script>

<template>
    <AppLayout>
        <form @submit.prevent="submitForm">
            <div v-for="question in questions" :key="question.model">
                <label :for="question.model">{{ question.label }}</label>
                <select
                    v-if="question.options"
                    v-model="form[question.model]"
                    :id="question.model"
                >
                    <option disabled value="">Sélectionnez une note</option>
                    <option
                        v-for="option in question.options"
                        :value="option.value"
                        :key="option.value"
                    >
                        {{ option.text }}
                    </option>
                </select>
                <input
                    v-else
                    type="text"
                    v-model="form[question.model]"
                    :placeholder="question.placeholder"
                />
            </div>
            <button type="submit">Soumettre l'évaluation</button>
        </form>
    </AppLayout>
</template>
