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
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Header2 from '@/Components/Titles/Header2.vue'
import { EllipsisVerticalIcon } from '@heroicons/vue/20/solid'
import { FolderArrowDownIcon, PaperAirplaneIcon } from '@heroicons/vue/20/solid'
import { Cog6ToothIcon } from '@heroicons/vue/20/solid'
import { PlusIcon } from '@heroicons/vue/20/solid'
import Modal from '@/Components/Modal.vue';
import moment from 'moment-with-locales-es6';
moment.locale('fr')

const props = defineProps([
    'item'
])
</script>

<template>
    <div class="grid grid-cols-2">
        <div class="col-span-2">
            <!-- {{Date.parse(item.name)}} -->
            {{ moment(Date.parse(item.name)).format("Do MMMM YYYY") }}
            <!-- {{item.name}} -->
        </div>
        <div class="p-1">
            <Button class="w-full justify-center">
                <PaperAirplaneIcon class="w-5 mr-2 " />
                <span class="hidden md:inline text-xs">
                    {{trans('btn.send')}}
                </span>
            </Button>
        </div>
        <div class="p-1">
            <SecondaryButton class="w-full justify-center">
                <FolderArrowDownIcon class="w-5 mr-2" />
                <span class="hidden md:inline text-xs">
                    {{trans('btn.Download')}}
                </span>
            </SecondaryButton>
        </div>

    </div>
</template>