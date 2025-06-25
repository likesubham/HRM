<template>
  <Breadcrumb :home="home" :model="items" class="!bg-transparent !border-none !shadow-none p-0 m-0" />
</template>

<script setup>
import Breadcrumb from 'primevue/breadcrumb';
import { computed } from 'vue';

const props = defineProps({
  items: {
    type: Array,
    default: () => [
      { label: 'Dashboard', url: '/dashboard' }
    ]
  },
  home: {
    type: Object,
    default: () => ({ icon: 'pi pi-home', url: '/' })
  }
});
</script>

<style scoped>
:deep(.p-breadcrumb) {
  background: transparent !important;
  border: none !important;
  box-shadow: none !important;
  padding: 0 !important;
  margin: 0 !important;
}
</style> 