<template>
    <div>
        <h1>Product List</h1>
        <!-- <button @click="visitAddProductPage">Ajouter un produit</button> -->
        
        <table>
            <!-- Tableau des produits -->
            <thead>
                <!-- Entêtes de la table -->
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Ancien prix</th>
                    <th>Nouveau prix</th>
                    <th>Instock</th>
                    <th>Slug</th>
                    <th>Barcode</th>
                    <th>Categories</th>
                    <th>Subcategories</th>
                    <th>Variations</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Corps de la table -->
                <tr v-for="product in $page.props.products" :key="product.id">
                    <!-- Ligne pour chaque produit -->
                    <td>{{ product.name }}</td>
                    <td>{{ product.description }}</td>
                    <td>{{ product.old_price }}</td>
                    <td>{{ product.new_price }}</td>
                    <td>{{ product.instock }}</td>
                    <td>{{ product.slug }}</td>
                    <td>{{ product.barcode }}</td>
                    <td>{{ product.categories }}</td>
                    <td>{{ product.subcategories }}</td>
                    <td>
                        <ul>
                            <li v-for="(variation, index) in product.variations" :key="index">
                                {{ variation }}
                            </li>
                        </ul>
                    </td>
                    <td>
                        <!-- Actions pour chaque produit -->
                        <a :href="`/products/${product.id}`">Show</a>
                        <a :href="`/products/${product.id}/edit`">Edit</a>
                        <form :action="`/products/${product.id}`" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="margin-left: auto;margin-right: auto; display: flex;justify-content: center;align-items: center;">
    <div style="width: 50%; height: 500px; background-color: black;"></div>
    </div>
</template>

<script>
import { router } from '@inertiajs/vue3'
export default {
    props: {
        products: Array,
    },

    methods: {
        visitAddProductPage() {
            router.push(route('products.create')); // Naviguer vers la page d'ajout de produit
        }
    }
};
</script>

<style>
    /* Styles pour la table et les actions */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    .actions {
        display: flex;
        gap: 8px;
    }

    .actions a,
    .actions button {
        padding: 4px 8px;
        text-decoration: none;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .actions a:hover,
    .actions button:hover {
        background-color: #0056b3;
    }
</style>
