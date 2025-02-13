<template>
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Create new advertisement
            </h2>
        </template>
        <div>
            <h1 class="text-2xl font-bold mb-4">Create Advertisement</h1>
            <form @submit.prevent="submit">
                <!-- Title Field -->
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Title</label>
                    <input
                        id="title"
                        v-model="form.title"
                        type="text"
                        class="mt-1 block w-full border-gray-300 rounded-md"
                    />
                    <div v-if="form.errors.title" class="text-red-600 text-sm mt-1">
                        {{ form.errors.title }}
                    </div>
                </div>

                <!-- Description Field -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea
                        id="description"
                        v-model="form.description"
                        class="mt-1 block w-full border-gray-300 rounded-md"
                    ></textarea>
                    <div v-if="form.errors.description" class="text-red-600 text-sm mt-1">
                        {{ form.errors.description }}
                    </div>
                </div>

                <!-- Price Field -->
                <div class="mb-4">
                    <label for="price" class="block text-gray-700">Price</label>
                    <input
                        id="price"
                        v-model="form.price"
                        type="number"
                        step="0.01"
                        class="mt-1 block w-full border-gray-300 rounded-md"
                    />
                    <div v-if="form.errors.price" class="text-red-600 text-sm mt-1">
                        {{ form.errors.price }}
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between">
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"
                    >
                        Create Advertisement
                    </button>
                    <Link :href="route('profile.ads')" class="text-blue-500 hover:underline">
                        Cancel
                    </Link>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import {useForm, Link} from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const form = useForm({
    title: '',
    description: '',
    image: '',
    price: '',
});

function submit() {
    form.post('/ads', {
        onSuccess: () => form.reset(),
    });
}
</script>
