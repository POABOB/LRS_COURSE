<template>
  <transition 
    name="modal-animation"
    enter-active-class="transition ease-out duration-150"
    enter-from-class="opacity-0"
    enter-to-class="opacity-100"
    leave-active-class="transition ease-in duration-150"
    leave-from-class="opacity-100"
    leave-to-class="opacity-0">
    <div
        v-show="isModalOpen"
        @click="closeModal"
        tabindex="0"
        class="fixed inset-0 flex items-end bg-black z-30 bg-opacity-50 sm:items-center sm:justify-center overflow-auto"
    >
        <transition 
            name="modal-inner"
            enter-active-class="transition ease-out duration-150"
            enter-from-class="opacity-0 transform translate-y-1/2"
            enter-to-class="opacity-100"
            leave-active-class="transition ease-in duration-150"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0  transform translate-y-1/2">
            <div
            v-show="isModalOpen"
            @click.stop=""
            class="w-full px-6 py-4 overflow-auto bg-white rounded-t-lg sm:rounded-lg sm:m-auto sm:m-4 sm:max-w-xl"
            role="dialog"
            id="modal"
            >
            <header class="flex justify-between">
                
                <p class="mb-2 text-lg font-semibold text-gray-700">
                    <slot name="header">
                        備註
                    </slot>
                </p>
                
                <button
                class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded hover: hover:text-gray-700"
                aria-label="close"
                @click="closeModal"
                >
                <svg
                    class="w-4 h-4"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    role="img"
                    aria-hidden="true"
                >
                    <path
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                    ></path>
                </svg>
                </button>
            </header>

            <div class="mt-4 mb-6">
                <slot name="body">
                    <div class="mt-4 text-sm mb-4">
                    <span class="text-gray-700">
                        會員類型
                    </span>
                    <div class="mt-2">
                        <label
                        class="inline-flex items-center text-gray-600"
                        >
                        <input
                            type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                            name="accountType"
                            value="personal"
                        />
                        <span class="ml-2">Personal</span>
                        </label>
                        <label
                        class="inline-flex items-center ml-6 text-gray-600"
                        >
                        <input
                            type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                            name="accountType"
                            value="busines"
                        />
                        <span class="ml-2">Business</span>
                        </label>
                    </div>
                    </div>

                    <label class="block text-sm mb-4">
                    <span class="text-gray-700">狀態更新</span>
                    <input
                        class="block w-full mt-1 text-sm focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                        placeholder="輸入"
                    />
                    </label>
                    

                    <p class="text-sm text-gray-700">
                    替身能力:透過拳頭毆打或碰觸對對方的意識進行攻擊<br>(例如:精神攻擊，精神崩潰，進入假死狀態)<br><br>破壞力:C<br>速度:A<br>精確性:B
                    </p>
                </slot>
            </div>
            <footer
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50"
            >
                <slot name="footer">
                    <button
                        @click="closeModal"
                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                        取消
                    </button>
                    <button
                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-black border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 focus:outline-none">
                        更新
                    </button>
                </slot>
            </footer>
            </div>
        </transition>
    </div>
  </transition>
</template>

<script>
    export default {
      name: 'Modal',
      props: ["isModalOpen"],
      setup(props, { emit }) {
          const closeModal = () => {
              emit("closeModal")
          }
          return { closeModal }
      }
    }
</script>