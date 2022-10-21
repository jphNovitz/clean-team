<script setup>

import { computed } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { ref, watch } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { reactive } from 'vue'
import { trans } from "matice"
import { useForm } from '@inertiajs/inertia-vue3'

import JetActionMessage from '@/Components/ActionMessage.vue'
import JetLabel from '@/Components/Label.vue'
import JetInput from '@/Components/Input.vue'
import Checkbox from '@/Components/Checkbox.vue'
import Button from '@/Components/Button.vue'

const form = useForm({
    name: '',
    default: true,
    type_id: 1
})

const alert = reactive({
    message: '',
    success: false
})


watch(alert, async () => {
    if (alert.success) {
        setTimeout(function () {
            alert.message = '', alert.success = false
            // Inertia.visit('missing')
        }, 3000);

    }
})

function submit(){
    form.post(route('create_product'), {
          preserveScroll: true,
          onSuccess: () => {
            alert.success = true
        }
        })
}

</script>

<template>
    <div class="w-full my-5 flex flex-col gap-y-9">
        <div class="flex flex-col w-96">
            <JetLabel class="mb-2"> {{trans('auth.Name')}} </JetLabel>
            <JetInput v-model="form.name" type="text" id="name" name="name" />
        </div>
        <div class="flex flex-row">
            <div class="w-40">
                <JetLabel class="mb-2"> Type </JetLabel>
                <select v-model="form.type_id"
                    class="w-full md:text-sm md:p-0  rounded-md border-0  outline outline-offset-2 outline-1 outline-slate-00">
                    <option class="md:text-sm" value="1">Linge</option>
                    <option class="md:text-sm" value="2">Produit</option>
                </select>
            </div>
            <div class="w-40  ml-4">
                <JetLabel class="mb-2">Par Défaut </JetLabel>
                <Checkbox :checked="form.default" v-model="form.default" />
            </div>
        </div>
        <div class="flex flex-row">

            <div class="px-2 py-3 flex flex-col items-center justify-center  md:px-2 md:py-3 ">
                <Button type="submit" :disabled="form.processing" @click.prevent="submit">
                    Save
                </Button>
            </div>
            <div class="px-2 py-3 md:px-5 md:py-3"> 
                <JetActionMessage :on="alert.success"> {{trans('app.Saved')}}</JetActionMessage>

            </div>
        </div>
    </div>
</template>