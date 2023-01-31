import {createRouter, createWebHistory} from 'vue-router'
// 必要なコンポーネントをインポート
import BookList from '../components/BookList.vue'
import BookAdd from '../components/BookAdd.vue'
import UserList from '../components/UserList.vue'

export const router = createRouter({
    history: createWebHistory(),
    routes: [
        // 必要な数だけ書く
        {
            path: '/',
            name: 'index',
            component: BookList,
        },
        {
            path: '/add',
            // nameには一意な名前をつける
            name: 'add', 
            component: BookAdd,
        },
        {
            path: '/user',
            // nameには一意な名前をつける
            name: 'user', 
            component: UserList,
        },
    ]
})

export default router