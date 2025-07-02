<template>
  <header class="fixed top-0 left-64 w-[calc(100%-16rem)] flex items-center justify-between bg-surface-0 dark:bg-surface-900 shadow-sm px-6 h-16 z-40 border-b border-surface-100 dark:border-surface-800 transition-all duration-300">
    <div class="flex items-center gap-4 min-w-0">
      <slot name="breadcrumb" />
    </div>
    <div class="flex items-center gap-6">
      <button class="relative focus:outline-none" aria-label="Notifications">
        <i class="pi pi-bell text-xl text-surface-500 dark:text-surface-400"></i>
        <!-- Notification dot example -->
        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-white dark:ring-surface-900"></span>
      </button>
      <div class="card flex justify-center">
        <button ref="profileBtn" @click="toggleProfileMenu" class="flex items-center gap-2 cursor-pointer select-none px-3 py-2 rounded hover:bg-surface-100 dark:hover:bg-surface-800">
          <Avatar image="https://primefaces.org/cdn/primevue/images/avatar/amyelsner.png" class="mr-2" shape="circle" />
          <span class="font-medium text-surface-900 dark:text-surface-0 hidden sm:block">Amy Elsner</span>
          <i class="pi pi-chevron-down text-surface-500 dark:text-surface-400 text-xs ml-1"></i>
        </button>
        <Menu ref="profileMenu" :model="profileItems" :popup="true" style="width: 15rem; right: 0; left: auto;" class="profile-menu-popup p-1">
          <template #start>
            <div class="font-bold text-surface-700 dark:text-surface-0 text-base mt-2 mb-1">Documents</div>
          </template>
          <template #item="{ item, props }">
            <template v-if="item.section === 'divider'">
              <hr class="my-2 border-surface-200 dark:border-surface-700" />
            </template>
            <template v-else-if="item.section">
              <div class="font-bold text-surface-700 dark:text-surface-0 text-base mt-2 mb-1">{{ item.section }}</div>
            </template>
            <template v-else>
              <a v-ripple class="flex items-center gap-3 py-2 px-2 rounded hover:bg-surface-100 dark:hover:bg-surface-800 transition-all" v-bind="props.action">
                <span :class="item.icon + ' text-xl text-surface-500 dark:text-surface-400'" />
                <span class="font-medium text-surface-700 dark:text-surface-0">{{ item.label }}</span>
                <Badge v-if="item.badge" class="ml-auto" :value="item.badge" />
                <span v-if="item.shortcut" class="ml-auto border border-surface rounded bg-emphasis text-muted-color text-xs p-1">{{ item.shortcut }}</span>
              </a>
            </template>
          </template>
          <template #end>
            <div class="mt-3 pt-3 border-t border-surface-200 dark:border-surface-700 flex items-center gap-2">
              <Avatar image="https://primefaces.org/cdn/primevue/images/avatar/amyelsner.png" class="mr-2" shape="circle" />
              <span class="inline-flex flex-col items-start">
                <span class="font-bold text-surface-900 dark:text-surface-0">Amy Elsner</span>
                <span class="text-sm text-surface-500 dark:text-surface-400">Admin</span>
              </span>
            </div>
          </template>
        </Menu>
      </div>
    </div>
  </header>
</template>

<script setup>
import { ref } from 'vue';
import Menu from 'primevue/menu';
import Badge from 'primevue/badge';
import Avatar from 'primevue/avatar';
import Ripple from 'primevue/ripple';

const profileMenu = ref();
const profileBtn = ref();

const profileItems = [
  { label: 'New', icon: 'pi pi-plus', shortcut: '⌘+N', section: null },
  { label: 'Search', icon: 'pi pi-search', shortcut: '⌘+S', section: null },
  { section: 'divider' },
  { section: 'Profile' },
  { label: 'Settings', icon: 'pi pi-cog', shortcut: '⌘+O', section: null },
  { label: 'Messages', icon: 'pi pi-inbox', badge: 2, section: null },
  { label: 'Logout', icon: 'pi pi-sign-out', shortcut: '⌘+Q', section: null },
];

function toggleProfileMenu(event) {
  profileMenu.value.toggle(event);
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.15s;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
.profile-menu-popup {
  min-width: 12rem;
  max-width: 15rem;
  right: 0 !important;
  left: auto !important;
  box-shadow: 0 4px 24px rgba(0,0,0,0.08);
  border-radius: 1rem;
  padding: 1.5rem 1.5rem 1rem 1.5rem;
}
.profile-menu-popup .p-menuitem-link {
  display: flex;
  align-items: center;
  gap: 1rem;
}
.profile-menu-popup .p-menuitem {
  margin-bottom: 0.5rem;
}
.profile-menu-popup .p-menuitem:last-child {
  margin-bottom: 0;
}
</style> 