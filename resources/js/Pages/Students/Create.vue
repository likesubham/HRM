<template>
  <DashboardLayout>
    <template #header>
      <h1 class="text-2xl font-bold text-surface-900 dark:text-surface-0">Add New Student</h1>
    </template>
    <template #default>
      <div class="flex justify-center items-center min-h-[70vh]">
        <Card class="w-full max-w-2xl shadow-lg rounded-2xl">
          <template #content>
            <form
              class="flex flex-col gap-6"
              @submit.prevent="saveStudent"
            >
              <h2 class="text-xl font-semibold text-center mb-2 text-surface-900 dark:text-surface-0">Student Details</h2>
              <div class="flex flex-col gap-4">
                <div>
                  <label class="block font-medium mb-1">Full Name</label>
                  <InputText v-model="form.name" placeholder="Enter student's full name" class="w-full" />
                </div>
                <div>
                  <label class="block font-medium mb-1">Student ID</label>
                  <InputText v-model="form.student_id" placeholder="Enter student ID" class="w-full" />
                </div>
                <div>
                  <label class="block font-medium mb-1">Email</label>
                  <InputText v-model="form.email" placeholder="Enter student's email" class="w-full" />
                </div>
                <div>
                  <label class="block font-medium mb-1">Phone Number</label>
                  <InputText v-model="form.phone" placeholder="Enter phone number" class="w-full" />
                </div>
                <div>
                  <label class="block font-medium mb-1">Course/Program</label>
                  <InputText v-model="form.course" placeholder="Enter course or program" class="w-full" />
                </div>
                <div>
                  <label class="block font-medium mb-1">Room/Bed Number</label>
                  <InputText v-model="form.room" placeholder="Enter room/bed number" class="w-full" />
                </div>
              </div>
              <div class="flex justify-end gap-3 mt-4">
                <Button type="button" label="Cancel" severity="secondary" outlined @click="cancel" class="px-6" />
                <Button type="submit" label="Save Student" severity="primary" class="px-6" />
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
  student_id: '',
  email: '',
  phone: '',
  course: '',
  room: '',
});

function saveStudent() {
  // Replace with your Inertia post logic
  // Example:
  // $inertia.post('/students', form.value);
  alert('Student saved! (implement actual save logic)');
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