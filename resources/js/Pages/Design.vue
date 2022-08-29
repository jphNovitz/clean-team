<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import SectionTitle from '@/Components/SectionTitle.vue';
import Label from '@/Components/Label.vue';
import Input from '@/Components/Input.vue';
import Checkbox from '@/Components/Checkbox.vue';
import Button from '@/Components/Button.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import SuccessButton from '@/Components/SuccessButton.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import ActionSection from '@/Components/ActionSection.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import Header1 from '@/Components/Titles/Header1.vue';
import Header2 from '@/Components/Titles/Header2.vue';
import Header3 from '@/Components/Titles/Header3.vue';
import Header4 from '@/Components/Titles/Header4.vue';
import Header5 from '@/Components/Titles/Header5.vue';
import Header6 from '@/Components/Titles/Header6.vue';


import { trans } from "matice";
</script>

<template>
    <AppLayout title="Desgin System">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Design System
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <SectionTitle>
                    <template #title>Design System Page</template>
                    <template #description>Exemple of differents elements (SectionTitle)</template>

                </SectionTitle>
                <SectionBorder />
                <p>
                    <Label value="auth.Name" />
                    <Input type="text" />
                </p>
                <p>
                    <Checkbox></Checkbox>
                </p>
                <p>
                    <Button> Button </Button>
                    <SecondaryButton> SecondaryButton</SecondaryButton>
                    <DangerButton> Danger Button </DangerButton>
                    <SuccessButton> Success Button </SuccessButton>
                </p>

                <ActionSection>
                    <template #title> ActionSection</template>
                    <template #description> Description</template>
                    <template #content> Content</template>
                </ActionSection>
                 <div class="ml-3 relative w-12">
                    <Dropdown>
                        <template #trigger>
                            <button>click me</button>
                            </template>
                        <template #content>
                            <DropdownLink as="button"> as Button </DropdownLink>
                            <DropdownLink as="a"> as A </DropdownLink>
                            <DropdownLink> as A </DropdownLink>
                        </template>
                        
                    </Dropdown>
                </div>
                <div>
                   <NavLink href="#">Navlink</NavLink>
                </div>

                <Header1>Header h1</Header1>
                <Header2>Header h2</Header2>
                <Header3>Header h3</Header3>
                <Header4>Header h4</Header4>
                <Header5>Header h5</Header5>
                <Header6>Header h6</Header6>
            </div>



        </div>
    </AppLayout>
</template>