import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  // VITE 定義 DEV
  // define: {
  //   "process.env": {
  //     "VUE_APP_BASE_API": "http://localhost:3000",
  //     "VUE_APP_GOOGLE_CLIENT_ID": "696986273196-5s33ifc2avobjiff784eqbf2e1tnn586.apps.googleusercontent.com"
  //   },
  // },

  // VITE 定義 PRD
  define: {
    "process.env": {
      "VUE_APP_BASE_API": "http://lrs.im.ncue.edu.tw:3000",
      "VUE_APP_GOOGLE_CLIENT_ID": "696986273196-ete7bbkt6jkuq761fpeuvo17mfh8jbke.apps.googleusercontent.com"
    }
  },
  
  base: '/public/'
})
