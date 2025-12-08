<script setup lang="ts">
import AppHeader from '@/components/AppHeader.vue';
</script>

<template>
    <div class="flex h-full w-full flex-col">
        <AppHeader />
        <main class="flex-1">
            <slot />
        </main>
    </div>
</template>
