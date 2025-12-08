<template>
    <AppLayout>
        <Head title="Shop" />

        <div
            class="grid gap-4 py-3 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"
        >
            <div
                v-for="p in products"
                :key="p.id"
                class="flex flex-1/4 flex-col rounded border border-white p-2"
            >
                <span class="mb-3 p-1 leading-none">{{ p.name }}</span>
                <div class="mt-auto flex flex-col gap-2">
                    <div class="flex justify-between">
                        <span>{{ money(p.price) }}</span>
                        <span>{{ p.stock_quantity }}</span>
                    </div>
                    <shop-button
                        :decrement-link="dec.url({ id: p.id })"
                        :increment-link="inc.url({ id: p.id })"
                        :quantity="getQuantity(p.id)"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import ShopButton from '@/components/ui/shop-button/ShopButton.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { money } from '@/lib/utils';
import { dec, inc } from '@/routes/shop';
import { Basket, Product } from '@/types';
import { Head } from '@inertiajs/vue3';

interface Props {
    products: Product[];
    basket: Basket;
}

const props = defineProps<Props>();

function getQuantity(id: number) {
    if (!props.basket) {
        return null;
    }

    return (props.basket as Basket).products?.find((f) => f.id === id)?.pivot
        .quantity;
}
</script>
