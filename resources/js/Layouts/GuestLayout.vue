<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import {Link} from '@inertiajs/inertia-vue3';
</script>

<template>
    <div
        class="min-h-screen bg-gray-100 pt-6 w-full"
    >
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 w-full">
            <div class="flex justify-between">
                <Link href="/">
                    <ApplicationLogo class="h-20 w-20 fill-current text-gray-500"/>
                </Link>
                <div class="mt-4 flex justify-center space-x-4 text-sm">
                    <Link :href="route('login')" class="text-gray-600 hover:text-gray-900">Login</Link>
                    <Link :href="route('register')" class="text-gray-600 hover:text-gray-900">Register</Link>
                </div>
            </div>

            <div
                class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:rounded-lg"
            >
                <slot/>
            </div>
        </div>

    </div>
</template>
