<script setup>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia';

import { usePage, Link } from '@inertiajs/inertia-vue3'
import { trans } from "matice";
import Button from '@/Components/Button.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Header2 from '@/Components/Titles/Header2.vue'
import { FolderArrowDownIcon, PaperAirplaneIcon } from '@heroicons/vue/20/solid'
import { Cog6ToothIcon } from '@heroicons/vue/20/solid'
import { PlusIcon } from '@heroicons/vue/20/solid'
import Modal from '@/Components/Modal.vue';
import moment from 'moment-with-locales-es6';
moment.locale('fr')

const props = defineProps([
    'item'
])
const state = reactive({
  current_team: usePage().props.value.current_team
})

function archiveToPdf(id) {
    console.log(id)
    Inertia.visit(route('missing_archive_pdf', { 'id': id }));
}
</script>

<template>
    <div class="grid grid-cols-2">
        <div class="col-span-2">
            <!-- {{Date.parse(item.name)}} -->
            {{ moment(Date.parse(item.name)).format("Do MMMM YYYY") }}
            <!-- {{item.name}} -->
        </div>
        <div class="p-1">
            <Link :href="route('email_report_archive', {'id': item.id})" :disabled="!state.current_team.contact_email">
            <Button class="w-full justify-center" :disabled="!state.current_team.contact_email">
                <PaperAirplaneIcon class="w-5 mr-2 " />
                <span class="hidden md:inline text-xs">
                    {{trans('btn.send')}}
                </span>
            </Button>
        </Link>
        </div>
        <div class="p-1">
            <a v-bind:href="'/missing/archive/pdf/' + item.id">
            <SecondaryButton class="w-full justify-center" >
                <FolderArrowDownIcon class="w-5 mr-2" />
                <span class="hidden md:inline text-xs">
                    {{trans('btn.Download')}}
                </span>
            </SecondaryButton>
            </a>
            
        </div>

    </div>
</template>