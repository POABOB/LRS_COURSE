import { login, logout } from '../../api/user'

//預設State
const getDefaultState = () => {
    // 從localStorage獲取State，如果有的話比較看看有沒有過期
    const state = JSON.parse(localStorage.getItem("NCUE_IM_user"))
    if(state !== null) {
        if(state.expires_at  > Date.now()) {
            return { user: state }
        }
    }
    return {
        user: {
            name: '',
            email: '',
            id: 0,
            right: '',
            expires_at: 0,
            token: null
        }
    }
}
// 儲存的資料
const state = getDefaultState()

// 向後端RESTful API獲取資料(可以是異步操作)，並commit給mutation的方法
const actions = {
    adminLogin({ commit }, userInfo) {
        const { account, password } = userInfo
        return new Promise((resolve, reject) => {
            login({ account: account.trim(), password: password }).then(response => {
                if(response.status === 200) {
                    let { data } = response
                    data.expires_at = Date.now() + ( 3600 * 1000 * 24)
                    data.account = account
                    data.right = "admin"
                    commit('LOGIN', data)
                    resolve()
                } else {
                    reject('帳號密碼錯誤')
                }
            }).catch(error => {
                reject(error)
            })
        })
    },
    googleLogin({ commit }, data) {
        commit('LOGIN', data)
    },
    resetState({ commit }) {
        commit('RESET_STATE')
    },
}

// 任何更改state的值的行為都必須透過mutation
const mutations = {
    LOGIN(state, data) {
        state.user= data
        localStorage.setItem("NCUE_IM_user", JSON.stringify(data))
    },
    RESET_STATE(state) {
        Object.assign(state, getDefaultState())
        localStorage.setItem("NCUE_IM_user", JSON.stringify(getDefaultState()))
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    actions
}