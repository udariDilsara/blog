

<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';



const props = defineProps({
    post: {
        type: Object
    }
});

const form = useForm({
    post_title: props.post.post_title,
    post_body: props.post.post_body,
    shedule_date: props.post.shedule_date,
    //check_box: false,
});
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Artcle</h2>
        </template>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Post</h2>
            <p class="mt-1 text-sm text-gray-600">
                Edit your Post title and post body.
            </p>
        </header>
        <!-- <div>{{ post }}</div> -->
        <div class="px-16 py-6 flex mb-4">

            <form @submit.prevent="form.put(route('post.update', { post: post }))" class="mt-6 space-y-6">
                <div>
                    <div>
                        <!-- <input type="checkbox" v-model="form.check_box"> -->
                        <input type="checkbox" id="check_box" v-model="form.check_box" />
                        <label for="check_box">Check Box</label>
                        <InputError class="mt-2" :message="form.errors.check_box" />
                    </div>
                    <div>
                        <InputLabel for="shedule_date" value="Shedule Date" />
                        <input type="date" v-model="form.shedule_date">
                        <InputError class="mt-2" :message="form.errors.shedule_date" />
                    </div>

                    <InputLabel for="post_title" value="Post Title" />

                    <TextInput id="post_title" type="text" class="mt-1 block w-full" v-model="form.post_title" required
                        autofocus autocomplete="name" />

                    <InputError class="mt-2" :message="form.errors.post_title" />
                </div>

                <div>
                    <InputLabel for="post_body" value="Post Body" />

                    <!-- <TextInput id="post_body" type="text" class="mt-1 block w-full" v-model="form.post_body" required /> -->
                    <textarea v-model="form.post_body" required cols="30" rows="10"></textarea>
                    <InputError class="mt-2" :message="form.errors.post_body" />
                </div>

                <div class="flex items-center gap-4">
                    <PrimaryButton :disabled="form.processing">Update</PrimaryButton>

                    <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                        <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Updated.</p>
                    </Transition>
                    <Link as="button"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        :href="route('post.postlist')">Back</Link>
                </div>


            </form>
        </div>
    </AuthenticatedLayout>
</template>
