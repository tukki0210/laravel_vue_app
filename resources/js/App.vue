<template>
    <h1>Hello World</h1>
    <BookList />
    <UserList />
</template>

<script>
import BookList from './components/BookList.vue'
import UserList from './components/UserList.vue'

export default {
    name: 'App',
    components:{
        BookList,
        UserList
    },
}
</script>