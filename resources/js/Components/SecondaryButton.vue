<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-transparent  text-headline dark:text-white-custom border-2 border-headline dark:border-white-custom rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-headline  hover:text-main active:bg-cyan-800 focus:outline-none focus:border-gray-custom focus:ring focus:ring-gray-300 disabled:opacity-25 transition mx-3">
        <slot />
    </button>
</template>
