<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { ArrowRightIcon } from '@heroicons/vue/20/solid'
import {trans} from "matice";

defineProps({
  missingProducts: Number
});
</script>
<template>
  <div class="p-12 text-paragraph bg-white-custom dark:bg-smoky-black text-white-custom">
    <div v-if="missingProducts < 1">
      <p>Il ne te manque rien pour faire du bon travail, ni produit, ni linge ... super !
      <br />ou alors tu as oublié de le noter <Link href="/missing"  class="text-tertiary">içi</Link>.
      </p>
    </div>
    <div v-else>
    <p>Tu as {{missingProducts}} produit.s ou linge.s dans ta liste.  Si tu le veux tu peux</p>
      <ul>
        <li class="pl-3"> <ArrowRightIcon class="w-3 inline-flex" /> <Link href="/missing" class="text-tertiary">Ajouter un élément </Link> mais s'il ne te manque rien c'est mieux ! </li>
        <li class="pl-3">  <ArrowRightIcon class="w-3 inline-flex"  /> <Link href="/missing/report" class="text-tertiary">Télécharger  </Link> ou <Link href="/missing/send/report" class="text-tertiary">envoyer  </Link> un rapport. </li>
      </ul>
    </div>
  </div>
</template>