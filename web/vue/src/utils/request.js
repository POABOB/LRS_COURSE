import axios from 'axios'
// import { MessageBox, Message } from 'element-ui'
import store from '../store'
// import Vue from 'vue';
import Swal from 'sweetalert2'

// create an axios instance
const service = axios.create({
    // ENV設定
  baseURL: process.env.VUE_APP_BASE_API, // url = base url + request url
  // withCredentials: true, // send cookies when cross-domain requests
  timeout: 10000 // request timeout
})



// request interceptor
service.interceptors.request.use(
  config => {
    // do something before request is sent
    const { user } = JSON.parse(JSON.stringify(store.state.user))
    if (user.token !== null) {

      // let each request carry token
      // ['Authorization'] is a custom headers key
      // please modify it according to the actual situation
      config.headers['Authorization'] =  'Bearer ' + user.token
    }
    return config
  },
  error => {
    // do something with request error
    console.log(error) // for debug
    return Promise.reject(error)
  }
)

// response interceptor
service.interceptors.response.use(
  /**
   * If you want to get http information such as headers or status
   * Please return  response => response
  */

  /**
   * Determine the request status by custom status
   * Here is just an example
   * You can also judge the status by HTTP Status status
   */
  response => {
    const res = response.data
    // if the custom status is not 20000, it is judged as an error.
    if (res.status !== 200) {
      Swal.fire({
            icon: 'error',
            title: res.message || 'Error',
            showConfirmButton: true,
            timer: 1500,
        })
      // 50008: Illegal token; 50012: Other clients logged in; 50014: Token expired;
      if (res.status === 508 || res.status === 512 || res.status === 514) {
        // to re-login
        Swal.fire({
            title: 'Token過期，請重新登入！',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: '重新登入',
            cancelButtonText: `取消`,
            type: 'info'
          }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    store.dispatch('user/resetState').then(() => {
                        location.reload()
                    })
                }
          })
      }
      return Promise.reject(new Error(res.message || 'Error'))
    } else {
      return res
    }
  },
  error => {
    console.log('err' + error) // for debug
    Swal.fire({
        icon: 'error',
        title: error.message,
        showConfirmButton: true,
        timer: 5 * 1000,
    })
    return Promise.reject(error)
  }
)

export default service