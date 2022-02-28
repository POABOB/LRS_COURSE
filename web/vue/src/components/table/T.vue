<template>
          <div class="w-full overflow-hidden rounded-lg shadow-xs shadow">
          <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
              <thead>
                <tr
                  class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b"
                >
                  <th class="px-4 py-3">姓名</th>
                  <th class="px-4 py-3">金額 TWD</th>
                  <th class="px-4 py-3">狀態</th>
                  <th class="px-4 py-3">日期</th>
                  <th class="px-4 py-3">動作</th>
                </tr>
              </thead>
              <tbody
                class="bg-white divide-y"
              >
                <tr class="text-gray-700">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                      >
                        <img
                          class="object-cover w-full h-full rounded-full"
                          src="https://avatars.dicebear.com/api/big-ears/abg.svg"
                          alt=""
                          loading="lazy"
                        />
                        <div
                          class="absolute inset-0 rounded-full shadow-inner"
                          aria-hidden="true"
                        ></div>
                      </div>
                      <div>
                        <p class="font-semibold">夢幻雙面大嬸</p>
                        <p class="text-xs text-gray-600">
                          10x Developer
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    $ 3999
                  </td>
                  <td class="px-4 py-3 text-xs">
                    <span
                      class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded"
                    >
                      入帳
                    </span>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    2021/10/07
                  </td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-400 focus:outline-none "
                        
                      >
                        <svg
                          class="w-5 h-5"
                          aria-hidden="true"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path
                          fill-rule="evenodd"
                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                          clip-rule="evenodd"
                        ></path>
                        </svg>
                      </button>
                      
                    </div>
                  </td>
                </tr>

                <tr class="text-gray-700">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                      >
                        <img
                          class="object-cover w-full h-full rounded-full"
                          src="https://avatars.dicebear.com/api/big-ears/weg4.svg"
                          alt=""
                          loading="lazy"
                        />
                        <div
                          class="absolute inset-0 rounded-full shadow-inner"
                          aria-hidden="true"
                        ></div>
                      </div>
                      <div>
                        <p class="font-semibold">許俊宸</p>
                        <p class="text-xs text-gray-600">
                          Unemployed
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    $ 49990
                  </td>
                  <td class="px-4 py-3 text-xs">
                    <span
                      class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded"
                    >
                      閒置
                    </span>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    2021/10/07
                  </td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <button
                        @click="toggleModal"
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-400 focus:outline-none "
                        aria-label="Edit"
                      >
                        <svg
                          class="w-5 h-5"
                          aria-hidden="true"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path
                          fill-rule="evenodd"
                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                          clip-rule="evenodd"
                        ></path>
                        </svg>
                      </button>
                      
                    </div>
                  </td>
                </tr>

                <tr class="text-gray-700">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                      >
                        <img
                          class="object-cover w-full h-full rounded-full"
                          src="https://avatars.dicebear.com/api/big-ears/john.svg"
                          alt=""
                          loading="lazy"
                        />
                        <div
                          class="absolute inset-0 rounded-full shadow-inner"
                          aria-hidden="true"
                        ></div>
                      </div>
                      <div>
                        <p class="font-semibold">都常宇</p>
                        <p class="text-xs text-gray-600">
                          Designer
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    $ 887
                  </td>
                  <td class="px-4 py-3 text-xs">
                    <span
                      class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded"
                    >
                      取消
                    </span>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    2021/10/07
                  </td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-400 focus:outline-none "
                        aria-label="Edit"
                      >
                        <svg
                          class="w-5 h-5"
                          aria-hidden="true"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path
                          fill-rule="evenodd"
                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                          clip-rule="evenodd"
                        ></path>
                        </svg>
                      </button>
                      
                    </div>
                  </td>
                </tr>

                <tr class="text-gray-700">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                      >
                        <img
                          class="object-cover w-full h-full rounded-full"
                          src="https://avatars.dicebear.com/api/big-ears/135y9.svg"
                          alt=""
                          loading="lazy"
                        />
                        <div
                          class="absolute inset-0 rounded-full shadow-inner"
                          aria-hidden="true"
                        ></div>
                      </div>
                      <div>
                        <p class="font-semibold">奇幻縮小燈的橘子</p>
                        <p class="text-xs text-gray-600">
                          Actress
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    $ 617
                  </td>
                  <td class="px-4 py-3 text-xs">
                    <span
                      class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded"
                    >
                      入帳
                    </span>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    2021/10/07
                  </td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-400 focus:outline-none "
                        aria-label="Edit"
                      >
                        <svg
                          class="w-5 h-5"
                          aria-hidden="true"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path
                          fill-rule="evenodd"
                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                          clip-rule="evenodd"
                        ></path>
                        </svg>
                      </button>
                      
                    </div>
                  </td>
                </tr>

                <tr class="text-gray-700">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                      >
                        <img
                          class="object-cover w-full h-full rounded-full"
                          src="https://avatars.dicebear.com/api/big-ears/h98erhn4.svg"
                          alt=""
                          loading="lazy"
                        />
                        <div
                          class="absolute inset-0 rounded-full shadow-inner"
                          aria-hidden="true"
                        ></div>
                      </div>
                      <div>
                        <p class="font-semibold">拎杯手機的理化老師</p>
                        <p class="text-xs text-gray-600">
                          Actor
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    $ 3999
                  </td>
                  <td class="px-4 py-3 text-xs">
                    <span
                      class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded"
                    >
                      過期
                    </span>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    2021/10/07
                  </td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-400 focus:outline-none "
                        aria-label="Edit"
                      >
                        <svg
                          class="w-5 h-5"
                          aria-hidden="true"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path
                          fill-rule="evenodd"
                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                          clip-rule="evenodd"
                        ></path>
                        </svg>
                      </button>
                      
                    </div>
                  </td>
                </tr>

                <tr class="text-gray-700">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                      >
                        <img
                          class="object-cover w-full h-full rounded-full"
                          src="https://avatars.dicebear.com/api/big-ears/DaveLi.svg"
                          alt=""
                          loading="lazy"
                        />
                        <div
                          class="absolute inset-0 rounded-full shadow-inner"
                          aria-hidden="true"
                        ></div>
                      </div>
                      <div>
                        <p class="font-semibold">苗栗豬肉奴隸</p>
                        <p class="text-xs text-gray-600">
                          Influencer
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    $ 3999
                  </td>
                  <td class="px-4 py-3 text-xs">
                    <span
                      class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded"
                    >
                      入帳
                    </span>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    2021/10/07
                  </td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-400 focus:outline-none "
                        aria-label="Edit"
                      >
                        <svg
                          class="w-5 h-5"
                          aria-hidden="true"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path
                          fill-rule="evenodd"
                          d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                          clip-rule="evenodd"
                        ></path>
                        </svg>
                      </button>
                      
                    </div>
                  </td>
                </tr>


              </tbody>
            </table>
          </div>
          <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9">
            <span class="flex items-center col-span-3">
              顯示 21-30 of 100
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
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
          </div>
        </div>
</template>

<script>
export default {

}
</script>

<style>

</style>