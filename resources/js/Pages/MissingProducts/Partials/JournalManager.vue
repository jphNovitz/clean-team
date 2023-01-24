<script setup>
import { ref, watch } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { reactive } from 'vue'
import { trans } from "matice";
import Button from '@/Components/Button.vue';
import {PlusIcon } from '@heroicons/vue/20/solid'

import JournalLine from '@/Pages/MissingProducts/Partials/JournalLine.vue'


// const products = usePage().props.value.initialProducts
const showConsumable = ref(false)
const showLinens = ref(true)
const showOddColor = ref(false)
const showAddProductForm = ref(false)
const showManager = ref(false)
const showSecondaryMenu = ref(false)
defineEmits(['showAddModal'])
var state = reactive({
    available: [],
    products: usePage().props.value.initialProducts
})

function reportAndRedirect() {
    setTimeout(function () {
        Inertia.visit(route('missing_products'));
    }, 2000);
}

function showComponent(productID) {
    // if(usePage().props.value.journal.length === 1) return true
    switch (state.products.filter(product => product.id === productID)[0].type_id) {
        case 1:
            return showLinens.value
        case 2:
            return showConsumable.value
    }
}

watch([showConsumable, showLinens], async () => showOddColor.value = (showConsumable.value === showLinens.value))

</script>

<template>
    <div class="w-full flex justify-between my-4">
        <label for="default-consumable" class="inline-flex relative items-center cursor-pointer">
            <input type="checkbox" value="" id="default-consumable" v-model="showConsumable" class="sr-only peer">
            <span
                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-tertiary  rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:bg-red-50 peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white-custom dark:after:bg-tertiary after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-100 peer-checked:bg-tertiary">
            </span>
            <span class="ml-3 text-sm font-medium text-headline dark:text-main">
                {{ trans('btn.Display_Products') }}
            </span>
        </label>
        <label for="default-linens" class="inline-flex relative items-center cursor-pointer">
            <input type="checkbox" value="" id="default-linens" v-model="showLinens" class="sr-only peer">
            <div
                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-tertiary  rounded-full peer  peer-checked:after:translate-x-full peer-checked:after:bg-red-50 peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white-custom dark:after:bg-tertiary after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-100 peer-checked:bg-tertiary">
            </div>
            <span class="ml-3 text-sm font-medium text-headline dark:text-main">
                {{ trans('btn.Display_Linens') }}
            </span>
        </label>
        <Button class="" @click.prevent="$emit('showAddModal')" >
            <PlusIcon class="w-4 md:hidden" />
            <span class="hidden md:inline-block text-xs">
                +1 {{trans('app.product')}}
            </span>
        </Button>
    </div>
    <div class="w-full flex md:table md:w-full md:border-collapse rounded-sm border-b shadow-xl overflow-hidden p-0 ">
        <div class="hidden md:table-header-group bg-main text-headline dark:bg-gray-700 dark:text-main">
            <div class="md:table-row ">
                <div class="table-cell w-5/12 md:px-5 md:py-3">{{ trans('auth.Name') }}</div>
                <div class="table-cell w-1/12 md:px-5 md:py-3"> {{ trans('app.Qty') }} </div>
                <div class="table-cell w-2/12 md:px-5 md:py-3"> &nbsp; &nbsp; </div>
                <div class="table-cell w-2/12 md:px-5 md:py-3"> &nbsp; &nbsp; </div>
                <div class="table-cell w-1/12 md:px-5 md:py-3"> &nbsp; &nbsp; </div>
            </div>
        </div>
        <div class="w-full flex flex-col md:table-row-group">
            <div v-if="$page.props.journal.length < 1" class="flex text-gray-700 dark:text-white-custom  p-6">
              {{trans('app.No_item')}}
            </div>
            <div v-for="line in $page.props.journal" :key="line.id"
                class="grid grid-cols-3 gap-4 text-xl border-t-2  border-t-gray-200 border-b-2 border-b-gray-200 md:table-row transition-colors ease-in-out delay-150 duration-1000"
                :class="{ 'odd:bg-main dark:odd:bg-gray-700': showOddColor, 'border-l-2 border-gray-400 rounded-l-md': line.product.type_id === 1 }, { 'border-l-2 border-tertiary rounded-l-md': line.product.type_id === 2 }">
                <JournalLine :line="line" v-if="showComponent(line.product_id)" />
            </div>
        </div>
    </div>
</template>