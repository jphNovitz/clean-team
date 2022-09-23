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

                        <div v-for="line in journal" :key="line.id" class="flex items-center justify-between">
                            <ProductLine :line="line"></ProductLine>
                            

                        </div>
                    </template>

                </JetActionSection>
            </div>

        </div>
    </AppLayout>
</template>