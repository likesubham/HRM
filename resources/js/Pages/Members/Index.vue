<template>
  <DashboardLayout>
    <template #default>
      <div class="bg-surface-0 dark:bg-surface-900 shadow-lg rounded-3xl w-full max-w-2xl mx-auto flex flex-col gap-6 p-8 md:p-12">
        <div class="flex items-center justify-between mb-6">
          <h1 class="text-3xl font-bold text-surface-900 dark:text-surface-0 text-center w-full">Members</h1>
          <Button type="button" @click="$inertia.visit('/members/create')" label="Create" icon="pi pi-plus" class="ml-auto" severity="primary" />
        </div>
        <p class="text-lg text-surface-700 dark:text-surface-200 text-center">This is the members page. List and manage your members here.</p>
      </div>
    </template>
  </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '../layouts/DashboardLayout.vue';
import Button from 'primevue/button';
</script>

<style scoped>
</style> 