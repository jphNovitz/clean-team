<script setup>
import { ref } from 'vue'
import {trans} from "matice";
import JetActionSection from '@/Components/ActionSection.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

import ProductLine from '@/Pages/MissingProducts/Partials/ProductLine.vue'
import CreateProduct from '@/Pages/MissingProducts/Partials/CreateProduct.vue'


// const products = usePage().props.value.initialProducts
const showConsumable = ref(false)
const showLinens = ref(true)
const showOddColor = ref(true)
const showAddProductForm = ref(false)

</script>

<template>
  <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <JetActionSection class="mt-10 sm:mt-0">
      <template #title>
        Product Manager
      </template>

      <template #description>
        Gerer les produits
      </template>

      <template #content>

        <SecondaryButton class="mb-5" @click.prevent="showAddProductForm = !showAddProductForm">
          <span v-if="showAddProductForm">{{ trans('btn.Cancel') }}</span>
          <span v-else-if="showAddProductForm">{{ trans('app.Add_product') }}</span>
        </SecondaryButton>

        <CreateProduct v-if="showAddProductForm"/>
        <div class="w-full flex md:table md:w-full md:border-collapse rounded-sm border-b shadow-xl overflow-hidden p-0 ">
          <div class="hidden md:table-header-group bg-main text-headline dark:bg-gray-700 dark:text-main">
            <div class="md:table-row ">
              <div class="table-cell w-5/12 md:px-5 md:py-3">{{ trans('auth.name') }}</div>
              <div class="table-cell w-2/12 md:px-5 md:py-3"> Type</div>
              <div class="table-cell w-1/12 md:px-5 md:py-3">Défaut</div>
              <div class="table-cell w-2/12 md:px-5 md:py-3"> &nbsp; &nbsp;</div>
              <div class="table-cell w-2/12 md:px-5 md:py-3"> &nbsp; &nbsp;</div>
            </div>
          </div>
          <div class="w-full flex flex-col md:table-row-group">
            <div v-for="product in $page.props.initialProducts" :key="product.id"
                 class="grid grid-cols-3 gap-4 text-xl border-t-2  border-t-gray-200 border-b-2 border-b-gray-200 md:table-row transition-colors ease-in-out delay-150 duration-1000"
                 :class="{'odd:bg-main dark:odd:bg-gray-700' : showOddColor, 'border-l-2 border-gray-400 rounded-l-md' : product.type_id === 1}, {'border-l-2 border-tertiary rounded-l-md' : product.type_id === 2}">
              <ProductLine :product="product"/>
            </div>
          </div>
        </div>

      </template>

    </JetActionSection>
  </div>
</template>