<template>
  <DashboardLayout>
    <template #header>
      <h1 class="text-2xl font-bold text-surface-900 dark:text-surface-0">Add New Staff</h1>
    </template>
    <template #default>
      <div class="flex justify-center items-center min-h-[70vh]">
        <Card class="w-full max-w-2xl shadow-lg rounded-2xl">
          <template #content>
            <form
              class="flex flex-col gap-6"
              @submit.prevent="saveStaff"
            >
              <h2 class="text-xl font-semibold text-center mb-2 text-surface-900 dark:text-surface-0">Enter Staff Details</h2>
              <div class="flex flex-col gap-4">
                <div>
                  <label class="block font-medium mb-1">Full Name</label>
                  <InputText v-model="form.name" placeholder="Enter staff's full name" class="w-full" />
                </div>
                <div>
                  <label class="block font-medium mb-1">Email</label>
                  <InputText v-model="form.email" placeholder="Enter staff's email" class="w-full" />
                </div>
                <div>
                  <label class="block font-medium mb-1">Phone Number</label>
                  <InputText v-model="form.phone" placeholder="Enter phone number" class="w-full" />
                </div>
                <div>
                  <label class="block font-medium mb-1">Department</label>
                  <InputText v-model="form.department" placeholder="Enter department" class="w-full" />
                </div>
                <div>
                  <label class="block font-medium mb-1">Designation</label>
                  <InputText v-model="form.designation" placeholder="Enter designation" class="w-full" />
                </div>
              </div>
              <div class="flex justify-end gap-3 mt-4">
                <Button type="button" label="Cancel" severity="secondary" outlined @click="cancel" class="px-6" />
                <Button type="submit" label="Save Staff" severity="primary" class="px-6" />
              </div>
            </form>
          </template>
        </Card>
      </div>
    </template>
  </DashboardLayout>
</template>

<script setup>
import { ref } from 'vue';
import DashboardLayout from '../layouts/DashboardLayout.vue';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';
import Card from 'primevue/card';
import { useForm } from '@inertiajs/vue3';

const form = ref({
  name: '',
  email: '',
  phone: '',
  department: '',
  designation: '',
});

function saveStaff() {
  // Here we are creating staff only, staff ID will be generated automatically
  // Example:
  // $inertia.post('/staff', form.value);
  alert('Staff saved! (implement actual save logic)');
}

function cancel() {
  window.history.back();
}
</script>

<style scoped>
form {
  background: transparent;
}
</style>