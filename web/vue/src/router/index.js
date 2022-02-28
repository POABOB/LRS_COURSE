import { createRouter, createWebHashHistory } from "vue-router"
import DefaultLayout from "../components/DefaultLayout.vue"
import store from "../store"

const routes = [
    // PLAN A STUDENTS LIST
    {
        path: '/',
        name: 'Home', 
        component: () => import("../views/Home.vue")
    },
    // PLAN B GOOGLE驗證
    {
        path: '/google',
        name: 'Google',
        component: () => import("../views/Google.vue")
    },
    // 學生登入後可以開始選課程，並進入課程
    {
        path: '/course/list', 
        name: 'Course_List', 
        component: () => import("../views/course/List.vue"),
        meta: { requireAuth: true, },
    },
    {
        path: '/course/A', 
        name: 'Course_A', 
        component: () => import("../views/course/A.vue"),
        meta: { requireAuth: true, },
    },
    {
        path: '/course/B', 
        name: 'Course_B', 
        component: () => import("../views/course/B.vue"),
        meta: { requireAuth: true, },
    },
    {
        path: '/course/C', 
        name: 'Course_C', 
        component: () => import("../views/course/C.vue"),
        meta: { requireAuth: true, },
    },
    {
        path: '/course/D', 
        name: 'Course_D', 
        component: () => import("../views/course/D.vue"),
        meta: { requireAuth: true, },
    },
    // 後台登入
    {
        path: '/login',
        name: 'Login',
        component: () => import("../views/Login.vue"),
    },
    // 後台首頁，PLAN A 增刪改查學生
    {
        path: '/admin',
        component: DefaultLayout,
        meta: { requireAdminAuth: true, },
        children: [
            { path: '/admin', name: 'Admin_Home', component: () => import("../views/admin/Home.vue") },
        ]
    },
]

const router = createRouter({
    history: createWebHashHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    const { user } = JSON.parse(JSON.stringify(store.state.user))
    if(to.meta.requireAuth === true && (!user.token || user.right !== 'student')) {
        // 學生課程前要先有登入的資料
        console.log(1);
        next({ name: 'Home' })
    } else if (to.meta.requireAdminAuth === true && (!user.token || user.right !== 'admin' || user.expires_at < Date.now())) {
        // 後台驗證
        // 清空store
        next({ name: 'Login' })
    } else {
        next()
    }
})

export default router