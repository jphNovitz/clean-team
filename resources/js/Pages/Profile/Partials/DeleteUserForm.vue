<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import JetActionSection from '@/Components/ActionSection.vue';
import JetDialogModal from '@/Components/DialogModal.vue';
import JetDangerButton from '@/Components/DangerButton.vue';
import JetInput from '@/Components/Input.vue';
import JetInputError from '@/Components/InputError.vue';
import JetSecondaryButton from '@/Components/SecondaryButton.vue';
import { trans } from "matice"; 

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    setTimeout(() => passwordInput.value.focus(), 250);
};

const deleteUser = () => {
    form.delete(route('current-user.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <JetActionSection>
        <template #title>
            {{trans('profile.Delete_Account')}}
        </template>

        <template #description>
            {{trans('profile.Delete_account_perm')}}.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
               {{trans('profile.Delete_account_description')}}.
            </div>

            <div class="mt-5">
                <JetDangerButton @click="confirmUserDeletion">
                    {{trans('btn.Delete_Account')}}
                </JetDangerButton>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <JetDialogModal :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    {{trans('btn.Delete_Account')}}
                </template>

                <template #content>
                    {{trans('profile.Delete_account_confirm')}}.

                    <div class="mt-4">
                        <JetInput
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="Password"
                            @keyup.enter="deleteUser"
                        />

                        <JetInputError :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <JetSecondaryButton @click="closeModal">
                        {{trans('btn.Cancel')}}
                    </JetSecondaryButton>

                    <JetDangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        {{trans('btn.Delete_Account')}}
                    </JetDangerButton>
                </template>
            </JetDialogModal>
        </template>
    </JetActionSection>
</template>
