<template>
    <AppLayout class="flex h-screen flex-col">
        <div class="p-3 text-center">
            <p class="mb-3 text-2xl text-green-800">
                Your order has been received successfully
            </p>
            <p>
                <Link :href="home()" class="flex justify-center gap-2">
                    <ArrowLeft />
                    Go to Home
                </Link>
            </p>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { home } from '@/routes';
import { Link } from '@inertiajs/vue3';
import { ArrowLeft } from 'lucide-vue-next';
</script>
