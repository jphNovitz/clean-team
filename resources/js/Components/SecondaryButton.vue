<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 m-1 bg-transparent  text-tertiary dark:text-white-custom p-2 ring-2 ring-offset-1 ring-tertiary  rounded-sm font-semibold text-xs uppercase tracking-widest hover:bg-red-100  hover:text-tertiary active:text-white-custom active:bg-red-300 focus-visible:none focus:text-tertiary focus:outline-none focus:ring focus:ring-gray-300 dark:hover:bg-gray-700 dark:hover:text-white-custom dark:focus:bg-gray-800 dark:focus:text-tertiary border-0 border-tertiary dark:ring-gray-700 focus:border-0 focus:ring-offset-transparent dark:focus:ring-tertiary disabled:opacity-25 transition mx-3 ">
        <slot />
    </button>
</template>
