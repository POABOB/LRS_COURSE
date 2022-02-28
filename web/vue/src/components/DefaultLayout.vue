<template>
  <div>
    <div
      class="flex h-screen bg-gray-50"
      :class="{ 'overflow-hidden': isSideMenuOpen}">
      <!-- nav -->
      <nav
        class="fixed flex-shrink-0 shadow w-full mt-16 overflow-x-auto bg-white"
        v-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-y-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-y-20"
      >
        <div class="py-4 text-center text-gray-500">
          <ul class="mt-6">
            <li class="relative inline px-6 py-3">
              <a
                class="inline-flex items-center text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
                href=""
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Dashboard</span>
              </a>
            </li>      
            <li class="relative inline px-6 py-3">
              <a
                class="inline-flex items-center text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
                href=""
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                  ></path>
                </svg>
                <span class="ml-4">申請表</span>
              </a>
            </li>
            <li class="relative inline px-6 py-3">
              <a
                class="inline-flex items-center text-sm font-semibold transition-colors duration-150 hover:text-gray-800 "
                href=""
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
                  ></path>
                </svg>
                <span class="ml-4">設備</span>
              </a>
            </li>
            <li class="relative inline px-6 py-3">
              <a
                class="inline-flex items-center text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800"
                href=""
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                </svg>
                <span class="ml-4">入帳表</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      
      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white">
          <div
            class="container flex items-center justify-between h-full px-6 mx-auto"
          >
            <!-- Menu hamburger -->
            <!-- <button
              class="p-1 mr-5 -ml-1 rounded-md focus:outline-none "
              @click="toggleSideMenu"
              aria-label="Menu"
            >
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button> -->
            <h4>學生管理後台</h4>
            <!-- Search input -->
            <!-- <div class="flex justify-center flex-1">
              <div
                class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
              >
                <div class="absolute inset-y-0 flex items-center pl-2">
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <input
                  class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none  form-input"
                  type="search"
                  placeholder="搜尋"
                  aria-label="Search"
                />
              </div>
            </div> -->
            <ul class="flex items-center flex-shrink-0 space-x-6">
              <!-- Theme toggler -->
              <!-- <li class="flex">
                <button
                  class="rounded-md focus:outline-none "
                  @click="toggleTheme"
                  aria-label="Toggle color mode"
                >
                  <template x-if="!dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                      ></path>
                    </svg>
                  </template>
                  <template x-if="dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </template>
                </button>
              </li> -->
              <!-- Profile menu -->
              <li class="relative">
                <button
                  class="align-middle rounded-full  focus:outline-none"
                  @click="toggleProfileMenu"
                  @keydown.escape="closeProfileMenu"
                  aria-label="Account"
                  aria-haspopup="true"
                >
                  <img
                    class="object-cover w-8 h-8 rounded-full"
                    src="https://source.boringavatars.com/beam"
                    alt=""
                    aria-hidden="true"
                  />
                </button>
                <template v-if="isProfileMenuOpen">
                  <ul
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    v-click-away="closeProfileMenu"
                    @keydown.escape="closeProfileMenu"
                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md"
                    aria-label="submenu"
                  >
                    <li class="flex" @click="toggleModal">
                      <div
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 cursor-pointer"
                      >
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                          ></path>
                        </svg>
                        <span>Profile</span>
                      </div>
                    </li>
                    <!-- <li class="flex">
                      <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100"
                        href="#"
                      >
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                          ></path>
                          <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Settings</span>
                      </a>
                    </li> -->
                    <li class="flex" @click="logout">
                      <div
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 cursor-pointer"
                      >
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                          ></path>
                        </svg>
                        <span>Log out</span>
                      </div>
                    </li>
                  </ul>
                </template>
              </li>
            </ul>
          </div>
        </header>
        <router-view></router-view>
      </div>
    </div>
    <Modal 
      @closeModal="closeModal" 
      :isModalOpen="isModalOpen">
      <template v-slot:header>
        <p>Profile</p>
      </template>

      <template v-slot:body>
        <form class="mb-4" id="passwordForm" @submit.prevent="updatePassword">
          <div class="mb-5">
            <label for="password" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">密碼</label>
            <input 
              v-model="data.password" 
              id="password" 
              name="password" 
              type="password" 
              required="true" 
              maxlength="128"
              minlength="4"
              class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
              placeholder="請輸入新密碼..." />
            
          </div>
          <div class="mb-6">
            <label for="passconf" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">密碼確認</label>
            <input 
              v-model="data.passconf" 
              id="passconf" 
              name="passconf" 
              type="password" 
              required="true" 
              maxlength="128"
              minlength="4"
              class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
              placeholder="請輸入再次新密碼..." />
          </div>
        </form>
      </template>

      <template v-slot:footer>
        <button
          @click="closeModal"
          class="w-full px-5 py-3 text-sm font-medium leading-5 text-black text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:shadow-outline-gray">
          取消
        </button>
        <button
          @click="updatePassword"
          class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-black border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            更新
        </button>
      </template>
    </Modal>
  </div>
