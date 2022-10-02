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
import JetActionMessage from '@/Components/ActionMessage.vue';


const props = defineProps({
    line: Object,
    message: String
});

// moment = moment.locale('fr')
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

watch(alert, async () => {
    if (alert.success) setTimeout(function() { alert.message = '', alert.success = false }, 3000);
})
</script>

<template>
   
    <div class="w-full py-2 px-2 flex items-center  md:py-1  border-t border-t-indigo-50  border-b border-b-indigo-50 ">
        
        <form @submit.prevent="form.post(route('missing_products_test'), {
          preserveScroll: true,
          onSuccess: () => alert.success = true,
        })" class="w-full items-center grid grid-cols-2 md:grid-cols-12 gap-6">

            <div class="col-span-2 md:col-span-5  items-start text-xl md:text-lg flex flex-col  ">
                <!-- <div class="md:hidden text-sm text-gray-700 "> {{trans('auth.Name')}}</div> -->
                <JetLabel class="md:hidden"> {{trans('auth.Name')}} </JetLabel>
                 {{product(form.product_id).name}} 
            </div>
            <div class="col-span-1 md:col-span-2 ">
                <JetLabel class="md:hidden">{{trans('app.Quantity')}}</JetLabel>     
                <JetInput v-if="product(form.product_id).type_id == 1"  
                type="number" 
                class="w-3/4 " 
                v-model.number="form.quantity" />
                <input v-else type="checkbox" v-model.checkbox="form.reported">
            </div>
            <!-- <div class="col-span-1">
                ({{product(form.product_id).type_id}})
            </div> -->
            <div class="col-span-1 md:col-span-1">
                <Button type="submit" :disabled="form.processing"> <ArrowPathIcon class="w-4" /> </Button>
            </div>
            <!-- <div class="hidden 2xl:grid md:col-span-2">
                {{ moment(props.line.created_at).format("l") }}
            </div> -->
            <div class="hidden md:grid md:col-span-2">
                {{ moment(props.line.updated_at).format("l") }}
            </div>
            <div class="col-span-2">
                <JetActionMessage :on="alert.success"> {{trans('app.Saved')}}</JetActionMessage>
            </div>
        </form>

    </div>

</template>