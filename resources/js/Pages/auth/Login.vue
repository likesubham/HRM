<template>
  <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-surface-100 via-surface-50 to-surface-200 dark:from-surface-950 dark:via-surface-900 dark:to-surface-950 py-4 px-2 sm:px-4 lg:px-6">
    <div class="bg-surface-0 dark:bg-surface-900 shadow-lg rounded-3xl w-full max-w-md mx-auto flex flex-col gap-5 p-4 md:p-5">
      <!-- Dummy Logo -->
      <div class="flex flex-col items-center gap-1 mb-1">
        <div class="bg-primary/10 rounded-full p-2 mb-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 48 48" fill="none">
            <circle cx="24" cy="24" r="24" fill="#6366F1" fill-opacity="0.15"/>
            <path d="M24 12L30 36H18L24 12Z" fill="#6366F1"/>
            <circle cx="24" cy="24" r="6" fill="#6366F1" fill-opacity="0.7"/>
          </svg>
        </div>
        <div class="text-surface-900 dark:text-surface-0 text-2xl font-bold leading-tight text-center">Welcome Back</div>
        <div class="text-center w-full text-surface-700 dark:text-surface-200 text-base mt-1">
          Don&apos;t have an account?
          <a class="text-primary font-semibold ml-1 cursor-pointer hover:underline">Create today!</a>
        </div>
      </div>
      <form @submit.prevent="handleLogin" class="flex flex-col gap-3 w-full mt-1">
        <div class="flex flex-col gap-1 w-full">
          <label for="email1" class="text-surface-900 dark:text-surface-0 font-medium">Email Address</label>
          <InputText id="email1" v-model="email" type="email" placeholder="Email address" class="w-full px-3 py-2 shadow rounded-lg text-base" required />
        </div>
        <div class="flex flex-col gap-1 w-full">
          <label for="password1" class="text-surface-900 dark:text-surface-0 font-medium">Password</label>
          <InputText id="password1" v-model="password" type="password" placeholder="Password" class="w-full px-3 py-2 shadow rounded-lg text-base" required />
        </div>
        <div class="flex flex-row items-center justify-between w-full mt-1 mb-1">
          <div class="flex items-center gap-2">
            <Checkbox id="rememberme1" v-model="rememberMe" :binary="true" />
            <label for="rememberme1" class="text-surface-900 dark:text-surface-0 select-none">Remember me</label>
          </div>
          <a class="text-primary font-medium cursor-pointer hover:underline whitespace-nowrap">Forgot your password?</a>
        </div>
        <Button label="Sign In" icon="pi pi-user" class="w-full py-2 rounded-lg flex justify-center items-center gap-2 text-base font-semibold shadow-md hover:shadow-lg transition mt-1" type="submit">
          <template #icon>
            <i class="pi pi-user !text-base !leading-normal" />
          </template>
        </Button>
      </form>
    </div>
  </div>
</template>

<script setup>
import Checkbox from 'primevue/checkbox';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const email = ref('');
const password = ref('');
const rememberMe = ref(false);

function handleLogin() {
  router.post('/login', {
    email: email.value,
    password: password.value,
    remember: rememberMe.value,
  });
}
</script>

<style scoped>
/* Custom styles for enhanced look */
.bg-primary\/10 {
  background-color: rgba(99, 102, 241, 0.10);
}
</style> 