<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-sky-custom  border-2 border-sky-600 rounded-md font-semibold text-xs text-white-custom uppercase tracking-widest hover:bg-cyan-500 active:bg-cyan-800 focus:outline-none focus:border-gray-custom focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
        <slot />
    </button>
</template>
