<script setup>
import { watch } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { reactive } from 'vue'
import { trans } from "matice";
import { useForm } from '@inertiajs/inertia-vue3'
import moment from 'moment-with-locales-es6';

import Button from '@/Components/Button.vue';
import { ArrowPathIcon, HandThumbUpIcon } from '@heroicons/vue/20/solid'
import JetLabel from '@/Components/Label.vue';
import JetInput from '@/Components/Input.vue';
import JetCheckbox from '@/Components/Checkbox.vue';
import JetActionMessage from '@/Components/ActionMessage.vue';


const props = defineProps({
    line: Object,
    message: String
});

// moment = moment.locale('fr')
const form = useForm({
    id: props.line.id,
    active: !!props.line.active,
    reported: props.line.reported,
    quantity: String(props.line.quantity),
    product_id: props.line.product_id,
})

const products = usePage().props.value.initialProducts
const alert = reactive({
    message: '',
    success: false
})


function product(id) {
    return products.filter(product => product.id ===id)[0]
}

function submit() {
    form.post(route('missing_products_test'), {
        preserveScroll: true,
        onSuccess: () => alert.success = true,
    })
}

watch(alert, async () => {
    if (alert.success) setTimeout(function () { alert.message = ''; alert.success = false }, 3000);
})
</script>

<template>
    <div class="col-span-3 px-2 py-3 md:table-cell md:w-5/12 md:px-5 md:py-3">
        <JetLabel class="md:hidden mb-2"> {{ trans('auth.Name') }} </JetLabel>
        {{ product(form.product_id).name }}
    </div>

    <div class="col-span-1 px-2 py-3 md:table-cell md:w-1/12 md:px-0 md:text-center">
        <JetLabel class="md:hidden mb-2">{{ trans('app.Quantity') }}</JetLabel>
        <JetInput v-if="product(form.product_id).type_id === 1" type="number"
            class="w-16 md:w-12 md:text-sm md:p-0  rounded-sm border-0  outline outline-offset-4 outline-1 outline-gray-200"
            v-model="form.quantity" />
        <JetCheckbox v-else type="checkbox" :checked="form.active" v-model="form.active" />
    </div>
    <div class="col-span-1 flex items-end justify-center px-2 py-3 md:table-cell md:w-1/12 md:px-0 md:text-center">
        <Button type="submit" class="w-16 h-12 md:w-12 md:h-8 flex items-center justify-center" :disabled="form.processing"
            @click.prevent="submit">
            <ArrowPathIcon class="w-6" />
        </Button>
    </div>
    <div class="hidden col-span-1 px-2 py-3 md:table-cell md:w-2/12 md:px-5 md:py-3 md:text-sm">
        {{ moment(props.line.updated_at).format("l") }}
    </div>
    <div class="col-span-1 px-2 py-3 flex items-end justify-center md:table-cell md:w-2/12 md:-text-sm">
        <JetActionMessage  class="w-full h-full flex items-center justify-center" :on="alert.success">
            <HandThumbUpIcon class="w-5 text-green-700"/> 
            <!-- {{ trans('app.Saved') }} -->
        </JetActionMessage>
    </div>
</template>