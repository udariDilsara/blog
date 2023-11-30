<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreateForm from './Partials/CreateForm.vue';
//import PostList from './PostList.vue';
import { Head, Link } from '@inertiajs/vue3';

</script>
<template>
    <Head title="Article" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">New Artcle</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                    <CreateForm class="max-w-xl"></CreateForm>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <!-- <PostList class="max-w-xl"></PostList> -->
                    <div>
                        <Link :href="route('post.postlist')" as="button"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    View Post</Link>
                </div>


            </div>

                <!-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    
                            </div>

                            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    
                            </div> -->

            </div>
        </div>
    </AuthenticatedLayout>
</template>