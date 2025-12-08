<script setup lang="ts">
import AppHeader from '@/components/AppHeader.vue';
</script>

<template>
    <div class="mx-auto flex h-full w-full flex-col">
        <AppHeader />
        <main class="mx-auto flex-1 md:max-w-6xl">
            <slot />
        </main>
    </div>
</template>
