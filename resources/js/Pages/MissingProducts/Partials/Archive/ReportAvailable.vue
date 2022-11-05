<script setup>

import { Inertia } from '@inertiajs/inertia';
import { ref, watch, reactive, computed, onMounted } from 'vue'
import { trans } from "matice"
import Button from '@/Components/Button.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import { FolderArrowDownIcon, PaperAirplaneIcon } from '@heroicons/vue/20/solid'

const state = reactive({
    available_lines: 0
})

function getAvailableCount() {
    axios
        .get(route('missing_report_available'))
        .then(response => {
            // console.log(response.data)
            state.available_lines = response.data
        })
}

function reload() {
    
    setTimeout(function(){
        Inertia.visit(route('missing_archives'));
    }, 2000);
    
}
onMounted(() => {
    getAvailableCount()
})



</script>

<template>
    <div class="mb-6 pb-6 border-b-2 border-b-slate-400">
        <div v-if="state.available_lines">
            <p>{{ trans('report.Available_message')}} ({{state.available_lines}} {{ trans('report.products')}})</p>
            <div class="w-1/2 grid grid-cols-2">
                <div class="p-1">
                    <a :href="route('email_report')" >
                    <Button class="w-full justify-center">
                        <PaperAirplaneIcon class="w-5 mr-2 " />
                        <span class="hidden md:inline text-xs">
                            {{trans('btn.send')}}
                        </span>
                    </Button>
                </a>
                </div>
                <div class="p-1">
                    <a href="/missing/report" >
                        <SecondaryButton class="w-full justify-center" @click="reload()">
                            <FolderArrowDownIcon class="w-5 mr-2" />
                            <span class="hidden md:inline text-xs">
                                {{trans('btn.Download')}}
                            </span>
                        </SecondaryButton>
                    </a>

                </div>
            </div>

        </div>
        <div v-else>
            <p>{{ trans('report.Not_available_message') }}</p>

        </div>
    </div>
</template>