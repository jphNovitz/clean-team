<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    active: Boolean,
    href: String,
    as: String,
});

const classes = computed(() => {
    return props.active
        ? 'block pl-3 pr-4 py-2 border-l-4 border-tertiary text-base font-medium text-main   focus:outline-none focus:text-smoky-black focus:bg-tertiary focus:border-red-600 transition'
        : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-paragraph dark:text-white-custom hover:text-headline hover:bg-gray-50  dark:hover:bg-gray-500 dark:hover:text-main hover:border-main focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition';
});
</script>

<template>
    <div>
        <button v-if="as === 'button'" :class="classes" class="w-full text-left">
            <slot />
        </button>

        <Link v-else :href="href" :class="classes">
            <slot />
        </Link>
    </div>
</template>
