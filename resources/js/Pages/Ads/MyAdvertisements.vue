<template>
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                My Advertisements
            </h2>
        </template>

        <div>
            <h1 class="text-2xl font-bold mb-4">My Advertisements</h1>

            <div v-if="ads.length > 0">
                <ul class="space-y-4">
                    <li v-for="ad in ads" :key="ad.id" class="p-4 border border-gray-200 rounded-md bg-white">
                        <div class="flex justify-between items-center ">
                            <h2 class="text-xl font-semibold">{{ ad.title }}</h2>
                            <button
                                @click="deleteAd(ad.id)"
                                title="Remove advertisement"
                                class="text-red-500 hover:text-red-700"
                            >
                                <!-- Remove Icon (an "X") -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <p class="mt-2">{{ ad.description }}</p>
                        <p class="mt-1 text-gray-600">Price: ${{ ad.price }}</p>
                    </li>
                </ul>
            </div>
            <div v-else>
                <p>No advertisements found.</p>
            </div>

            <div class="mt-6">
                <Link :href="route('profile.ads.create')" class="text-blue-500 hover:underline">
                    Create New Advertisement
                </Link>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Inertia} from "@inertiajs/inertia";

const props = defineProps({
    ads: {
        type: Array,
        default: () => [],
    },
});

function deleteAd(id) {
    if (confirm("Are you sure you want to delete this advertisement?")) {
        Inertia.delete(`/ads/${id}`, {
            onSuccess: () => Inertia.reload(),
        });
    }
}
</script>
