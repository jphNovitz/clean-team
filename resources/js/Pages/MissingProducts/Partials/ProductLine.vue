<script setup>
import { computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { usePage } from '@inertiajs/inertia-vue3'
import { reactive } from 'vue'
import { trans } from "matice";
import { useForm } from '@inertiajs/inertia-vue3'

import Button from '@/Components/Button.vue';
import JetInput from '@/Components/Input.vue';
import JetActionMessage from '@/Components/ActionMessage.vue';


const props = defineProps({
    line: Object,
    message: String
});

const form = useForm({
    id: props.line.id,
    active: props.line.active,
    reported: props.line.reported,
    quantity: props.line.quantity,
    product_id: props.line.product_id,
})

const products = usePage().props.value.initialProducts
const alert = reactive({
    message: '',
    success: false
})


function product(id) {

    return products.filter(product => product.id == id)[0]
}

</script>

<template>
    {{props.message}}
    <div class="ml-4 w-full my-12">

        <form @submit.prevent="form.post(route('missing_products_test'), {
          preserveScroll: true,
          onSuccess: () => alert.success = true,
        })" class="w-full grid grid-cols-12 gap-8 align-middle">

            <div v-if="product(form.product_id).type_id == 1" class="col-span-1">
                <JetInput type="number" class="w-16" v-model.number="form.quantity" />
            </div>
            <div v-else class="col-span-1">
                <input type="checkbox" v-model.checkbox="form.reported">
            </div>
            <div class="col-span-5">
                {{product(form.product_id).name}}
                ({{product(form.product_id).type_id}})
            </div>
            <div class="col-span-4">
                <Button type="submit" :disabled="form.processing"> {{trans('btn.Save')}} </Button>
            </div>
            <div class="col-span-2">
                <JetActionMessage :on="alert.success" > {{trans('app.Saved')}}</JetActionMessage>
            </div>
        </form>

    </div>

</template>