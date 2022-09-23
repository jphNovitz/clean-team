<script setup>
import { defineProps } from 'vue';
import { computed } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import JetActionSection from '@/Components/ActionSection.vue';
import JetInput from '@/Components/Input.vue';
import { Inertia } from '@inertiajs/inertia';

import { usePage } from '@inertiajs/inertia-vue3'
import { trans } from "matice";

const props = defineProps({
    journal: Array,
    products: Array,
    message: String
});

function product(id) {
    return props.products.filter(product => product.id == id)[0]
}
function toInt(string) {
    return parseInt(string)
}
function update() {
    /*Inertia.post(route('missing_products_test')), {
        onSuccess: (res) => {
            alert()
        }
    }*/
}


</script>
    
<template>
    <AppLayout title="Desgin System">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products {{this.message}}
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
                            <div class="ml-4 w-full grid grid-cols-4 gap-4 h-20">
                                <span v-if="product(line.product_id).type_id == 1">
                                    <JetInput type="number" class="!w-16"  v-model.number="line.quantity" />
                                </span>
                                <div v-else class="!w-16"><input type="checkbox" v-model.number="line.reported"> </div>
                                {{product(line.product_id).name}}
                                {{product(line.product_id).type_id}}
                                <button @click="update">update</button>

                            </div>

                        </div>
                    </template>


                </JetActionSection>

                <!--      <ul>
                    <li v-for="product in products" >{{product.name}}</li>
                </ul> -->
            </div>

        </div>
    </AppLayout>
</template>