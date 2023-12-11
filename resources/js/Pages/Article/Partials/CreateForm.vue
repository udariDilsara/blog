<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
//import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

// defineProps({
//     mustVerifyEmail: {
//         type: Boolean,
//     },
//     status: {
//         type: String,
//     },
// });

//const user = usePage().props.auth.user;

const form = useForm({
    post_title: "",
    post_body: "",
    shedule_date: '',
    //shedule_date: new Date().toISOString().split('T')[0],
    check_box: false,

});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Post</h2>

            <p class="mt-1 text-sm text-gray-600">
                Add your Post title and post body.
            </p>
        </header>

        <form @submit.prevent="form.post(route('post.store'))" class="mt-6 space-y-6">

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

            <div>
                <InputLabel for="post_title" value="Post Title" />

                <!-- <TextInput id="post_title" type="text" class="mt-1 block w-full" v-model="form.post_title" required
                    autocomplete="name" /> -->
                <input type="text" v-model="form.post_title">

                <InputError class="mt-2" :message="form.errors.post_title" />
            </div>

            <div>
                <InputLabel for="post_body" value="Post Body" />

                <!-- <TextInput id="post_body" type="text" class="mt-1 block w-full" v-model="form.post_body" required /> -->
                <!-- <input type="text" v-model="form.post_body"> -->
                <textarea type="text" v-model="form.post_body" cols="30" rows="10"></textarea>


                <InputError class="mt-2" :message="form.errors.post_body" />
            </div>



            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
