<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import JetActionSection from '@/Components/ActionSection.vue';
import JetConfirmationModal from '@/Components/ConfirmationModal.vue';
import JetDangerButton from '@/Components/DangerButton.vue';
import JetSecondaryButton from '@/Components/SecondaryButton.vue';

const props = defineProps({
    team: Object,
});

const confirmingTeamDeletion = ref(false);
const form = useForm();

const confirmTeamDeletion = () => {
    confirmingTeamDeletion.value = true;
};

const deleteTeam = () => {
    form.delete(route('teams.destroy', props.team), {
        errorBag: 'deleteTeam',
    });
};
</script>

<template>
    <JetActionSection>
        <template #title>
            {{trans('profile.Delete_Team')}}
        </template>

        <template #description>
            {{trans('profile.Delete_team_description')}}
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                 {{trans('profile.Delete_team_confirm_once')}}.
            </div>

            <div class="mt-5">
                <JetDangerButton @click="confirmTeamDeletion">
                     {{trans('profile.Delete_Team')}}
                </JetDangerButton>
            </div>

            <!-- Delete Team Confirmation Modal -->
            <JetConfirmationModal :show="confirmingTeamDeletion" @close="confirmingTeamDeletion = false">
                <template #title>
                    {{trans('profile.Delete_Team')}}
                </template>

                <template #content>
                     {{trans('profile.Delete_team_confirm_sure')}}.
                </template>

                <template #footer>
                    <JetSecondaryButton @click="confirmingTeamDeletion = false">
                       {{trans('btn.Cancel')}}
                    </JetSecondaryButton>

                    <JetDangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteTeam"
                    >
                         {{trans('profile.Delete_Team')}}
                    </JetDangerButton>
                </template>
            </JetConfirmationModal>
        </template>
    </JetActionSection>
</template>