</template>

<script>
  import { logout, updatePassword } from '../api/user'
  import Modal from '../components/Modal.vue'
  import { ref } from 'vue'
    export default {
      data() {
        return {
          isSideMenuOpen: false,
          isProfileMenuOpen: false,
          loading: false,
          data: {
            account: '',
            password: '',
            passconf: ''
          }
        }
      },
      created() {
        const user = JSON.parse(JSON.stringify(this.$store.state.user.user))
        this.data.account = user.account
      },
      methods: {
        toggleSideMenu() {
          this.isSideMenuOpen = !this.isSideMenuOpen
        },
        toggleProfileMenu() {
          this.isProfileMenuOpen = !this.isProfileMenuOpen
        },
        closeProfileMenu() {
          this.isProfileMenuOpen = false
        },
        logout() {
          this.loading = true

          logout()
          .then(() => {
            this.$swal({
                icon: 'success',
                title: '登出成功!',
                showConfirmButton: true,
                timer: 1000,
            })
            this.$store.dispatch('user/resetState')
            this.$router.push({ name: 'Login' })
            this.loading = false
          })
          .catch(() => {
            this.loading = false
          })
        },
        updatePassword() {
          if(this.loading === true) {
              this.$swal({
                icon: 'error',
                title: '資料提交中，請勿重複提交!',
                showConfirmButton: true,
                timer: 3000,
            })
          } else {
            const form = document.getElementById('passwordForm')
            if(!form[0].checkValidity()) {//表單錯誤提醒
                form[0].reportValidity()
            } else {
              if (this.data.password !== this.data.passconf) {
                this.$swal({
                    icon: 'error',
                    title: '密碼確認需一致!!',
                    showConfirmButton: true,
                    timer: 1000,
                })
              } else {
                this.loading = true
                updatePassword(this.data).then((res) => {
                  if(res.status === 200) {
                    this.$swal({
                        icon: 'success',
                        title: '密碼修改成功!',
                        showConfirmButton: true,
                        timer: 1000,
                    })
                  } else {
                    this.$swal({
                        icon: 'error',
                        title: res.message,
                        showConfirmButton: true,
                        timer: 1000,
                    })
                  }
                  this.loading = false
                  this.data.password = ''
                  this.data.passconf = ''
                  this.toggleModal()
                })
                .catch(() => {
                  this.loading = false
                })
              }
            }
          }
        }
      },
      components: {
        Modal
      },
      setup() {
        const isModalOpen = ref(false);
        
        const toggleModal = () => {
          isModalOpen.value = !isModalOpen.value
        }

        const closeModal = () => {
          isModalOpen.value = false
        }

        return { isModalOpen, toggleModal, closeModal }
      }
    }
</script>
