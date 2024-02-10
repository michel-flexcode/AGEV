<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import { ref } from "vue";

const props = defineProps({
    questions: Array,
    question: Object,
});

//ajout bloc delete
const confirmingQuestionDeletion = ref(false);
const questionIdToDelete = ref(null);
const formDeleteQuestion = useForm("delete", {});

const confirmQuestionDeletion = (id) => {
    questionIdToDelete.value = id;
    confirmingQuestionDeletion.value = true;
};

const deleteQuestion = () => {
    formDeleteQuestion.delete(
        route("questions.destroy", questionIdToDelete.value),
        {
            preserveScroll: true,
            onSuccess: () => {
                confirmingQuestionDeletion.value = false;
            },
        }
    );
};

const closeModal = () => {
    confirmingQuestionDeletion.value = false;
};
</script>

<template>
    <AppLayout title="Questions">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Questions
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <ul class="bg-white rounded-lg overflow-hidden divide-y-2">
                    <li
                        class="p-4"
                        v-for="question in questions"
                        :key="question.id"
                    >
                        <Link :href="route('questions.edit', question)">
                            {{ question.label }}
                        </Link>

                        <button
                            @click.prevent="
                                confirmQuestionDeletion(question.id)
                            "
                            class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-opacity-50 transition ease-in-out duration-150"
                        >
                            Supprimer
                        </button>
                        <button
                            class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-opacity-50 transition ease-in-out duration-150"
                        >
                            <Link :href="route('questions.edit', question)">
                                Edit
                            </Link>
                        </button>
                    </li>
                </ul>
                <div class="mt-4">
                    <Link :href="route('questions.create')"
                        >Créer une nouvelle question</Link
                    >
                </div>
            </div>
        </div>
    </AppLayout>

    <DialogModal :show="confirmingQuestionDeletion" @close="closeModal">
        <template #title> Supprimer la question </template>

        <template #content>
            Êtes-vous sûr de vouloir supprimer cette question ? Cette action est
            irréversible.
        </template>

        <template #footer>
            <SecondaryButton @click="closeModal"> Annuler </SecondaryButton>

            <DangerButton
                class="ms-3"
                :class="{ 'opacity-25': confirmingQuestionDeletion.processing }"
                :disabled="confirmingQuestionDeletion.processing"
                @click="deleteQuestion"
            >
                Supprimer
            </DangerButton>
        </template>
    </DialogModal>
</template>
