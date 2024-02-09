<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/ActionMessage.vue";
import FormSection from "@/Components/FormSection.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import TextInput from "@/Components/TextInput.vue";
import DialogModal from "@/Components/DialogModal.vue";
import { ref } from "vue";

const props = defineProps({
    question: Object,
});

const formCreateQuestion = useForm({
    _method: "Delete",
});

//ajout bloc delete
const confirmingQuestionDeletion = ref(false);
const questionIdToDelete = ref(props.question.id);
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

            {{ question.label }}

            <button
                @click.prevent="deleteQuestion(question.id)"
                class="btn btn-outline-danger"
            >
                Supprimer
            </button>
        </template>
    </AppLayout>
    <!-- futur bouton -->

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
