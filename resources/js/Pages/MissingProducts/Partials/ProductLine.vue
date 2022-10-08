<script setup>
import { computed } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { ref, watch } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { reactive } from 'vue'
import { trans } from "matice";
import { useForm } from '@inertiajs/inertia-vue3'
import moment from 'moment-with-locales-es6';


import Button from '@/Components/Button.vue';
// import ArrowPath from '@heroicons/vue/24/solid'
import { BeakerIcon } from '@heroicons/vue/20/solid'
import { ArrowPathIcon } from '@heroicons/vue/20/solid'
import { TrashIcon } from '@heroicons/vue/20/solid'
import JetLabel from '@/Components/Label.vue';
import JetInput from '@/Components/Input.vue';
import Checkbox from '@/Components/Checkbox.vue';
import JetActionMessage from '@/Components/ActionMessage.vue';
// import Checkbox from '../../../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Components/Checkbox.vue';


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
            alert.message = '', alert.success = false
            Inertia.visit('missing')
        }, 3000);

    }
})
</script>

<template>

    <!-- <div
        class="w-full py-2 px-2  justify-center items-center  grid grid-cols-3 md:table-row  md:py-1  border-t border-t-indigo-50  border-b border-b-indigo-50 "> -->

    <!-- <form @submit.prevent="form.put(route('update_product'), {
          preserveScroll: true,
          onSuccess: () => {
            alert.success = true
        }
        })" 
        > -->

    <div class="col-span-3 px-2 py-3 md:table-cell md:w-5/12 md:px-5 md:py-3">
        <JetLabel class="md:hidden mb-2"> {{trans('auth.Name')}} </JetLabel>
        {{product.name}}
    </div>
    <div class="col-span-1 px-2 py-3 md:table-cell md:w-2/12 md:px-5 md:py-3">
        <JetLabel class="md:hidden mb-2"> Type </JetLabel>
        <select v-model="form.type_id"
            class="w-full md:text-sm md:p-0  rounded-md border-0  outline outline-offset-2 outline-1 outline-slate-00">
            <option class="md:text-sm" value="1">Linge</option>
            <option class="md:text-sm" value="2">Produit</option>
        </select>
    </div>
    <div class="col-span-1 px-2 py-3 md:table-cell md:w-1/12 md:px-5 md:py-3">
        <JetLabel class="md:hidden mb-2">Par Défaut </JetLabel>
        <Checkbox :checked="form.default" v-model="form.default" />
    </div>
    <div class="col-span-1 px-2 py-3 flex flex-col items-center justify-center md:table-cell md:w-2/12 md:px-2 md:py-3 ">
        <Button type="submit" :disabled="form.processing" @click.prevent="submit">
            <ArrowPathIcon class="w-4 mr-1" />
        </Button>
        <!-- <Button :disabled="form.processing" v-if="form.quantity > 0" class="ml-1 bg-red-800 text-red-50 border border-red-50 ">
            <TrashIcon class="w-4" />
        </Button> -->
    </div>
    <div class="col-span-1 px-2 py-3 md:table-cell md:w-2/12 md:px-5 md:py-3">
        <JetActionMessage :on="alert.success"> {{trans('app.Saved')}}</JetActionMessage>

    </div>
    <!-- </form>  -->
    <!-- </div> -->

</template>