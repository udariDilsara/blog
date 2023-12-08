<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { reactive } from 'vue';
import { onMounted } from 'vue';
//import EditComment from './EditComment.vue';
import axios from 'axios';


//let commentId = reactive()

const props = defineProps({
    comments: {
        type: Array
    }
});

let error = reactive([]);
//const error = ref(null);
const showComment = ref(false);
const commentId = ref(null)
let EditCommentId = ref(null)
let commentsLoading = ref(false)
const form = useForm({

    comment_body: ''

});

// const getComment = async (commentId) => {
//     try {
//         commentsLoading.value = true

//         const response = await axios.get(route('comment.edit', { id: commentId }))
//         commentEdit = response.data.comment
//         console.log(commentEdit, commentEdit.id, route('comment.edit', { id: commentId }));
//         commentsLoading.value = false
//     } catch (error) {
//         console.log(error);
//     }

//     //console.log(commentId, response, Comment);
// }

async function getComment(commentId) {
    try {
        commentsLoading.value = true;

        const response = await axios.get(route('comment.edit', { id: commentId }));
        form.comment_body = response.data.comment.comment_body;  // Use .value to update the ref
        console.log(response, 'commet');
        commentsLoading.value = false;
    } catch (error) {
        console.log(error, "4");
    }


}

onMounted(() => {


})





const deleteComments = async (commentId) => {
    try {
        commentsLoading.value = true
        const response = await axios.delete(route('comment.destroy', { id: commentId }));
        commentsLoading.value = false
        if (response.headers['content-type'] === 'application/json') {
            //this.$emit('commentDeleted', commentId);
            //location.reload();
            //window.location.reload();
            return;

        }

        console.log(response, route('comment.destroy', { id: commentId }));



    } catch (error) {
        console.log(error, "3");
    }


};
const putComment = async (commentId) => {

    try {
        commentsLoading.value = true
        const response = await axios.put(route('comment.update', { id: commentId }), form);
        console.log(response, route('comment.update', { id: commentId }));

        EditCommentId = null
        commentsLoading.value = false


    } catch (e) {
        console.log(error, "6");
        console.log(e.response.status, 'status');
        if (e.response.status === 422) {
            error = e.response.data.errors
            console.log(error, "putError msg");
        }
    }
}

const toggleEditComment = async (id) => {
    commentId.value = id; // Set the commentId
    showComment.value = !showComment.value;

    let result = await getComment(commentId.value); // Pass the commentId to getComment
    console.log('res', result);
}

</script>
<template>
    <div class="py-12">
        <div v-if="error">

            <!-- {{ error }} -->
            <div v-for="(f, k) in error" :key="k">
                <p v-for="error in f" :key="error">
                    {{ error }}
                </p>
            </div>

        </div>
        <div class="px-16 py-6 flex mb-4">
            <Link as="button"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                :href="route('post.postlist')">Back
            </Link>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div v-for="comment in comments" :key="comment.id" class="mt-6 space-y-6">
                    <div>
                        <div>
                            <h1>user ID:</h1>
                            <p class=" mb-3 font-normal text-gray-700 dark:text-gray-400">{{ comment.user_id }}</p>
                        </div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ comment.comment_body }}</p>
                        <div class="px-16 py-2 flex">
                            <!-- <Link :href="route('comment.edit', { id: comment.id })" method="get" as="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Edit
                            </Link> -->
                        </div>
                        <div>
                            <div v-if="showComment && EditCommentId == comment.id">

                                <form action="#">

                                    <div>
                                        <!-- {{ commentEdit }} -->
                                        <!-- <InputLabel for="comment_body" value="Comment Body" /> -->
                                        <label for="comment_body"></label>
                                        <input type="text" id="comment_body" name="comment_body" class="mt-1 block w-full"
                                            v-model="form.comment_body" required>
                                        <!-- <TextInput id="comment_body" name="comment_body" type="text"
                                            class="mt-1 block w-full" v-model="form.comment_body" required /> -->
                                        <div class="flex items-center gap-4 mt-2">
                                            <!-- <button type="button" @click="putComment(comment.id)">Send</button> -->
                                            <button type="button"
                                                @click="() => { putComment(comment.id); $emit('commentChanged') }">send</button>
                                            <!-- <p v-if="commentsLoading">Loading </p> -->
                                            <!-- <button>Send</button> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div @click="toggleEditComment(EditCommentId = comment.id)">
                                <span v-if="showComment">Done Edit</span>
                                <!-- <span v-if="!showText">Show text</span> -->
                                <span v-else> <button type="button">Edit
                                        Comment</button></span>

                            </div>
                        </div>
                        <div class="px-16 py-2 flex">
                            <!-- <Link :href="route('comment.destroy', { id: comment.id })" method="delete" as="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Delete
                            </Link> -->

                            <!-- <button type="button" @click="deleteComments(comment.id)">Delete</button> -->
                            <button type="button"
                                @click="() => { deleteComments(comment.id); $emit('commentChanged') }">Delete</button>
                            <!-- @click="() => { firstFunction(); secondFunction(); }" -->
                            <p v-if="commentsLoading">Loading </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>