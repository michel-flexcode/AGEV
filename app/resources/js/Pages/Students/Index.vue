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
    <AppLayout>
        <div class="bg-gray-100 py-6">
            <header class="text-center mb-8">
                <h2 class="text-2xl font-semibold text-gray-800">Questions</h2>
            </header>

            <div class="max-w-4xl mx-auto">
                <ul
                    class="bg-white rounded-lg shadow overflow-hidden divide-y divide-gray-200"
                >
                    <li v-for="question in questions" :key="question.id">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <Link :href="route('questions.edit', question)">
                                    {{ question.label }}
                                </Link>
                                <div class="space-x-4">
                                    <button
                                        @click.prevent="
                                            confirmQuestionDeletion(question.id)
                                        "
                                        class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-opacity-50 transition ease-in-out duration-150"
                                    >
                                        Supprimer
                                    </button>
                                    <button
                                        class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-opacity-50 transition ease-in-out duration-150"
                                    >
                                        <Link
                                            :href="
                                                route(
                                                    'questions.edit',
                                                    question
                                                )
                                            "
                                        >
                                            Edit
                                        </Link>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="mt-6 text-center">
                    <Link
                        class="text-white bg-blue-500 px-4 py-2 font-semibold rounded-lg hover:bg-blue-700 hover:text-white transition duration-300 ease-in-out"
                        :href="route('questions.create')"
                    >
                        Créer une nouvelle question
                    </Link>
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
