<template>
    <h2>ログインページ</h2>
    <div class="container">
        <div>
            <label for="email" class="form-label">メールアドレス</label>
            <input type="email" name="email" id="email" class="form-control" v-model="email">
        </div>
        <div>
            <label for="password" class="form-label">パスワード</label>
            <input type="password" name="password" id="password" class="form-control" v-model="password">
        </div>
        <!-- JavaScriptを動作させるので、type="submit"ではない -->
        <button type="button" class="btn btn-info" v-on:click="login">ログイン</button>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: 'Login',
    data(){
      return {
        email:'',
        password:''
      }
    },
    methods:{
        async login() {
            // getでアクセスするだけでCSRFクッキーがもらえる
            const csrfCookie = await axios.get('/sanctum/csrf-cookie');
            // 確認するだけ
            console.log(csrfCookie);

            // 本命のログイン
            // 本当はtry-catchでエラーの場合の処理もした方がよいかも
            const response = await axios.post('/api/login',{
                email:this.email,
                password:this.password
            })

            console.log(response);
        }
    }
    
}
</script>