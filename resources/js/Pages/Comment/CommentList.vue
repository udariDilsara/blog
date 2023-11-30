<script setup>
import { Link } from '@inertiajs/vue3';


defineProps({
    comments: {
        type: Array
    },
    // postId: {
    //     type: Number
    // }
})

</script>
<template>
    <div class="py-12">
        <div class="px-16 py-6 flex mb-4">
            <Link as="button"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                :href="route('post.postlist')">Back
            </Link>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <!-- {{ comments }} -->
                <div v-for="comment in comments" :key="comment.id" class="mt-6 space-y-6">
                    <div>
                        <div>
                            <h1>user ID:</h1>
                            <p class=" mb-3 font-normal text-gray-700 dark:text-gray-400">{{ comment.user_id }}</p>
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
    </div>
</template>