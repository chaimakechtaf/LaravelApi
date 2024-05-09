<template>
  <div class="flex h-screen"> <!-- Utilisation de la classe h-screen pour définir la hauteur de la barre latérale -->
    <!-- Sidebar -->
    <div v-if="isOpen" class="bg-gray-800 text-white w-64 flex flex-col">
      <div class="p-4">
        <h1 class="text-xl font-bold">Sidebar</h1>
        <!-- Bouton pour fermer le sidebar -->
        <button @click="toggleSidebar" class="absolute top-2 right-2 text-white hover:text-gray-300">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <ul>
        <li v-for="item in sidebarItems" :key="item.id" @click="navigate(item.route)" class="p-4 cursor-pointer hover:bg-gray-700">
          <i class="mr-2" :class="item.icon"></i>
          {{ item.name }}
        </li>
        <!-- Menu déroulant pour les options de produit -->
        <li class="p-4 cursor-pointer hover:bg-gray-700" @click="toggleProductDropdown">
          <i class="mr-2 fas fa-plus"></i>
          Product
          <i v-if="isProductDropdownOpen" class="ml-auto fas fa-chevron-up"></i>
          <i v-else class="ml-auto fas fa-chevron-down"></i>
          <!-- Sous-menu pour les options de produit -->
          <ul v-show="isProductDropdownOpen" class="pl-4">
            <li @click="addProduct" class="p-2 cursor-pointer hover:bg-gray-600">Add Product</li>
            <li @click="viewProductList" class="p-2 cursor-pointer hover:bg-gray-600">List Product</li>
          </ul>
        </li>
        <!-- Fin du menu déroulant pour les options de produit -->
      </ul>
    </div>

    <!-- Contenu principal -->
    <div class="flex-1 p-8">
      <!-- Bouton pour ouvrir le sidebar -->
      <button @click="toggleSidebar" class="bg-gray-800 text-white p-2 rounded-md hover:bg-gray-700">
        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="-5 -7 24 24"><path fill="currentColor" d="M1 0h5a1 1 0 1 1 0 2H1a1 1 0 1 1 0-2m7 8h5a1 1 0 0 1 0 2H8a1 1 0 1 1 0-2M1 4h12a1 1 0 0 1 0 2H1a1 1 0 1 1 0-2"/></svg>
      </button>
      <!-- Contenu principal -->
      <slot></slot>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const isOpen = ref(false);
const isProductDropdownOpen = ref(false);

const sidebarItems = [
  { id: 1, name: 'Home', route: '/', icon: 'fas fa-home' },
  { id: 3, name: 'Panier', route: '/panier', icon: 'fas fa-shopping-cart' },
  { id: 4, name: 'Message', route: '/message', icon: 'fas fa-envelope' },
  { id: 5, name: 'Profile', route: '/profile', icon: 'fas fa-user' }
];

const toggleSidebar = () => {
  isOpen.value = !isOpen.value;
};

const navigate = (route) => {
  // Votre logique de navigation ici
  console.log("Navigating to:", route);
};

const toggleProductDropdown = () => {
  isProductDropdownOpen.value = !isProductDropdownOpen.value;
};

const addProduct = () => {
  // Votre logique pour ajouter un produit
  console.log("Adding a product");
};

const viewProductList = () => {
  // Votre logique pour afficher la liste de produits
  console.log("Viewing product list");
};
</script>

<style>
/* Ajoutez vos styles CSS personnalisés ici */
</style>
