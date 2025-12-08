<template>
    <div class="inline-flex gap-2">
        <template v-if="quantity">
            <Button
                class="cursor-pointer rounded border border-white px-3 py-1"
                size="sm"
                @click="router.get(decrementLink)"
                title="Decrement"
            >
                -
            </Button>
            <span
                class="inline-flex min-w-12 items-center justify-center rounded border border-white p-0! text-center"
            >
                {{ quantity }}
            </span>
            <Button
                class="cursor-pointer rounded border border-white px-3 py-1"
                size="sm"
                @click="router.get(incrementLink)"
                title="Increment"
                >+</Button
            >
        </template>
        <template v-else>
            <Button
                class="w-full cursor-pointer rounded border border-white px-3 py-1"
                size="sm"
                @click="router.get(incrementLink)"
                title="Add to Cart"
                >Add to Cart</Button
            >
        </template>
    </div>
</template>

<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { router } from '@inertiajs/vue3';

defineProps<{
    decrementLink: string;
    incrementLink: string;
    quantity?: number | null;
}>();
</script>
