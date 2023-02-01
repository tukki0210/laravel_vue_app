<template>
    <!-- class="container" bootstrap 幅をレスポンシブに調整してくれる -->
    <div class="container">
        <h1>Hello World</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link to="/" class="navbar-brand">書籍一覧</router-link>
            <router-link to="/add" class="navbar-brand">本の追加</router-link>
            <router-link to="/user" class="navbar-brand">ユーザ一覧</router-link>
        </nav>

        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: 'App',
}
</script>