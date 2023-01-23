<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-tertiary  text-white-custom dark:text-gray-900 dark:font-black dark:hover:bg-gray-700 dark:focus:bg-gray-800 dark:focus:text-tertiary dark:focus:ring-tertiary border-2 border-red-100 dark:border-gray-600 rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-red-100 hover:text-tertiary active:bg-red-200 focus:outline-none  focus:ring focus:ring-tertiary dark:focus:ring-gray-800 disabled:opacity-25 transition mx-3 ">
        <slot />
    </button>
</template>

<!--changed-->
<!--border-headline-->
<!--focus:border-red-300-->
