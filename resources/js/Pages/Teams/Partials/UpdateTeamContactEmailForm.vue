<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import JetActionMessage from '@/Components/ActionMessage.vue';
import JetButton from '@/Components/Button.vue';
import JetFormSection from '@/Components/FormSection.vue';
import JetInput from '@/Components/Input.vue';
import JetInputError from '@/Components/InputError.vue';
import JetLabel from '@/Components/Label.vue';
import { trans } from "matice";

const props = defineProps({
    team: Object,
    permissions: Object,
});

const form = useForm({
    contact_email: props.team.contact_email,
});

const updateTeamName = () => {
    form.put(route('teams.update_contact_email', props.team), {
        errorBag: 'updateTeamContactEmail',
        preserveScroll: true,
    });
};
</script>

<template>
    <JetFormSection @submitted="updateTeamName">
        <template #title>
            {{trans('team.Contact_email')}}
        </template>

        <template #description>
            {{trans('team.Contact_email_description')}}.
        </template>

        <template #form>
            <!-- Team Owner Information -->
            <!-- <div class="col-span-6"> -->
                <!-- <JetLabel value="team.Team_Contact" /> -->

                <!-- <div class="flex items-center mt-2"> -->
                    <!-- <img class="w-12 h-12 rounded-full object-cover" :src="team.owner.profile_photo_url" :alt="team.owner.name"> -->

                    <!-- <div class="ml-4 leading-tight">
                        <div>{{ team.owner.name }}</div>
                        <div class="text-gray-700 text-sm">
                            {{ team.owner.email }}
                        </div>
                    </div> -->
                <!-- </div> -->
            <!-- </div> -->

            <!-- Team Name -->
            <div class="col-span-6 sm:col-span-4">
                <JetLabel for="name" value="team.Contact_email" />

                <JetInput
                    id="name"
                    v-model="form.contact_email"
                    type="text"
                    class="mt-1 block w-full"
                    :disabled="! permissions.canUpdateTeam"
                />

                <JetInputError :message="form.errors.contact_email" class="mt-2" />
            </div>
        </template>

        <template v-if="permissions.canUpdateTeam" #actions>
            <JetActionMessage :on="form.recentlySuccessful" class="mr-3">
                {{trans('app.Saved')}}.
            </JetActionMessage>

            <JetButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                 {{trans('btn.Save')}}
            </JetButton>
        </template>
    </JetFormSection>
</template>
