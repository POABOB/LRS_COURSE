<template>

  <div>
    <div class="flex justify-center min-h-screen bg-gray-100 antialiased">  
      <div class="container rounded-md sm:mt-40 mt-24 my-auto max-w-md border-2 border-gray-200 p-3 bg-white">
        <!-- header -->  
        <div class="text-center m-6">
          <h1 class="text-3xl mb-4 font-semibold text-gray-700">後臺登入</h1>
          <p class="text-gray-500">請輸入帳號密碼登入後台管理學生資訊!</p>
        </div>
        <!-- sign-in -->
        <div class="m-6">
          <form class="mb-4" id="loginForm" @submit.prevent="login">
            <div class="mb-5">
              <label for="account" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">帳號</label>
              <input 
                v-model="data.account" 
                id="account" 
                name="account" 
                type="text" 
                autocomplete="account" 
                required="" 
                maxlength="64"
                minlength="4"
                class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                placeholder="請輸入帳號..." />
              
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">密碼</label>
              <input 
                v-model="data.password" 
                id="password" 
                name="password" 
                type="password" 
                autocomplete="current-password" 
                required="" 
                maxlength="128"
                minlength="4"
                class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                placeholder="請輸入密碼..." />
            </div>
            <div class="mb-6">
              <button 
                
                type="submit" 
                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                  <LockClosedIcon class="h-5 w-5 text-black-500 group-hover:text-black-400" aria-hidden="true" />
                </span>
                登入
              </button>
            </div>
            <!-- <p class="text-sm text-center text-gray-400">
              Don&#x27;t have an account yet? 
              <a href="#!" class="font-semibold text-indigo-500 focus:text-indigo-600 focus:outline-none focus:underline">Sign up</a>.
            </p> -->
          </form>
          <!-- seperator -->  
          <!-- <div class="flex flex-row justify-center mb-8">
            <span class="absolute bg-white px-4 text-gray-500">or sign-in with</span>
            <div class="w-full bg-gray-200 mt-3 h-px"></div>
          </div> -->
          <!-- alternate sign-in -->  
          <!-- <div class="flex flex-row gap-2">
            <button class="bg-green-500 text-white w-full p-2 flex flex-row justify-center gap-2 items-center rounded-sm hover:bg-green-600 duration-100 ease-in-out">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-5" viewBox="0 0 48 48"><defs><path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/></defs><clipPath id="b"><use xlink:href="#a" overflow="visible"/></clipPath><path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"/><path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/><path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/><path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/></svg>
              Google
            </button>
            <button class="bg-gray-700 text-white w-full p-2 flex flex-row justify-center gap-2 items-center rounded-sm hover:bg-gray-800 duration-100 ease-in-out">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="w-5" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385c.6.105.825-.255.825-.57c0-.285-.015-1.23-.015-2.235c-3.015.555-3.795-.735-4.035-1.41c-.135-.345-.72-1.41-1.23-1.695c-.42-.225-1.02-.78-.015-.795c.945-.015 1.62.87 1.845 1.23c1.08 1.815 2.805 1.305 3.495.99c.105-.78.42-1.305.765-1.605c-2.67-.3-5.46-1.335-5.46-5.925c0-1.305.465-2.385 1.23-3.225c-.12-.3-.54-1.53.12-3.18c0 0 1.005-.315 3.3 1.23c.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23c.66 1.65.24 2.88.12 3.18c.765.84 1.23 1.905 1.23 3.225c0 4.605-2.805 5.625-5.475 5.925c.435.375.81 1.095.81 2.22c0 1.605-.015 2.895-.015 3.3c0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z" fill="currentColor"/></g></svg>
              Github
            </button>
          </div>   -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { LockClosedIcon } from '@heroicons/vue/solid'

export default {
  name: "Login",
  data() {
    return {
      data: {
        account: '',
        password: '',
      },
      loading: false
    }
  },
  components: {
    LockClosedIcon,
  },
  methods: {
    login() {
      if(this.loading === true) {
          this.$swal({
            icon: 'error',
            title: '資料提交中，請勿重複提交!',
            showConfirmButton: true,
            timer: 3000,
        })
      } else {
        const form = document.getElementById('loginForm')
        if(!form[0].checkValidity()) {//表單錯誤提醒
            form[0].reportValidity()
        } else { 
          this.loading = true
    
          this.$store.dispatch('user/adminLogin', this.data)
          .then(() => {
            this.$swal({
                icon: 'success',
                title: '登入成功!',
                showConfirmButton: true,
                timer: 1000,
            })
            this.$router.push({ name: 'Admin_Home' })
            this.loading = false
          })
          .catch(() => {
            this.loading = false
          })
        }
      }
    }
  }
}
</script>