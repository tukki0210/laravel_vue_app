<template>
    <!-- class="container" bootstrap 幅をレスポンシブに調整してくれる -->
    <div class="container">
        <h1>Hello World</h1>
        <router-link to="/">書籍一覧</router-link>
        <router-link to="/add">本の追加</router-link>
        <router-link to="/user">ユーザ一覧</router-link>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: 'App',
}
</script>