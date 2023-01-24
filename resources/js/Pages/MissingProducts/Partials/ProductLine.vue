<script setup>
import { watch } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { reactive } from 'vue'
import { trans } from "matice";
import { useForm } from '@inertiajs/inertia-vue3'

import Button from '@/Components/Button.vue';
import { ArrowPathIcon } from '@heroicons/vue/20/solid'
import JetLabel from '@/Components/Label.vue';
import Checkbox from '@/Components/Checkbox.vue';
import JetActionMessage from '@/Components/ActionMessage.vue'

const props = defineProps({
    product: Object,
    message: String
});

const form = useForm({
    id: props.product.id,
    name: props.product.name,
    default: !!props.product.default,
    type_id: props.product.type_id
})

const products = usePage().props.value.initialProducts
const alert = reactive({
    message: '',
    success: false
})

function submit(){
    form.put(route('update_product'), {
          preserveScroll: true,
          onSuccess: () => {
            alert.success = true
        }
        })
}

// function product(id) {
//     return products.filter(product => product.id == id)[0]
// }

watch(alert, async () => {
    if (alert.success) {
        setTimeout(function () {
            alert.message = ''
            alert.success = false
            Inertia.visit('missing')
        }, 3000);

    }
})
</script>

<template>

    <div class="col-span-3 px-2 py-3 md:table-cell md:w-5/12 md:px-5 md:py-3">
        <JetLabel class="md:hidden mb-2">{{trans('auth.Name')}} </JetLabel>
        {{product.name}}
    </div>
    <div class="col-span-1 px-2 py-3 md:table-cell md:w-2/12 md:px-5 md:py-3">
        <JetLabel class="md:hidden mb-2"> Type </JetLabel>
        <select v-model="form.type_id"
            class=" bg-gray-800 after:bg-gray-200 w-full md:text-xs mg:text-sm md:p-0  rounded-sm border-0  outline outline-offset-4 outline-1 outline-gray-200">
            <option class="p-2 md:text-xs mg:text-sm" value="1">Linge</option>
            <option class="md:text-xs mg:text-sm" value="2">Produit</option>
        </select>
    </div>
    <div class="col-span-1 px-2 py-3 md:table-cell md:w-1/12 md:px-5 md:py-3 text-center">
        <JetLabel class="md:hidden mb-2">Par Défaut </JetLabel>
        <Checkbox :checked="form.default" v-model="form.default" class="appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-tertiary checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain  mr-2 cursor-pointer" />
    </div>
    <div class="col-span-1 px-2 py-3 flex flex-col items-center justify-center md:table-cell md:w-2/12 md:px-2 md:py-3 ">
        <Button type="submit" :disabled="form.processing" @click.prevent="submit">
            <ArrowPathIcon class="w-4 mr-1" />
        </Button>
    </div>
    <div class="col-span-1 px-2 py-3 md:table-cell md:w-2/12 md:px-5 md:py-3">
        <JetActionMessage :on="alert.success"> {{trans('app.Saved')}}</JetActionMessage>

    </div>
</template>