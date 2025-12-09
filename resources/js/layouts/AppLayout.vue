<script setup lang="ts">
import AppHeader from '@/components/AppHeader.vue';

defineProps<{ total?: number }>();
</script>

<template>
    <div class="mx-auto flex h-full w-full flex-col">
        <AppHeader :total="total" />
        <main class="mx-auto flex-1 pt-20 md:max-w-6xl">
            <slot />
        </main>
    </div>
</template>
