import { createStore } from "vuex"
import getters from './getters'
import user from './modules/user'

const store = createStore({
    // 將Vuex模組化，更方便管理
    modules: {
      user,
    },
    // 獲取值的方法
    getters
  })
  
  export default store