<template>
  <DashboardLayout>
    <template #default>
      <div class="bg-surface-0 dark:bg-surface-900 shadow-lg rounded-3xl w-full mx-auto flex flex-col gap-6 p-8 md:p-12">
        <div class="flex items-center justify-between mb-8">
          <h1 class="text-2xl font-bold text-surface-900 dark:text-surface-0">Accounts</h1>
          <Button type="button" @click="$inertia.visit('/accounts/create')" label="Add Transaction" icon="pi pi-plus" severity="primary" />
        </div>
        <h2 class="text-xl font-semibold mb-4 text-surface-900 dark:text-surface-0">Accounts Overview</h2>
        <div class="flex flex-row gap-4 mb-6">
          <div class="bg-gray-50 rounded-xl p-4 flex-1 flex flex-col items-start border border-gray-200 shadow-sm">
            <span class="text-sm text-gray-500 mb-1">Total Income</span>
            <span class="text-2xl md:text-3xl font-bold text-surface-900 dark:text-surface-0">$12,500.00</span>
          </div>
          <div class="bg-gray-50 rounded-xl p-4 flex-1 flex flex-col items-start border border-gray-200 shadow-sm">
            <span class="text-sm text-gray-500 mb-1">Total Expenses</span>
            <span class="text-2xl md:text-3xl font-bold text-surface-900 dark:text-surface-0">$4,200.00</span>
          </div>
          <div class="bg-gray-50 rounded-xl p-4 flex-1 flex flex-col items-start border border-gray-200 shadow-sm">
            <span class="text-sm text-gray-500 mb-1">Current Balance</span>
            <span class="text-2xl md:text-3xl font-bold text-surface-900 dark:text-surface-0">$8,300.00</span>
          </div>
        </div>
        <div class="bg-gray-50 rounded-xl p-6">
          <h3 class="text-lg font-semibold mb-4 text-surface-900 dark:text-surface-0">Recent Transactions</h3>
          <div class="bg-gray-100 rounded-lg p-6 min-h-[120px] mb-4">
            <input
              type="text"
              placeholder="Search transactions..."
              class="w-full bg-transparent outline-none border-none text-lg text-gray-500"
              disabled
            />
          </div>
          <div class="text-gray-400 text-center py-8">
            Transaction list will be displayed here.
          </div>
        </div>
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