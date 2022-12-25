<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import Missing from '@/Components/DashboardMissing.vue';
import { trans } from "matice";


defineProps({
  missingProducts: Number
});

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800  dark:text-main leading-tight">
              {{ trans('app.Dashboard') }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Welcome />
                  <Missing :missingProducts="missingProducts" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
