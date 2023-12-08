<script setup>

import { Link, useForm, Head, usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import CommentList from '@/Pages/Comment/CommentList.vue';
import TextInput from '@/Components/TextInput.vue';
import AllComments from '../Comment/AllComments.vue';
//import { Link, useForm, usePage } from '@inertiajs/vue3';

defineProps({
  posts: {
    type: Array
  },
  comments: {
    type: Array
  },
  // postId: {
  //   type: Number
  // }

});

// methods({
//   async deletePost(postId) {
//     try {
//       // Make an API request to delete the post
//       const response = await axios.delete(`/api/posts/${postId}`);

//       // Handle success, e.g., show a message or update the UI
//       console.log('Post deleted successfully', response.data);

//       // Optionally, update your component's state or perform other actions
//     } catch (error) {
//       // Handle errors, e.g., show an error message
//       console.error('Error deleting post', error);

//       // Optionally, update your component's state or perform other error-related actions
//     }
//   },
// });

//const { $inertia } = usePage();
//onst deletePost = async (postId) => {

// Make an API request to delete the post
//const response = await $inertia.delete(`http://localhost:8000/api/posts/${postId}`);

// Handle success, e.g., show a message or update the UI
// console.log('Post deleted successfully', response.data);

// Optionally, update your component's state or perform other actions

//};


</script>
 
<template>
  <div>

    <Head title="PostList" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Post List</h2>
      </template>

      <div class="px-16 py-6 flex mb-4">
        <!-- {{ posts }} -->
        <!-- Loop through posts and display each post -->
        <div v-for="post in posts" :key="post.id" class="mb-4 py-6 px-8 ">

          <div
            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div>
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ post.post_title }}</h5>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ post.post_body }}</p>
            </div>
            <div class="px-16 py-2 flex">
              <!-- {{ post.id }} -->
              <Link :href="route('post.view', { postId: post.id })" method="get" as="button"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              view
              </Link>
            </div>
            <div class="px-16 py-2 flex">
              <Link :href="route('post.edit', { post: post })" method="get" as="button"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Edit
              <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M1 5h12m0 0L9 1m4 4L9 9" />
              </svg>
              </Link>
            </div>
            <div class="px-16 py-2 flex">
              <Link :href="route('post.destroy', { post: post })" method="delete" as="button"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Delete
              </Link>
              <!-- <Link :href="`http://localhost:8000/post/${post}/delete`" method="delete" as="button"
                
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Delete
              </Link> -->
              <!-- <button @click="deletePost(route('post.destroy', { post: post }))"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Delete
              </button> -->
            </div>
          </div>
        </div>
      </div>


      <div class="px-16 py-6 flex mb-4">
        <Link as="button"
          class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          :href="route('post.create')">Back</Link>
      </div>

    </AuthenticatedLayout>
  </div>
</template>


