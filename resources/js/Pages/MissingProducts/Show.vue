<script setup>
import { ref, watch, reactive, computed } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue';
import JetActionSection from '@/Components/ActionSection.vue';
import JetModal from '@/Components/Modal.vue';
import JournalLine from '@/Pages/MissingProducts/Partials/JournalLine.vue'
import ProductLine from '@/Pages/MissingProducts/Partials/ProductLine.vue'
import ProductManager from '@/Pages/MissingProducts/Partials/ProductManager.vue'
import { Inertia } from '@inertiajs/inertia';

import { usePage, Link } from '@inertiajs/inertia-vue3'
import { trans } from "matice";
import Button from '@/Components/Button.vue';
import Header2 from '@/Components/Titles/Header2.vue'
import { EllipsisVerticalIcon } from '@heroicons/vue/20/solid'
import { Cog6ToothIcon } from '@heroicons/vue/20/solid'
import { PlusIcon } from '@heroicons/vue/20/solid'
import Modal from '@/Components/Modal.vue';

// const journal = usePage().props.value.journal
// const products = usePage().props.value.initialProducts
const showConsumable = ref(false)
const showLinens = ref(true)
const showOddColor = ref(false)
const showManager = ref(false)
const showSecondaryMenu = ref(false)
var showAddModal = ref(false)
var state = reactive({ 
    available: [],
    products: usePage().props.value.initialProducts
})

function typeID(productID) {
    return state.products.filter(product => product.id == productID)[0].type_id
}

function showComponent(productID) {
    // if(usePage().props.value.journal.length === 1) return true
    switch (state.products.filter(product => product.id == productID)[0].type_id) {
        case 1:
            return showLinens.value
        case 2:
            return showConsumable.value
    }
}

function toggleManger() {
    if (showManager) showManager = false
    else showManager = false
}

function loadModal() {
        axios
            .get(route('products_not_in_journal'))
            .then(response => {
                state.available = response.data
            })
}
function reportAndRedirect(){
    setTimeout(function(){
        Inertia.visit(route('missing_products'));
    }, 2000);
}

// watch(showAddModal, async () => {
//     if (showAddModal)
//     alert()
//         axios
//             .get(route('products_not_in_journal'))
//             .then(response => {
//                 state.available = response.data
//             })
// })

function addProductToJournal(id) {
    // axios
    //     .put(route('add_product_in_journal'), {'id': id})
    //     .then(response => {
    //         if(response.status === 200){
    //            Inertia.reload({ only: ['products']})
    //         }
    //         })
    Inertia.put(route('add_product_in_journal'), { 'id': id }, {
        preserveScroll: true,
        resetOnSuccess: false,
        onSuccess: () => {
            console.log('success')
        }
    })
    showAddModal = false
}


watch([showConsumable, showLinens], async () => showOddColor.value = (showConsumable.value === showLinens.value))


</script>
    
<template>
    <AppLayout title="Produits manquants">

        <template #header>
            <div style=" position: relative">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Products
                </h2>
                <div class="absolute right-5 top-0 text-gray-800 flex w-7 h-7 overflow-hidden justify-end md:w-max md:h-auto "
                    :class="{'w-max h-max flex-col-inverse' : showSecondaryMenu}">
                    <button class="inline-block" @click.prevent="showManager = !showManager">
                        <Cog6ToothIcon class="w-4 inline" />
                        Product_Manger
                    </button>

                    <a  href="missing/archives" class="inline-block">
                        Report
                    </a>
                    <button class="inline-block" @click.prevent="showSecondaryMenu = !showSecondaryMenu">
                        <EllipsisVerticalIcon class="w-5 " />
                    </button>
                </div>
            </div>
        </template>

        <div>
            <Transition>
                <ProductManager v-if="showManager" />
            </Transition>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <JetActionSection class="mt-10 sm:mt-0">
                    <template #title>
                        Missing Products <div class="flex justify-center"> 
                        </div>
                    </template>

                    <template #description>
                        Signale les produits manquants
                    </template>

                    <template #content>
                        <div class="flex justify-start my-4">
                            <label for="default-consumable" class="inline-flex relative items-center cursor-pointer">
                                <input type="checkbox" value="" id="default-consumable" v-model="showConsumable"
                                    class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-indigo-600">Afficher
                                    Produits</span>
                            </label>
                            <label for="default-linens" class="inline-flex relative items-center cursor-pointer">
                                <input type="checkbox" value="" id="default-linens" v-model="showLinens"
                                    class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-indigo-600">Afficher
                                    Linge</span>
                            </label>
                            <Button class="rounded-full" @click.prevent="showAddModal = !showAddModal, loadModal()">
                                <PlusIcon class="w-4" />
                            </Button>
                        </div>
                        <div
                            class="hidden w-full items-center md:grid md:grid-cols-12 gap-6 bg-indigo-200 text-indigo-900 py-2 px-2">
                            <div class="md:col-span-5">Nom </div>
                            <div class="md:col-span-2"> </div>
                            <div class="md:col-span-1"> </div>
                            <!-- <div class="hidden 2xl:grid 2xl:col-span-2"> Création </div> -->
                            <div class="hidden md:grid md:col-span-2"> Modification </div>
                        </div>
                        <div v-for="line in $page.props.journal" :key="line.id"
                            class="flex items-center justify-between transition-colors ease-in-out delay-150 duration-1000"
                            :class="{'odd:bg-indigo-50' : showOddColor}">
                            <JournalLine :line="line" v-if="showComponent(line.product_id)" />
                        </div>
                    </template>

                </JetActionSection>

            </div>

        </div>
         <!-- MODAL : list of products available to add - create journal line with -->
        <JetModal :show='showAddModal'>
            <div class="p-5">
                <Header2 class="pb-5">Add_product</Header2>
                <div v-if="state.available" class="grid grid-cols-3" v-for="product in state.available">
                    <div class="col-span-2 p-3">{{product.name}} ({{product.id}})</div>
                    <div class="p-3"><Button
                            @click.prevent="addProductToJournal(product.id), showAddModal = !showAddModal">app.add</Button>
                    </div>

                </div>
                <div v-else>
                    Loading
                </div>
            </div>
        </JetModal>
    </AppLayout>
</template>