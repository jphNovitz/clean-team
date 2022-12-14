<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { trans } from "matice";
import Button from '@/Components/Button.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Header1 from '@/Components/Titles/Header1.vue';
import Header2 from '@/Components/Titles/Header2.vue';
import Header3 from '@/Components/Titles/Header3.vue';



defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>

    <Head title="Les Cleaneuses" />

    <!-- <div class="flex flex-col items-start justify-end   sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden  px-6 py-4 sm:block">
            <Link v-if="$page.props.user" :href="route('dashboard')"
                class="text-sm font-bold text-link-dark dark:text-gray-500 underline">{{ trans('app.Dashboard') }}
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm font-bold text-link-dark dark:text-gray-500 underline">
                {{ trans('auth.Login') }}</Link>

                <Link v-if="canRegister" :href="route('register')"
                    class="ml-4 text-sm font-bold text-link-dark dark:text-gray-500 underline">
                {{ trans('auth.Register') }}</Link>
            </template>
        </div>
    </div> -->

    <div
        class="flex flex-col md:flex-row w-full  bg-gradient-to-b from-white-custom to-main justify-start text-headline p-6">
        <div class="w-full md:w-2/3 ">
            <!-- <h1 class="font-black text-2xl mb-6"> -->
            <Header1>
                Les Cleaneuses
            </Header1>
            <Header2>
                "Les Cleaneuses" propose un outil est un outil utile pour les employés de l'industrie de
                l'hôtellerie, de l'horeca et de la restauration.
                Partout ou l'on nettoie, où il y a du linge, pour une personne seule ou pour une équipe.
            </Header2>
            <Header3>
                Grâce à cet outil, les hommes de ménage, femme de chambre, les employé.e.s ou toutes personnes
                polyvalentes peuvent travailler plus efficacement et offrir un service de meilleure qualité à leurs
                clients.
                <br />Comment ?
                <br />En signalant du materiel manquant (linge ou produit) ou des, en ayant des check listes
                <br />En utilisant "Les Cleaneuses", les employés peuvent également bénéficier d'une meilleure
                communication avec leur équipe et leur manager, ce qui peut contribuer à une meilleure expérience de
                travail pour tous.
            </Header3>
            <div class="flex justify-start py-12">
                <Button type="button">
                    {{ trans('auth.Register') }}
                </Button>
                <SecondaryButton>
                    {{ trans('auth.login') }}
                </SecondaryButton>
            </div>
        </div>
        <div class="w-full  md:w-1/3 p-12  md:pt-3 flex justify-center items-center ">
            <img src="../../css/images/cleaners_01.jpg" class="w-full" />
        </div>
    </div>

    <div class="w-full flex flex-col-reverse md:flex-row my-32">
        <div class="w-full flex items-center justify-center md:w-1/2 p-4">
            <img src="../../css/images/laundry.webp" alt="" class="md:w-72 md:h-72" />
        </div>
        <div class="w-full  md:w-1/2 p-12">
            <Header2> Linge et produits manquants</Header2>
            <p class="py-3">Permet à tous les membres d'une équipe de collaborer pour noter simplement tout produit
                manquant.</p>
            <p class="py-3">Que vous tombiez à cours de drap de lit ou de produit de nettoyage, vous l'écrivez avec cet
                outil.
                A tout moment, à la fin de la journée, de la semaine ou du mois, téléchargez un rapport sur votre
                téléphone
                ou envoyez directement un email à votre responsable.
            </p>
        </div>
    </div>
</template>
