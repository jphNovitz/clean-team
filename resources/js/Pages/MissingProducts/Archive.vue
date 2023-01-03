<script setup>
import { ref, reactive } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue';
import JetActionSection from '@/Components/ActionSection.vue';
import JetModal from '@/Components/Modal.vue';
import ArchiveItem from '@/Pages/MissingProducts/Partials//Archive/ArchiveItem.vue'
import AvailableReport from '@/Pages/MissingProducts/Partials//Archive/ReportAvailable.vue'

import { usePage } from '@inertiajs/inertia-vue3'
import { trans } from "matice";
import Header2 from '@/Components/Titles/Header2.vue'
// import { EllipsisVerticalIcon } from '@heroicons/vue/20/solid'
// import { Cog6ToothIcon } from '@heroicons/vue/20/solid'

const showSecondaryMenu = ref(false)
var showAddModal = ref(false)

const props = defineProps([
    'archive'
])

var state = reactive({
    available: [],
    products: usePage().props.value.initialProducts
})


</script>
    
<template>
    <AppLayout title="Produits manquants">

        <template #header>
            <div style=" position: relative">
                <Header2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Archives
                </Header2>
<!--                <div class="absolute right-5 top-0 text-gray-800 flex w-7 h-7 overflow-hidden justify-end md:w-max md:h-auto "-->
<!--                    :class="{'w-max h-max flex-col-inverse' : showSecondaryMenu}">-->
<!--                    <button class="inline-block" @click.prevent="showManager = !showManager">-->
<!--                        <Cog6ToothIcon class="w-4 inline" />-->
<!--                        Archives-->
<!--                    </button>-->

<!--                    <a href="missing/report" class="inline-block" @click="reportAndRedirect">-->
<!--                        Report-->
<!--                    </a>-->
<!--                    <button class="inline-block" @click.prevent="showSecondaryMenu = !showSecondaryMenu">-->
<!--                        <EllipsisVerticalIcon class="w-5 " />-->
<!--                    </button>-->
<!--                </div>-->
            </div>
        </template>

<!--        <div>-->
<!--            <Transition>-->
<!--                <ProductManager v-if="showManager" />-->
<!--            </Transition>-->
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <JetActionSection class="mt-10 sm:mt-0">
                    <template #title>
                      {{trans('app.Missing_products_archives')}}
                    </template>

                    <template #description>
                      {{trans('app.Missing_products_archives_description')}}
                    </template>

                    <template #content>

<AvailableReport />

                        <div class="grid grid-cols-2 md:grid-cols-2  gap-5 justify-start my-4">
                           
                            <ArchiveItem v-for="item in archive"  :item="item" />
                           
                        </div>
                    </template>

                </JetActionSection>

            </div>

<!--        </div>-->
        <!-- MODAL : list of products available to add - create journal line with -->
        <JetModal :show='showAddModal'>
            <div class="p-5">
                <Header2 class="pb-5">Lorem</Header2>
            </div>
        </JetModal>
    </AppLayout>
</template>