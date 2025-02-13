<script setup>
import {defineProps} from "vue";
import {useForm} from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";

defineProps({ads: Array});

</script>

<template>
    <GuestLayout>
        <div>
            <h1 class="text-2xl mb-5">Advertisements</h1>

            <ul>
                <li v-for="ad in ads" :key="ad.id" class="p-4 border border-gray-200 rounded-md bg-white mb-4">
                    <div class="flex justify-between items-center ">
                        <h2 class="text-xl font-semibold">{{ ad.title }}</h2>
                    </div>
                    <p class="mt-2">{{ ad.description }}</p>
                    <p class="mt-1 text-gray-600">Price: ${{ ad.price }}</p>
                </li>
            </ul>
        </div>
    </GuestLayout>
</template>
