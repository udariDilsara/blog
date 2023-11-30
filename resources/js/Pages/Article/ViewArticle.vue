<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link, useForm, Head, usePage } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import CommentList from '@/Pages/Comment/CommentList.vue';
//import CommentList from '@/Comment/CommentList.vue';
defineProps({
    post: {
        type: Object
    },
    comments: {
        type: Array
    }
});

const user = usePage().props.auth.user;

const form = useForm({
    // post_id: props.posts.post_id,
    comment_body: ""
});
</script>

<template>
    <!-- <div>{{ post }}</div>
            <div>{{ comments }}</div> -->

    <Head title="PostView" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Post View</h2>
        </template>
        <div class="px-16 py-6 flex mb-4">


            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ post.post_title }}</h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ post.post_body }}</p>
            </div>

        </div>
        <div class="px-16 py-2 flex">
            <form @submit.prevent="form.post(route('comment.store', { postId: post.id }))" class="mt-6 space-y-6">


                <div>
                    <InputLabel for="comment_body" value="Comment Body" />

                    <TextInput type="text" class="mt-1 block w-full" v-model="form.comment_body" required />
                    <PrimaryButton>Send</PrimaryButton>
                </div>

            </form>
        </div>
        <div class="px-16 py-2 flex">
            <div class="flex items-center gap-4">

                <!-- <CommentList :comment="comments" /> -->
                <div v-for="comment in comments" :key="comment.id" class="mt-6 space-y-6">
                    <div>
                        <div>
                            <h1>user Name:</h1>
                            <p class=" mb-3 font-normal text-gray-700 dark:text-gray-400">{{ user.name }}</p>
                        </div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ comment.comment_body }}</p>
                        <div class="px-16 py-2 flex">
                            <Link :href="route('comment.edit', { id: comment.id })" method="get" as="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Edit
                            </Link>
                        </div>
                        <div class="px-16 py-2 flex">
                            <Link :href="route('comment.destroy', { id: comment.id })" method="delete" as="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Delete
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <CommentList></CommentList> -->
        <div class="px-16 py-6 flex mb-4">
            <Link as="button"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                :href="route('post.postlist')">Back</Link>
        </div>

    </AuthenticatedLayout>
</template>