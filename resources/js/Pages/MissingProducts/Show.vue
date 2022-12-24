<script setup>
import {ref, reactive} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue';
import JetActionSection from '@/Components/ActionSection.vue';
import JetModal from '@/Components/Modal.vue';
import JournalManager from '@/Pages/MissingProducts/Partials/JournalManager.vue'
import ProductManager from '@/Pages/MissingProducts/Partials/ProductManager.vue'
import {Inertia} from '@inertiajs/inertia';

import { usePage } from '@inertiajs/inertia-vue3'
import {trans} from "matice";
import Button from '@/Components/Button.vue';
import Header2 from '@/Components/Titles/Header2.vue'
import {EllipsisVerticalIcon, Cog6ToothIcon, PencilSquareIcon} from '@heroicons/vue/20/solid'

// const showConsumable = ref(false)
// const showLinens = ref(true)
// const showOddColor = ref(false)
const showManager = ref(false)
const showSecondaryMenu = ref(false)
var showAddModal = ref(false)
var state = reactive({
  available: [],
  products: usePage().props.value.initialProducts
})

function typeID(productID) {
  return state.products.filter(product => product.id === productID)[0].type_id
}

function loadModal() {
  axios
      .get(route('products_not_in_journal'))
      .then(response => {
        state.available = response.data
      })
}

function addProductToJournal(id) {
  Inertia.put(route('add_product_in_journal'), {'id': id}, {
    preserveScroll: true,
    resetOnSuccess: false,
    onSuccess: () => {
      console.log('success')
    }
  })
  showAddModal = false
}


// watch([showConsumable, showLinens], async () => showOddColor.value = (showConsumable.value === showLinens.value))


</script>

<template>
  <AppLayout title="Produits manquants">

    <template #header>
      <div style=" position: relative">
        <Header2>
          {{ trans('app.Products') }}
        </Header2>
        <div
            class="absolute right-5 top-0 text-gray-800 flex w-7 h-7 overflow-hidden justify-end  md:w-max md:h-auto  md:flex-row items-start "
            :class="{ 'w-max h-max flex-col-reverse bg-slate-50 border border-gray-200 rounded-lg': showSecondaryMenu }">
          <button class="inline-block w-full md:w-auto px-3 py-3 md:py-0 dark:text-white-custom"
                  @click.prevent="showManager = !showManager">
            <Cog6ToothIcon class="w-4 inline"/>
            {{ trans('btn.Product_Manager') }}
          </button>

          <a href="missing/archives" class="inline-block  w-full md:w-auto px-3 py-3 md:py-0 dark:text-white-custom">
            <PencilSquareIcon class="w-4 inline"/>
            {{ trans('btn.Report') }}
          </a>
          <button class="inline-block  self-end md:hidden px-3 py-1 md:py-0 dark:text-white-custom"
                  @click.prevent="showSecondaryMenu = !showSecondaryMenu">
            <EllipsisVerticalIcon class="w-5 "/>
          </button>
        </div>
      </div>
    </template>

    <div>
      <Transition>
        <ProductManager v-if="showManager"/>
      </Transition>
      <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <JetActionSection class="mt-10 sm:mt-0">
          <template #title>
            {{ trans('app.Missing_Products') }}
          </template>

          <template #description>
            {{ trans('app.Missing_products_description') }}
          </template>

          <template #content>
            <JournalManager @show-add-modal="showAddModal = !showAddModal; loadModal()"/>
          </template>

        </JetActionSection>

      </div>

    </div>
    <!-- MODAL : list of products available to add - create journal line with -->
    <JetModal :show='showAddModal'>
      <div class="p-5">
        <Header2 class="pb-5">Add_product</Header2>
        <div v-if="state.available" class="grid grid-cols-3" v-for="product in state.available">
          <div class="col-span-2 p-3">{{ product.name }} ({{ product.id }})</div>
          <div class="p-3">
            <Button
                @click.prevent="addProductToJournal(product.id); showAddModal = !showAddModal">app.add
            </Button>
          </div>

        </div>
        <div v-else>
          Loading
        </div>
      </div>
    </JetModal>
  </AppLayout>
</template>