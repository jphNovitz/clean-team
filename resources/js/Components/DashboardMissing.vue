<script setup>
import {trans} from "matice";


defineProps({
  missingProducts: Number
});
</script>
<template>
  <div class="p-12 text-paragraph bg-white-custom dark:bg-smoky-black ">
    <div v-if="missingProducts < 1">
      <p>Il ne te manque rien pour faire du bon travail, ni produit, ni linge ... super !
      <br />ou alors tu as oublié de le noter ici.
      </p>
    </div>
  </div>
</template>