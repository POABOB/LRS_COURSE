<template>
  <div>
    <main class="h-full pb-16 overflow-y-auto">
      <div class="container grid pt-6 px-6 max-w-5xl mx-auto">

        <!-- Go to front-end -->
        <div class="flex items-center justify-between p-4 mb-8 text-sm font-semibold  bg-white rounded shadow focus:outline-none">
          <div class="flex items-center">
            <span 
              class="ml-2 mr-2 cursor-pointer"
              @click="toggle('add')">
              新增
            </span>
            <span 
              class="ml-2 cursor-pointer"
              @click="toggleModal2">
              excel 匯入
            </span>
          </div>
          <router-link class="cursor-pointer" :to="{ name: 'Home'}">前往前台 &RightArrow;</router-link>
        </div>

        <!-- With actions -->
        <h4
          class="mb-4 text-lg font-semibold text-gray-600"
        >
          學生列表
        </h4>
        <div class="w-full overflow-hidden rounded-lg shadow-xs shadow">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
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
                            <td class="px-4 py-3 text-sm">
                              {{ td.type }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                              {{ td.grade }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                              <span v-if="td.gender === '女'" class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded">
                                {{ td.gender }}
                              </span>
                              <span v-else class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded">
                                {{ td.gender }}
                              </span>
                            </td>
                            <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
                                <button
                                  @click="toggle('edit', td.id)"
                                  class="rounded-full flex items-center justify-between px-2 py-2 text-sm font-sm leading-5 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-700 text-gray-400 focus:outline-none "
                                  aria-label="Edit">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 stroke-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                  </svg>
                                </button>

                                <button
                                  @click="deleteStudentData(td.id)"
                                  class="rounded-full flex items-center justify-between px-2 py-2 text-sm font-sm leading-5 bg-rose-600 hover:bg-rose-700 active:bg-rose-700 text-gray-400 focus:outline-none "
                                  aria-label="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 stroke-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                            </td>
                        </tr>

                        </tbody>
                </table>
            </div>
            <!-- <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9">
                <span class="flex items-center col-span-3">
                    顯示 21-30 of 100
                </span>
                <span class="col-span-2"></span>
                Pagination
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                        <li>
                        <button
                            class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none "
                            aria-label="Previous"
                        >
                            <svg
                            class="w-4 h-4 fill-current"
                            aria-hidden="true"
                            viewBox="0 0 20 20"
                            >
                            <path
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                            ></path>
                            </svg>
                        </button>
                        </li>
                        <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none "
                        >
                            1
                        </button>
                        </li>
                        <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none "
                        >
                            2
                        </button>
                        </li>
                        <li>
                        <button
                            class="px-3 py-1 text-white transition-colors duration-150 bg-black  rounded-md focus:outline-none "
                        >
                            3
                        </button>
                        </li>
                        <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none "
                        >
                            4
                        </button>
                        </li>
                        <li>
                        <span class="px-3 py-1">...</span>
                        </li>
                        <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none "
                        >
                            8
                        </button>
                        </li>
                        <li>
                        <button
                            class="px-3 py-1 rounded-md focus:outline-none "
                        >
                            9
                        </button>
                        </li>
                        <li>
                        <button
                            class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none "
                            aria-label="Next"
                        >
                            <svg
                            class="w-4 h-4 fill-current"
                            aria-hidden="true"
                            viewBox="0 0 20 20"
                            >
                            <path
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"
                                fill-rule="evenodd"
                            ></path>
                            </svg>
                        </button>
                        </li>
                    </ul>
                    </nav>
                </span>
            </div> -->
        </div>
      </div>
    </main>
    <Modal 
      @closeModal="isModalOpen=false" 
      :isModalOpen="isModalOpen">
      <template v-slot:header>
        <p v-if="mode === 'edit'">編輯學生</p>
        <p v-if="mode === 'add'">新增學生</p>
      </template>

      <template v-slot:body>
        <form class="mb-4" id="postForm" @submit.prevent="submit">
          <div class="mb-5">
            <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">姓名</label>
            <input 
              v-model="data.name" 
              id="name" 
              name="name" 
              type="text" 
              autocomplete="name" 
              required="" 
              maxlength="64"
              minlength="4"
              class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
              placeholder="請輸入姓名..." />
            
          </div>
          <div class="mb-6">
              <label for="grade" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">年級</label>
            <input 
              v-model="data.grade" 
              id="grade" 
              name="grade" 
              type="text" 
              autocomplete="current-grade" 
              required="" 
              maxlength="1"
              minlength="1"
              class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
              placeholder="請輸入年級..." />
          </div>
          <div class="mb-6">
            <label for="gender" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">性別</label>
            <select 
              v-model="data.gender" 
              id="gender" 
              name="gender" 
              autocomplete="current-gender" 
              required="" 
              class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" >
              <option value="男">男</option>
              <option value="女">女</option>
            </select>
          </div>
          <div class="mb-6">
            <label for="type" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">組別</label>
            <select 
              v-model="data.type" 
              id="type" 
              name="type" 
              autocomplete="current-type" 
              required="" 
              class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" >
              <option value="實驗組">實驗組</option>
              <option value="控制組">控制組</option>
            </select>
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
          v-show="mode === 'add'"
          @click="submit"
          class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-black border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            新增
        </button>
        <button
          v-show="mode === 'edit'"
          @click="submit"
          class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-black border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            更新
        </button>
      </template>
    </Modal>
    <Modal 
      @closeModal="isModalOpen2=false" 
      :isModalOpen="isModalOpen2">
      <template v-slot:header>
        <p>匯入學生</p>
      </template>

      <template v-slot:body>
          <label class="block py-4">
            <span class="sr-only">Choose profile photo</span>
            <input @change="fileRead" ref="file" type="file" class="block w-full text-sm text-slate-500
              file:mr-4 file:py-2 file:px-4
              file:rounded-full file:border-0
              file:text-sm file:font-semibold
              file:bg-violet-50 file:text-violet-700
              hover:file:bg-violet-100
            "/>
          </label>
          <div class="w-full overflow-hidden rounded-lg shadow-xs shadow">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b">
                            <th v-for="(th, index) in columns2" :key="th" class="w-3/12 px-4 py-3">{{ th.text }}</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        <template v-if="xlsxData.length !== 0">
                          <tr v-for="(td, index) in xlsxData" :key="td" class="text-gray-700">
                            <td class="px-4 py-3">
                                <input type="text" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" v-model="xlsxData[index].name">
                            </td>
                            <td class="px-4 py-3 text-sm">
                              <select 
                                v-model="xlsxData[index].type" 
                                autocomplete="current-type" 
                                required="" 
                                class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" >
                                <option value="實驗組">實驗組</option>
                                <option value="控制組">控制組</option>
                              </select>
                            </td>
                            <td class="px-4 py-3 text-xs">
                              <input type="text" class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" v-model="xlsxData[index].grade">
                            </td>
                            <td class="px-4 py-3 text-sm">
                              <select 
                                v-model="xlsxData[index].gender" 
                                autocomplete="current-gender" 
                                required="" 
                                class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" >
                                <option value="男">男</option>
                                <option value="女">女</option>
                              </select>
                            </td>
                          </tr>
                        </template>
                        <tr v-show="xlsxData.length === 0" class="text-gray-700">
                          <td colspan="10" class="text-center px-4 py-3 text-sm font-semibold">
                            暫無學生資料
                          </td>
                        </tr>

                        </tbody>
                </table>
            </div>
        </div>
      </template>

      <template v-slot:footer>
        <button
          @click="clearXLSX"
          class="w-full px-5 py-3 text-sm font-medium leading-5 text-black text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:shadow-outline-gray">
          取消
        </button>
        <button
          @click="submitXLSX"
          class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-black border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            匯入
        </button>
      </template>
    </Modal>
  </div>
        

</template>

<script>
  import Modal from '../../components/Modal.vue'
  import { getStuents, insertStuent, updateStuent, deleteStuent, insertXLSXStuent } from '../../api/student'
  import { ref } from 'vue'
  import XLSX from 'xlsx'
  export default {
    name: 'Admin_Home',
    components: {
      Modal,
    },
    data() {
      return {
        data: {
          id: 0,
          name: '',
          grade: '',
          gender: '男',
          type: '實驗組',
        },
        xlsxData: [],
        mode: 'add',
        columns: [
          { name: 'name', text: '姓名'},
          { name: 'type', text: '組別'},
          { name: 'grade', text: '年級'},
          { name: 'gender', text: '性別'},
          { name: 'operation', text: '操作'},
        ],
        columns2: [
          { name: 'name', text: '姓名'},
          { name: 'type', text: '組別'},
          { name: 'grade', text: '年級'},
          { name: 'gender', text: '性別'},
        ],
        entries: [],
      }
    },
    created() {
      this.getStudentData()
    },
    methods: {
      getStudentData() {
        getStuents().then((res) => {
          if(res.status === 200) {
            this.entries = res.data
          } else {
            this.$swal({
                icon: 'error',
                title: res.message,
                showConfirmButton: true,
                timer: 1000,
            })
          }
        })
        .catch(() => {})
      },
      deleteStudentData(id = 0) {
        this.$swal({
          title: '你確定要刪除這位學生?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: '是',
          cancelButtonText: '否',
        }).then((result) => {
          if (result.isConfirmed) {
            if(this.loading === true) {
                this.$swal({
                  icon: 'error',
                  title: '資料提交中，請勿重複提交!',
                  showConfirmButton: true,
                  timer: 3000,
              })
            } else {
              this.loading = true
              const data = { id: id }
              deleteStuent(data).then((res) => {
                if(res.status === 200) {
                  this.$swal({
                      icon: 'success',
                      title: '學生刪除成功!',
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
                this.getStudentData()
                this.$nextTick(() => {});
              })
              .catch(() => {
                this.loading = false
              })
            }
          }
        })
      },
      submit() {
        if(this.loading === true) {
          this.$swal({
            icon: 'error',
            title: '資料提交中，請勿重複提交!',
            showConfirmButton: true,
            timer: 3000,
          })
        } else {
          if(this.mode === 'add') {
            const form = document.getElementById('postForm')
            if(!form[0].checkValidity()) {//表單錯誤提醒
                form[0].reportValidity()
            } else { 
              this.loading = true
              insertStuent(this.data).then((res) => {
                if(res.status === 200) {
                  this.$swal({
                      icon: 'success',
                      title: '學生新增成功!',
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
                this.getStudentData()
                this.toggleModal()
                
                // 
              })
              .catch(() => {
                this.loading = false
              })
            }
          } else {
            const form = document.getElementById('postForm')
            if(!form[0].checkValidity()) {//表單錯誤提醒
                form[0].reportValidity()
            } else { 
              this.loading = true
              updateStuent(this.data).then((res) => {
                if(res.status === 200) {
                  this.$swal({
                      icon: 'success',
                      title: '學生更新成功!',
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
                this.getStudentData()
                this.$nextTick(() => {
                  
                  this.toggleModal()
                });
              })
              .catch(() => {
                this.loading = false
              })
            }
          }
        }
      },
      fileRead(e) {
        //取得上傳第一個檔案
        var files = e.target.files;
        var f = files[0]; 

        //使用FileReader讀檔
        var reader = new FileReader();

        //檔案名稱
        var name = f.name;

        //onload觸發事件
        reader.onload = function (e) {

            //對象內資料
            const data = e.target.result;

            //讀取xlsx資料
            const workbook = XLSX.read(data, { type: 'binary' });
            let result = {};
            workbook.SheetNames.forEach(function (sheetName) {
                const roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                if (roa.length > 0) {
                    result[sheetName] = roa;
                } else {
                    result[sheetName] = '1';
                }
            });
            const index = Object.keys(result)
            
            let tmp = []
            result[index].forEach((item) => {
              tmp.push({
                name: item.name,
                gender: item.gender,
                grade: item.grade,
                type: item.type,
              })
            })
            this.xlsxData = tmp
        }.bind(this);


        //以BinaryString讀入
        reader.readAsBinaryString(f);
      },
      clearXLSX() {
        this.xlsxData = []
        this.$refs.file.value = null
        this.closeModal2()
      },
      submitXLSX() {
        if(this.loading === true) {
          this.$swal({
            icon: 'error',
            title: '資料提交中，請勿重複提交!',
            showConfirmButton: true,
            timer: 3000,
          })
        } else {
          this.loading = true
          insertXLSXStuent(this.xlsxData).then((res) => {
            if(res.status === 200) {
              this.$swal({
                  icon: 'success',
                  title: '學生匯入成功!',
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
            this.getStudentData()
            this.clearXLSX()
          })
          .catch(() => {
            this.loading = false
          })
        }
      },
      toggle(mode, id = 0) {
        if(this.mode === mode) {
        } else {
          if(mode === 'add') {
            this.data = { id: 0,name: '',grade: '',gender: '男',type: '實驗組' }
          } else {
            const data = this.entries.find(d => parseInt(d.id) === parseInt(id))
            console.log(id);
            if(data !== undefined) {
              this.data = data
            }
          }
        }
        
        this.mode = mode
        this.toggleModal()
      }
    },
    setup() {
      const isModalOpen = ref(false);
      const isModalOpen2 = ref(false);
      
      const toggleModal = () => {
        isModalOpen.value = !isModalOpen.value
      }

      const toggleModal2 = () => {
        isModalOpen2.value = !isModalOpen2.value
      }

      const closeModal = () => {
        isModalOpen.value = false
      }

      const closeModal2 = () => {
        isModalOpen2.value = false
      }

      return { isModalOpen, isModalOpen2, toggleModal, toggleModal2, closeModal, closeModal2 }
    }
  }
</script>
