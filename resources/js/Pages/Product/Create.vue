<script setup>
import { useForm } from '@inertiajs/vue3';

defineProps({
  errors:Object
});

const form = useForm({
  name: '',
  description: '',
  oldPrice: 0,
  newPrice: 0,
  image: null,
  stock: 0,
  slug: '',
  barcode: '',
  category: '',
  subcategory: '',
  variations: [],
  
});

const categories = useForm(['Femme', 'Homme', 'Enfant', 'Bebes', 'Cosmétiques', 'Electronique']);
const subcategories = useForm({
  Femme: ['Costume', 'Robes', 'Accessoires'],
  Homme: ['Ensembles', 'Chaussures', 'Accessoires'],
  Enfant: ['Top', 'Shorts', 'Chaussures'],
  Bebes: ['Jouets', 'Pyjamas'],
  Cosmétiques: ['Huiles', 'Savons', 'Parfums'],
  Electronique: ['Phone', 'Pc', 'Tv'],
});

const addProduct = () => {
  // Logique pour ajouter un produit
};
const handleFileUpload = (event) => {
  // Logique pour gérer le téléchargement de fichier
};

const updateSubcategories = () => {
  // Logique pour mettre à jour les sous-catégories en fonction de la catégorie sélectionnée
};

const addVariation = () => {
  form.variations.push({
    type: 'color',
    option: '',
    price: 0,
  });
};

const removeVariation = (index) => {
  form.variations.splice(index, 1);
};

function submit() {
  route.post('/products',form)
  
}

 
</script>
<template>
  <Sidebar>
    <div class="flex h-screen">
      <!-- Sidebar fixe à gauche -->
     
      <!-- Contenu principal -->
      <div class="flex flex-col flex-1">
        <!-- Barre de navigation -->
        <div class="bg-blue-700 p-4">
          <h1 class="text-2xl font-bold text-white">Ajouter un produit</h1>
        </div>
        
        <!-- Contenu -->
        <div class="p-4 flex-grow overflow-y-auto bg-gray-100">
          <!-- Formulaire d'ajout de produit -->
          <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-lg mx-auto">
            <form @submit.prevent="addProduct">
              <!-- Champ pour le nom -->
              <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom :</label>
                <input type="text" id="name" v-model="form.name" class="w-full border rounded-md px-4 py-2">
                <div class="text-danger text-xs" v-if="errors.name">{{ errors.name }}</div>
              </div>
  
  
              <!-- Champs pour les prix -->
              <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                  <label for="old_price" class="block text-gray-700 text-sm font-bold mb-2">Ancien prix :</label>
                  <input type="number" id="old_price" v-model="form.old_price" class="w-full border rounded-md px-4 py-2">
                  <div class="text-danger text-xs" v-if="errors.old_price">{{ errors.old_price }}</div>
                </div>
  
                <div>
                  <label for="new_price" class="block text-gray-700 text-sm font-bold mb-2">Nouveau prix :</label>
                  <input type="number" id="new_price" v-model="form.new_price" class="w-full border rounded-md px-4 py-2">
                  <div class="text-danger text-xs" v-if="errors.new_price">{{ errors.new_price }}</div>
                </div>
              </div>
  
              <!-- Champ pour l'URL de l'image -->
               <div class="mb-4">
                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image :</label>
                <input type="file" id="image" @change="handleFileUpload" class="w-full border rounded-md px-4 py-2">
                <div class="text-danger text-xs" v-if="errors.image">{{ errors.image }}</div>
              </div> 

              <!-- Champ pour la description -->
              <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description :</label>
                <textarea id="description" v-model="form.description" class="w-full border rounded-md px-4 py-2"></textarea>
                <div class="text-danger text-xs" v-if="errors.description">{{ errors.description }}</div>
              </div>

               <!-- Champ pour le Slug -->
               <div class="mb-4">
                <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug :</label>
                <input type="text" id="slug" v-model="form.slug" class="w-full border rounded-md px-4 py-2">
                <div class="text-danger text-xs" v-if="errors.slug">{{ errors.slug }}</div>
              </div>

              <!-- Champ pour le code-barres -->
              <div class="mb-4">
                <label for="barcode" class="block text-gray-700 text-sm font-bold mb-2">Code-barres :</label>
                <input type="text" id="barcode" v-model="form.barcode" class="w-full border rounded-md px-4 py-2">
                <div class="text-danger text-xs" v-if="errors.barcode">{{ errors.barcode }}</div>
              </div>
  
  
              <!-- Champ pour le facture -->
              <div class="mb-4">
                <label for="facture" class="block text-gray-700 text-sm font-bold mb-2">Facture :</label>
                <input type="number" id="facture" v-model="form.facture" class="w-full border rounded-md px-4 py-2">
                <div class="text-danger text-xs" v-if="errors.facture">{{ errors.facture }}</div>
              </div>
        
  
              <!-- Champ pour le instock -->
              <div class="mb-4">
                <label for="instock" class="block text-gray-700 text-sm font-bold mb-2">Instock :</label>
                <input type="number" id="instock" v-model="form.instock" class="w-full border rounded-md px-4 py-2">
                <div class="text-danger text-xs" v-if="errors.instock">{{ errors.instock }}</div>
              </div>
  
              <!-- Menu déroulant pour la catégorie -->
              <div class="mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Catégorie :</label>
                <select id="category" v-model="form.category" @change="updateSubcategories" class="w-full border rounded-md px-4 py-2">
                  <option value="" disabled>Sélectionnez une catégorie</option>
                  <option v-for="category in categories" :value="category">{{ category }}</option>
                  <div class="text-danger text-xs" v-if="errors.categories">{{ errors.categories }}</div>
                </select>
              </div>

              <!-- Menu déroulant pour la sous-catégorie -->
              <div class="mb-4" v-if="subcategories[form.category]?.length">
                <label for="subcategory" class="block text-gray-700 text-sm font-bold mb-2">Sous-catégorie :</label>
                <select id="subcategory" v-model="form.subcategory" class="w-full border rounded-md px-4 py-2">
                  <option value="" disabled>Sélectionnez une sous-catégorie</option>
                  <option v-for="subcategory in subcategories[form.category]" :value="subcategory">{{ subcategory }}</option>
                  <div class="text-danger text-xs" v-if="errors.subcategories">{{ errors.subcategories }}</div>
                </select>
              </div>

               
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Variations :</label>
                <div v-for="(variation, index) in form.variations" :key="index" class="flex mb-2">
                  <select v-model="variation.type" class="border rounded-md px-4 py-2 mr-2">
                    <option value="color">Couleur</option>
                    <option value="size">Taille</option>
                    <option value="smell">Odeur</option>
                    <option value="weight">Poids</option>
                  </select>
                  <input type="text" placeholder="name" v-model="variation.option" class="w-full border rounded-md px-4 py-2 mr-2">
                  <input type="text" placeholder="price" v-model="variation.option.newPrice" class="w-full border rounded-md px-4 py-2 mr-2">

                  <button type="button" @click="removeVariation(index)" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">
                    Supprimer
                  </button>
                </div>
                <button type="button" @click="addVariation" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-2 rounded">
                  Ajouter une variation
                </button>
              </div>
  
              
  
              <!-- Bouton pour soumettre le formulaire -->
              <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded w-full">
                Ajouter
              </button>
            </form>
          </div>
        </div>
      </div>
      <div>hhhhh</div>
    </div>
  </Sidebar>
</template>




