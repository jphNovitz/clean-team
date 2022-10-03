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


// function product(id) {
//     return products.filter(product => product.id == id)[0]
// }

watch(alert, async () => {
    if (alert.success) {
        setTimeout(function () { 
            alert.message = '', alert.success = false
            Inertia.visit('missing') 
        }, 3000);
        // setTimeout(function () { Inertia.reload() }, 5000)
        // setTimeout(function () { Inertia.visit('missing') }, 3001)
    }
})
</script>

<template>

    <div
        class="w-full py-2 px-2 flex justify-center items-center  md:py-1  border-t border-t-indigo-50  border-b border-b-indigo-50 ">

        <form @submit.prevent="form.put(route('update_product'), {
          preserveScroll: true,
          onSuccess: () => {
            alert.success = true
        
        }
        })" class="w-full items-center grid grid-cols-3 md:grid-cols-12 gap-6">

            <div class="col-span-3 md:col-span-5  items-start text-xl md:text-lg flex flex-col  ">
                <!-- <div class="md:hidden text-sm text-gray-700 "> {{trans('auth.Name')}}</div> -->
                <JetLabel class="md:hidden"> {{trans('auth.Name')}} </JetLabel>
                {{product.name}}
            </div>
            <div class="col-span-1 md:col-span-2 ">
                <JetLabel class="md:hidden"> Type </JetLabel>
                <select v-model="form.type_id"
                    class="w-full text-sm p-0  rounded-md border-0  outline outline-offset-2 outline-1 outline-slate-00">
                    <option class="text-sm" value="1">Linge</option>
                    <option class="text-sm" value="2">Produit</option>
                </select>
            </div>
            <div class="col-span-1 md:col-span-1">
                <JetLabel class="md:hidden"> Par défaut </JetLabel>
                <Checkbox :checked="form.default" v-model="form.default" />
            </div>
            <div class="col-span-1 md:col-span-2">
                <Button type="submit" :disabled="form.processing">
                    <ArrowPathIcon class="w-4" />
                </Button>
            </div>
            <!-- <div class="hidden 2xl:grid md:col-span-2">
                {{ moment(props.line.created_at).format("l") }}
            </div> -->
            <!-- <div class="hidden md:grid md:col-span-2">
                {{ moment(props.product.updated_at).format("l") }}
            </div> -->
            <div class="col-span-2">
                <JetActionMessage :on="alert.success"> {{trans('app.Saved')}}</JetActionMessage>
            </div>
        </form>

    </div>

</template>