<template>
    <AppLayout class="flex h-screen flex-col">
        <div v-if="!basket.products?.length" class="p-3 text-center text-lg">
            <p class="mb-3">There is no item in basket</p>
            <Link :href="home()" class="text-md w-full">
                <Button class="w-full">Go to Shop</Button>
            </Link>
        </div>
        <div class="flex flex-col pb-3" v-else>
            <Alert v-if="errMessage" class="mb-2">
                {{ errMessage }}
            </Alert>

            <ul class="mb-4 min-w-md flex-1 pb-20">
                <li
                    v-for="product in basket.products"
                    :key="product.id"
                    class="mb-2 rounded border border-white bg-gray-900 p-3"
                >
                    <p class="mb-3">{{ product.name }}</p>
                    <p class="mb-5 flex justify-between">
                        {{ money(product.price) }}

                        <shop-button
                            class="ml-3"
                            :decrement-link="dec.url({ id: product.id })"
                            :increment-link="inc.url({ id: product.id })"
                            :stock="product.stock_quantity"
                            :quantity="product.pivot.quantity"
                        />
                    </p>
                    <p class="text-right text-red-300">
                        <span class="text-sm">Total :</span>
                        <b class="ml-1">{{
                            money(product.price * product.pivot.quantity)
                        }}</b>
                    </p>
                </li>
            </ul>
            <div
                class="fixed bottom-0 left-0 flex w-full justify-center bg-(--background) p-3"
            >
                <span class="inline-block min-w-md">
                    <div class="mb-5 text-right text-red-400">
                        Total: <b>{{ money(totalPrice) }}</b>
                    </div>
                    <Link
                        :as="Button"
                        :href="purchase()"
                        class="text-md w-full cursor-pointer"
                    >
                        Purchase
                    </Link>
                </span>
            </div>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import { Alert } from '@/components/ui/alert';
import { Button } from '@/components/ui/button';
import ShopButton from '@/components/ui/shop-button/ShopButton.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { money } from '@/lib/utils';
import { home } from '@/routes';
import { purchase } from '@/routes/basket';
import { dec, inc } from '@/routes/shop';
import { Basket } from '@/types';
import { Link } from '@inertiajs/vue3';

interface Props {
    basket: Basket;
    totalPrice: number;
    errMessage?: string;
}

defineProps<Props>();
</script>
