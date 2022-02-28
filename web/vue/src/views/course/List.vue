<template>
  <div>
    <header class="bg-white shadow text-center">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">課程選擇</h1>
      </div>
    </header>
    <main class="h-screen pb-16 overflow-y-auto bg-gray-50">
      <div class="container grid pt-6 px-6 max-w-5xl mx-auto">

        <!-- With actions -->
        <!-- <h4
          class="mb-4 text-lg font-semibold text-gray-600"
        >
          學生列表
        </h4> -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs shadow">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead class="bg-gray-50">
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b">
                            <th v-for="(th, index) in columns" :key="th" class="px-4 py-3">{{ th.text }}</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        <tr v-show="entries.length === 0" class="text-gray-700">
                          <td colspan="10" class="text-center px-4 py-3 text-sm font-semibold">
                            暫無學生資料
                          </td>
                        </tr>
                        <tr v-for="(td, index) in entries" :key="td" class="text-gray-700">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img
                                            class="object-cover w-full h-full rounded-full"
                                            src="https://source.boringavatars.com/beam"
                                            alt=""
                                            loading="lazy" />
                                        <div
                                            class="absolute inset-0 rounded-full shadow-inner"
                                            aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ td.name }}</p>
                                        <!-- <p class="text-xs text-gray-600">Unemployed</p> -->
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <button
                                  @click="askToCheckIndex(index, td.name, td.type)"
                                  class="rounded-md flex items-center justify-between px-3 py-2 text-sm font-sm leading-5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-700 text-gray-400 focus:outline-none "
                                  aria-label="Edit">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 stroke-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                  </svg>
                                  <span class="text-white">進入課程</span>
                                </button>
                            </div>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
  import { ref, onMounted, inject } from 'vue'
  import { useRouter } from 'vue-router'

  export default {
    name: 'Home',
    setup() {
      const router = useRouter()
      const entries = ref([])
      const swal = inject('$swal')
      const columns = [
        { name: 'name', text: '課程名稱'},
        // { name: 'type', text: ''},
        // { name: 'grade', text: '年級'},
        // { name: 'gender', text: '性別'},
        { name: 'operation', text: '操作'},
      ]
    
        entries.value = [
            {
                name: '課程A',
                type: 'A'
            },
            {
                name: '課程B',
                type: 'B'
            },
            {
                name: '課程C',
                type: 'C'
            },
            {
                name: '課程D',
                type: 'D'
            }
        ]



      const askToCheckIndex = (index = 0, name = '', type = '') => {
        swal({
          title: `你確定要學習 ${name} ?`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: '是',
          cancelButtonText: '否',
        }).then((result) => {
          if (result.isConfirmed) {
            router.push({ name: `Course_${type}` })
          }
        })
      }
      return { askToCheckIndex, entries, columns }
    }
  }
</script>