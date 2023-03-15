<template>
    <div class="container">
      <button type="button" class="btn btn-info" v-on:click="send">ログアウト</button>
    </div>
  </template>
  <script>
    import axios from 'axios';
  
    export default {
      name: 'Logout',
      methods: {
        async send() {
          const url = '/api/logout';
          
          const response = await axios.get(url);
          console.log(response);
  
          // ログアウトに成功したら、クッキーを削除する(有効期限を過去にする)
          document.cookie = 'XSRF-TOKEN=; expires=Thu, 01 Jan 1970 00:00:00 GMT;';
          document.cookie = 'laravel_session=; expires=Thu, 01 Jan 1970 00:00:00 GMT;';

          // ログアウトに成功したら、ログインページに遷移する
          this.$router.push('/login');
        },
      },
    };
  </script>