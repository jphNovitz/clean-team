<script setup>
import { trans } from "matice";

defineProps({
    value: String,
});
</script>

<template>

    <label class="block font-medium text-sm text-gray-700 dark:text-white-custom">
        <span v-if="value">{{ trans(value) }}</span>
        <span v-else><slot /></span>
    </label>
</template>
