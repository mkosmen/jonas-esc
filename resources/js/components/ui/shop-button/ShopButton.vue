<template>
    <div class="gap-2" :class="!quantity ? 'flex' : 'inline-flex'">
        <template v-if="quantity">
            <Button
                class="cursor-pointer rounded border border-white px-3 py-1"
                size="sm"
                @click="router.get(decrementLink)"
                :title="quantity === 1 ? 'Remove Item' : 'Decrement'"
            >
                <span v-if="quantity === 1">
                    <TrashIcon />
                </span>
                <span v-else>
                    <Minus />
                </span>
            </Button>
            <span
                class="inline-flex min-w-12 cursor-default items-center justify-center rounded border border-white p-0! text-center"
            >
                {{ quantity }}
            </span>
            <Button
                class="cursor-pointer rounded border border-white px-3 py-1"
                size="sm"
                @click="router.get(incrementLink)"
                title="Increment"
                :disabled="stock === quantity"
            >
                <Plus />
            </Button>
        </template>
        <template v-else>
            <Button
                class="w-full cursor-pointer rounded border border-white px-3 py-1"
                size="sm"
                @click="router.get(incrementLink)"
                title="Add to Cart"
                >Add to Cart <ShoppingCart
            /></Button>
        </template>
    </div>
</template>

<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { router } from '@inertiajs/vue3';
import { Minus, Plus, ShoppingCart, TrashIcon } from 'lucide-vue-next';

defineProps<{
    decrementLink: string;
    incrementLink: string;
    stock: number;
    quantity?: number | null;
}>();
</script>
