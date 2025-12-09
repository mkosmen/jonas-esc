<script setup lang="ts">
import { Avatar, AvatarFallback, AvatarImage } from '@/components/ui/avatar';
import { Button } from '@/components/ui/button';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import UserMenuContent from '@/components/UserMenuContent.vue';
import { getInitials } from '@/composables/useInitials';
import { urlIsActive } from '@/lib/utils';
import { home } from '@/routes';
import { index } from '@/routes/basket';
import { InertiaLinkProps, Link, usePage } from '@inertiajs/vue3';
import { Home, ShoppingBasket } from 'lucide-vue-next';
import { computed } from 'vue';

interface Props {
    total?: number;
}

defineProps<Props>();

const page = usePage();
const auth = computed(() => page.props.auth);

const isCurrentRoute = computed(
    () => (url: NonNullable<InertiaLinkProps['href']>) =>
        urlIsActive(url, page.url),
);
</script>

<template>
    <div
        class="fixed top-0 z-1 w-full border-sidebar-border/80 bg-(--background)"
    >
        <div class="mx-auto flex h-16 items-center px-4">
            <span class="relative inline-block p-2">
                <Link class="cursor-pointer" :href="home()">
                    <Home class="size-6! opacity-80 group-hover:opacity-100" />
                </Link>
            </span>

            <div class="ml-auto flex items-center space-x-2">
                <span
                    class="relative inline-block p-2"
                    v-if="isCurrentRoute(home()) && total"
                >
                    <Link class="cursor-pointer" :href="index()">
                        <ShoppingBasket
                            class="size-6! opacity-80 group-hover:opacity-100"
                        />
                        <span
                            v-show="total"
                            class="absolute top-0 right-0 inline-flex h-4 w-4 items-center justify-center rounded-full bg-red-700 text-[12px] text-white"
                        >
                            {{ total }}
                        </span>
                    </Link>
                </span>

                <DropdownMenu>
                    <DropdownMenuTrigger :as-child="true">
                        <Button
                            variant="ghost"
                            size="icon"
                            class="relative size-10 w-auto rounded-full p-1 focus-within:ring-2 focus-within:ring-primary"
                        >
                            <Avatar class="size-8 overflow-hidden rounded-full">
                                <AvatarImage
                                    v-if="auth.user.avatar"
                                    :src="auth.user.avatar"
                                    :alt="auth.user.name"
                                />
                                <AvatarFallback
                                    class="rounded-lg bg-neutral-200 font-semibold text-black dark:bg-neutral-700 dark:text-white"
                                >
                                    {{ getInitials(auth.user?.name) }}
                                </AvatarFallback>
                            </Avatar>
                        </Button>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent align="end" class="w-56">
                        <UserMenuContent :user="auth.user" />
                    </DropdownMenuContent>
                </DropdownMenu>
            </div>
        </div>
    </div>
</template>
