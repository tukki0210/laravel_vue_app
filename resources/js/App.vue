<template>
    <h1>Hello World</h1>
    <BookAdd />
    <BookList />
    <UserList />
</template>

<script>
import BookList from './components/BookList.vue'
import UserList from './components/UserList.vue'
import BookAdd from './components/BookAdd.vue'

export default {
    name: 'App',
    components:{
        BookList,
        UserList,
        BookAdd
    },
}
</script>