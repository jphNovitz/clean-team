<script setup>
import { computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3'
import { trans } from "matice";

import JetInput from '@/Components/Input.vue';


const props = defineProps({
    line: Object,
});

const products = usePage().props.value.initialProducts
var productLine = props.line


function product(id) {

    return products.filter(product => product.id == id)[0]
}


function update() {
    Inertia.post(route('missing_products_test')), {
        onSuccess: (res) => {
            alert()
        }
    }
}
</script>

<template>

    <div class="ml-4 w-full grid grid-cols-4 gap-4 h-20">
        
        
        <span v-if="product(productLine.product_id).type_id == 1">
            <JetInput type="number" class="!w-16" v-model.number="productLine.quantity" />
        </span>
        <div v-else class="!w-16"><input type="checkbox" v-model.number="productLine.reported"> </div>
        {{product(productLine.product_id).name}}
        {{product(productLine.product_id).type_id}}
        <button @click="update">update</button>

    </div>

</template>