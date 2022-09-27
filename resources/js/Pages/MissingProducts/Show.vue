<script setup>
import { defineProps } from 'vue';
import { computed } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import JetActionSection from '@/Components/ActionSection.vue';
import ProductLine from '@/Pages/MissingProducts/Partials/ProductLine.vue'
import { Inertia } from '@inertiajs/inertia';

import { usePage } from '@inertiajs/inertia-vue3'
import { trans } from "matice";

const journal = usePage().props.value.journal

</script>
    
<template>
    <AppLayout title="Desgin System">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <JetActionSection class="mt-10 sm:mt-0">
                    <template #title>
                        Missing Products
                    </template>

                    <template #description>
                        Signale les produits manquants
                    </template>

                    <template #content>
                        <div class="hidden w-full items-center md:grid md:grid-cols-12 gap-6 bg-indigo-200 text-indigo-900 py-2 px-2">
                            <div class="md:col-span-5">Nom </div>
                            <div class="md:col-span-2"> </div>
                            <div class="md:col-span-1"> </div>
                            <div class="md:col-span-2"> Création </div>
                            <div class="md:col-span-2"> Modification </div>
                        </div>
                        <div v-for="line in journal" :key="line.id" class="flex items-center justify-between odd:bg-indigo-50">
                            <ProductLine :line="line"></ProductLine>


                        </div>
                    </template>

                </JetActionSection>
            </div>

        </div>
    </AppLayout>
</template>