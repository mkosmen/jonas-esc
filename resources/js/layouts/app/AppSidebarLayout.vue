<script setup lang="ts">
import AppContent from '@/components/AppContent.vue';
import type { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppContent variant="sidebar" class="overflow-x-hidden">
        <slot />
    </AppContent>
</template>
