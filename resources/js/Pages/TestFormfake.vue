<script>
export default {
    data() {
        return {
            formData: {
                name: "",
                email: "",
                message: "",
            },
            submitted: false,
        };
    },
    methods: {
        submitForm() {
            // Ici, vous pouvez ajouter une logique pour envoyer les données du formulaire à votre serveur
            // Pour l'exemple, nous affichons simplement les données dans la console
            console.log("Formulaire soumis avec succès !", this.formData);
            this.submitted = true;
        },
    },
};
</script>

<template>
    <div>
        <form @submit.prevent="submitForm">
            <label for="name">Nom :</label>
            <input type="text" id="name" v-model="formData.name" required />

            <label for="email">Email :</label>
            <input type="email" id="email" v-model="formData.email" required />

            <label for="message">Message :</label>
            <textarea
                id="message"
                v-model="formData.message"
                required
            ></textarea>

            <button type="submit">Envoyer</button>
        </form>

        <div v-if="submitted">
            <h2>Formulaire soumis avec succès !</h2>
            <p>Nom: {{ formData.name }}</p>
            <p>Email: {{ formData.email }}</p>
            <p>Message: {{ formData.message }}</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            formData: {
                name: "",
                email: "",
                message: "",
            },
            submitted: false,
        };
    },
    methods: {
        submitForm() {
            // Ici, vous pouvez ajouter une logique pour envoyer les données du formulaire à votre serveur
            // Pour l'exemple, nous affichons simplement les données dans la console
            console.log("Formulaire soumis avec succès !", this.formData);
            this.submitted = true;
        },
    },
};
</script>
