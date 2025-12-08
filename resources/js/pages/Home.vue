<template>
    <AppLayout>
        <Head title="Shop" />

        <div class="flex flex-wrap gap-2">
            <span
                v-for="product in products"
                :key="product.stock_id"
                class="border p-2"
            >
                <p>{{ product.name }}</p>
                <div class="flex w-full">
                    <Button size="sm">-</Button>
                    <span
                        class="w-10 flex-1 rounded border border-white"
                    ></span>
                    <Button size="sm">+</Button>
                </div>
            </span>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Product } from '@/types';
import { Head } from '@inertiajs/vue3';

defineProps<{
    products: Product[];
}>();
</script>
