<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import Container from '../../Components/Container.vue';
import Title from '../../Components/Title.vue';
import InputField from '../../Components/InputField.vue';
import PrimaryBtn from '../../Components/PrimaryBtn.vue';
import TextArea from '../../Components/TextArea.vue';
import ImageUpload from '../../Components/ImageUpload.vue';
import ErrorMessages from '../../Components/ErrorMessages.vue';


const form = useForm({
    title: null,
    desc: null,
    tags: null,
    email: null,
    link: null,
    image: null,
    
})
</script>

<template>
    <Head title="- New Listing"/>

    <Container>
        <div class="mb-6">
            <Title>Create a new Listing</Title>
        </div>

        <ErrorMessages :errors="form.errors"/>

        <form 
            class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 sm:pl-2 gap-4"
            @submit.prevent="form.post(route('listing.store'))"
        >
            <div class="space-y-6">
                <InputField
                    label="Title"
                    icon="heading"
                    placeholder="My new listing"
                    v-model="form.title"
                />
                <InputField
                    label="Tags (separate with comma)"
                    icon="tags"
                    placeholder="one, two, three"
                    v-model="form.tags"
                />
                <TextArea
                    label="Description"
                    icon="newspaper"
                    placeholder="This is my listing description"
                    v-model="form.desc"
                
                />
            </div>
            <div class="space-y-6">
                <InputField
                    label="Email"
                    icon="at"
                    placeholder="example@email.com"
                    v-model="form.email"
                />
                <InputField
                    label="External Link"
                    icon="up-right-from-square"
                    placeholder="https://example.com"
                    v-model="form.link"
                />

                <ImageUpload @image="(e) => (form.image = e)"
                />
            </div>
            <div>
                <PrimaryBtn :disabled="form.processing">Create</PrimaryBtn>
            </div>
        </form>
    </Container>
</template>