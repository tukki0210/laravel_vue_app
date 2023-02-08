import {createRouter, createWebHistory} from 'vue-router'
// 必要なコンポーネントをインポート
import BookList from '../components/BookList.vue'
import BookAdd from '../components/BookAdd.vue'
import BookSearch from '../components/BookSearch.vue'
import BookDetail from '../components/BookDetail.vue'

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
            path: '/book/:id',
            name: 'book',
            component: BookDetail
        },
        {
            path: '/add',
            // nameには一意な名前をつける
            name: 'add', 
            component: BookAdd,
        },
        {
            path: '/search',
            name: 'search', 
            component: BookSearch,
        },
        {
            path: '/user',
            name: 'user', 
            component: UserList,
        },
    ]
})

export default router