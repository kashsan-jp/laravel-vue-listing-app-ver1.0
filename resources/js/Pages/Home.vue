<script setup>
import { router, useForm } from '@inertiajs/vue3';
import Card from '../Components/Card.vue';
import InputField from '../Components/InputField.vue';
import PaginationLinks from '../Components/PaginationLinks.vue';

const params = route().params;

const props = defineProps({
    listings: Object,
    user: Object,
    canModify: Boolean,
    searchTerm: String
});

const username = params.user_id ? props.listings.data.find(
    i => i.user_id === Number(params.user_id)).user.name 
    : null;

const form = useForm({
    search: props.searchTerm,
});

const search = () => {
    router.get(route('home'), { 
        search: form.search, 
        user_id: params.user_id,
        tag:params.tag
    });
}


</script>

<template>
    <Head title="- Latest Listing"/>
    <div class="bg-white rounded-lg py-2 text-center mb-2 dark:bg-slate-800 ">
        <h1 class="text-xl text-red-700 dark:text-green-400 mb-2">
            W-Sentos 開発者専用ブログ
        </h1>
        <p class="mb-5 test-sm text-black dark:text-white" v-if="!$page.props.auth.user">
            記事の内容をご覧になるには<br>メンバー登録をお願い致します🤗
        </p>
    </div>
    <div class="flex-column items-center justify-between mb-4 ">
        
        <div class="flex items-center gap-2 mb-5">
            <Link 
                class="
                    px-2 py-1 rounded-md bg-indigo-500 
                    text-white flex items-center gap-2"
                v-if="params.tag" :href="route('home',{ 
                ...params, tag: null, page: null})"
            >
                {{ params.tag }}
                <i class="fa-solid fa-xmark"></i>
            </Link>
            <Link 
                class="
                    px-2 py-1 rounded-md bg-indigo-500 
                    text-white flex items-center gap-2"
                v-if="params.search" :href="route('home',{ 
                ...params, search: null, page: null})"
            >
                {{ params.search }}
                <i class="fa-solid fa-xmark"></i>
            </Link>
            <Link 
                class="
                    px-2 py-1 rounded-md bg-indigo-500 
                    text-white flex items-center gap-2"
                v-if="params.user_id" :href="route('home',{ 
                ...params, user_id: null, page: null})"
            >
                {{ username }}
                <i class="fa-solid fa-xmark"></i>
            </Link>
        </div>

        <div class="lg:w-1/4  sm:w-1/4 mb-10 ">
            <form @submit.prevent="search">
                <InputField
                    type="search"
                    label=""
                    icon="magnifying-glass"
                    placeholder="Search..."
                    v-model="form.search"
                    class="lg:w-60 md:w-50 sm:w-30"
                />
            </form>
        </div>
    
    </div>

    <div v-if="Object.keys(listings.data).length">

        <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 sm:pl-2 gap-4">
            <div v-for="listing in listings.data" :key="listing.id">
               <Card :listing="listing"/>
            </div>
        </div>
        <div class="flex justify-between">
            <div class="mt-8">
            <PaginationLinks :paginator="listings"/>
            </div>
            <Link href="details" class="my-10 test-sm text-green-700 dark:text-orange-500">
                管理者開発ノート
            </Link>
        </div>
        
    </div>

    <div v-else>
        There are no listings
    </div>
    

</template>