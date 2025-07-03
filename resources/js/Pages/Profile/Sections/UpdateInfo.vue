<script setup>
import { router, useForm } from '@inertiajs/vue3';
import Container from '../../../Components/Container.vue';
import InputField from '../../../Components/InputField.vue';
import PrimaryBtn from '../../../Components/PrimaryBtn.vue';
import Title from '../../../Components/Title.vue';
import ErrorMessages from '../../../Components/ErrorMessages.vue';
import SessionMessages from '../../../Components/SessionMessages.vue';

const props = defineProps({
    user: Object,
    status: String
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
});

const resendEmail = (e) => {
    router.post(
        route('verification.send'),
        {}, 
        {
        onStart: () => e.target.disabled = true,
        onFinish: () => e.target.disabled = false,
        }  
    );
};
</script>

<template>
    <Container class="mb-6">
        <div class="mb-6">
            <Title>Update Information</Title>
            <p>
                Update your account profile information and email address.
            </p>

            <ErrorMessages :errors="form.errors"/>

            <form 
                @submit.prevent="form.patch(route('profile.info'))"
                class="space-y-6"> 
                <InputField
                    label="Name"
                    icon="id-badge"
                    class="lg:w-1/2 sm:3/4"
                    v-model="form.name"
                />
                <InputField
                    label="Email"
                    icon="at"
                    class="lg:w-1/2 sm:3/4"
                    v-model="form.email"
                />

                <div 
                    
                    v-if="user.email_verified_at === null">

                    <SessionMessages :status="status"/>

                    <p>
                        Your email address is unverified
                        <button
                        @click="resendEmail"
                        class="text-indigo-500 disabled:text-slate-400 disabled:cursor-wait
                        font-medium underline dark:text-indigo-400 ">
                     Click here to re-send the verification email
                     </button>
                    </p>
                    
                </div>

                <PrimaryBtn :disabled="form.processing">
                    Save
                </PrimaryBtn>
            </form>
        </div>
    </Container>
</template>