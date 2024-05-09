<template>
  <div>
    <form @submit.prevent="addProduct">
      <input type="text" v-model="form.nom" placeholder="Nom">
      <input type="text" v-model="form.description" placeholder="Description">
      <input type="number" v-model="form.old_price" placeholder="Ancien prix">
      <input type="text" v-model="form.image" placeholder="Image">
      <input type="text" v-model="form.slug" placeholder="Slug">
      <input type="text" v-model="form.categories" placeholder="Categories">
      <input type="text" v-model="form.souscategorie" placeholder="Sous-categorie">
      <input type="text" v-model="form.variation" placeholder="Variation">
      <input type="text" v-model="form.variation_option" placeholder="Option de variation">
      <input type="number" v-model="form.option_price" placeholder="Prix de l'option">
      <button type="submit">Ajouter</button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
  nom: '',
  description: '',
  old_price: 0,
  image: '',
  instock: false,
  facture: false,
  slug: '',
  categories: '',
  souscategorie: '',
  variation: '',
  variation_option: '',
  option_price: 0,
});

const addProduct = async () => {
  try {
    await form.post(route('products.store'), {
      data: form.data(),
    }); // Utilisation de la route nommée pour envoyer les données
    // Réinitialiser le formulaire après l'ajout réussi
    form.reset();
  } catch (error) {
    console.error(error);
  }
};
</script>
