<template>
  <DashboardLayout>
    <template #default>
      <div class="bg-surface-0 dark:bg-surface-900 shadow-lg rounded-3xl w-full mx-auto flex flex-col gap-4 p-4 md:p-6">
        <!-- Accounts Overview Title and Add Transaction Button in the same row -->
        <div class="flex items-center justify-between mb-3">
          <h2 class="text-xl font-semibold text-surface-900 dark:text-surface-0">Accounts Overview</h2>
          <Button type="button" @click="$inertia.visit('/accounts/create')" label="Add Transaction" icon="pi pi-plus" severity="primary" />
        </div>
        <!-- Overview Boxes -->
        <div class="flex flex-row gap-3 mb-4">
          <div class="bg-gray-50 rounded-xl p-3 flex-1 flex flex-col items-start border border-gray-200 shadow-sm">
            <span class="text-sm text-gray-500 mb-1">Total Income</span>
            <span class="text-2xl md:text-3xl font-bold text-surface-900 dark:text-surface-0">$12,500.00</span>
          </div>
          <div class="bg-gray-50 rounded-xl p-3 flex-1 flex flex-col items-start border border-gray-200 shadow-sm">
            <span class="text-sm text-gray-500 mb-1">Total Expenses</span>
            <span class="text-2xl md:text-3xl font-bold text-surface-900 dark:text-surface-0">$4,200.00</span>
          </div>
          <div class="bg-gray-50 rounded-xl p-3 flex-1 flex flex-col items-start border border-gray-200 shadow-sm">
            <span class="text-sm text-gray-500 mb-1">Current Balance</span>
            <span class="text-2xl md:text-3xl font-bold text-surface-900 dark:text-surface-0">$8,300.00</span>
          </div>
        </div>
        <!-- Recent Transactions Box -->
        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 shadow-sm">
          <h3 class="text-lg font-semibold mb-2 text-surface-900 dark:text-surface-0">Recent Transactions</h3>
          <div class="bg-gray-100 rounded-lg p-3 min-h-[80px] mb-3 border border-gray-200 shadow-sm">
            <input
              type="text"
              placeholder="Search transactions..."
              class="w-full bg-transparent outline-none border-none text-lg text-gray-500"
              disabled
            />
          </div>
          <div class="text-gray-400 text-center py-4">
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