<script setup>
import { ref, watch, reactive, computed } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue';
import JetActionSection from '@/Components/ActionSection.vue';
import JournalLine from '@/Pages/MissingProducts/Partials/JournalLine.vue'
import ProductLine from '@/Pages/MissingProducts/Partials/ProductLine.vue'
import ProductManager from '@/Pages/MissingProducts/Partials/ProductManager.vue'
import { Inertia } from '@inertiajs/inertia';

import { usePage } from '@inertiajs/inertia-vue3'
import { trans } from "matice";

const journal = usePage().props.value.journal
const products = usePage().props.value.initialProducts
const showConsumable = ref(false)
const showLinens = ref(true)
const showOddColor = ref(false)


function typeID(productID) {
    return products.filter(product => product.id == productID)[0].type_id
}

function showComponent(productID) { 
    switch(products.filter(product => product.id == productID)[0].type_id){
        case 1:
            return showLinens.value
        case 2:
            return showConsumable.value
    }  
}

watch([showConsumable, showLinens], async () => showOddColor.value = (showConsumable.value === showLinens.value))


</script>
    
<template>
    <AppLayout title="Produits manquants">
        
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <JetActionSection class="mt-10 sm:mt-0">
                    <template #title>
                        Product Manager <div class="flex justify-center">
                        </div>
                    </template>

                    <template #description>
                        Geréer les produits
                    </template>

                    <template #content>
                        <div class="flex justify-start my-4">
                            <label for="default-consumable" class="inline-flex relative items-center cursor-pointer">
                                <input type="checkbox" value="" id="default-consumable" v-model="showConsumable"
                                    class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-indigo-600">Afficher
                                    Produits</span>
                            </label>
                            <label for="default-linens" class="inline-flex relative items-center cursor-pointer">
                                <input type="checkbox" value="" id="default-linens" v-model="showLinens"
                                    class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-indigo-600">Afficher
                                    Linge</span>
                            </label>
                        </div>
                        <div
                            class="hidden w-full items-center md:grid md:grid-cols-12 gap-6 bg-indigo-200 text-indigo-900 py-2 px-2">
                            <div class="md:col-span-5">Nom </div>
                            <div class="md:col-span-2"> </div>
                            <div class="md:col-span-1"> </div>
                            <!-- <div class="hidden 2xl:grid 2xl:col-span-2"> Création </div> -->
                            <div class="hidden md:grid md:col-span-2"> Modification </div>
                        </div>
                        <div v-for="product in products" :key="product.id"
                            class="flex items-center justify-between transition-colors ease-in-out delay-150 duration-1000"
                            :class="{'odd:bg-indigo-50' : showOddColor}">
                        
                            <ProductLine :product="product"  />
                            
                        </div>
                    </template>

                </JetActionSection>
            </div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <JetActionSection class="mt-10 sm:mt-0">
                    <template #title>
                        Missing Products <div class="flex justify-center">
                        </div>
                    </template>

                    <template #description>
                        Signale les produits manquants
                    </template>

                    <template #content>
                        <div class="flex justify-start my-4">
                            <label for="default-consumable" class="inline-flex relative items-center cursor-pointer">
                                <input type="checkbox" value="" id="default-consumable" v-model="showConsumable"
                                    class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-indigo-600">Afficher
                                    Produits</span>
                            </label>
                            <label for="default-linens" class="inline-flex relative items-center cursor-pointer">
                                <input type="checkbox" value="" id="default-linens" v-model="showLinens"
                                    class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-indigo-600">Afficher
                                    Linge</span>
                            </label>
                        </div>
                        <div
                            class="hidden w-full items-center md:grid md:grid-cols-12 gap-6 bg-indigo-200 text-indigo-900 py-2 px-2">
                            <div class="md:col-span-5">Nom </div>
                            <div class="md:col-span-2"> </div>
                            <div class="md:col-span-1"> </div>
                            <!-- <div class="hidden 2xl:grid 2xl:col-span-2"> Création </div> -->
                            <div class="hidden md:grid md:col-span-2"> Modification </div>
                        </div>
                        <div v-for="line in journal" :key="line.id"
                            class="flex items-center justify-between transition-colors ease-in-out delay-150 duration-1000"
                            :class="{'odd:bg-indigo-50' : showOddColor}">
                            <JournalLine :line="line" v-if="showComponent(line.product_id)" />
                        </div>
                    </template>

                </JetActionSection>
            </div>

        </div>
    </AppLayout>
</template>