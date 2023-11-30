<script setup>
//import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    comment: {
        type: Object
    }
});



const form = useForm({
    //post_title: props.post.post_title,
    comment_body: props.comment.comment_body
});

</script>

<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">Comment</h2>

                        <p class="mt-1 text-sm text-gray-600">
                            Edit your commment body.
                        </p>
                    </header>
                    <div class="px-16 py-2 flex">
                        <form @submit.prevent="form.put(route('comment.update', { id: comment.id }))"
                            class="mt-6 space-y-6">
                            <!-- <form action="#"> -->

                            <div>
                                <InputLabel for="comment_body" value="Comment Body" />

                                <TextInput id="comment_body" type="text" class="mt-1 block w-full"
                                    v-model="form.comment_body" required />
                                <div class="flex items-center gap-4 mt-2">
                                    <PrimaryButton>Send</PrimaryButton>
                                </div>

                                <div class="px-16 py-6 flex mb-4">
                                    <Link as="button"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        :href="route('post.view', { postId: comment.post_id })">Back</Link>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>
