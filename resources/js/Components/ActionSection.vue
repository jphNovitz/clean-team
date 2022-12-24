<script setup>
import JetSectionTitle from './SectionTitle.vue';
</script>

<template>
    <div class="md:grid md:grid-cols-4 md:gap-5">
        <JetSectionTitle>
            <template #title>
              <span class=" text-headline dark:text-main">
                <slot name="title" />
              </span>
            </template>
            <template #description>
                <slot name="description" />
            </template>
        </JetSectionTitle>

        <div class="mt-5 md:mt-0 md:col-span-3">
            <div class="px-4 py-5 sm:p-6 bg-white shadow sm:rounded-lg  bg-white-custom dark:bg-smoky-black">
                <slot name="content" />
            </div>
        </div>
    </div>
</template>
