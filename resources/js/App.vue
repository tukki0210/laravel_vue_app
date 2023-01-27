<template>
    <h1>Hello World</h1>
    <ul v-for="datum in data"  class="list-group">
        <li class="list-group-item">{{ datum.title }}</li>
    </ul>
    <h2>ユーザー名</h2>
    <ul v-for="user in users"  class="list-group">
        <li class="list-group-item">{{ user.name }}</li>
    </ul>
    
</template>

<script>
import axios from "axios";

export default {
    name: 'App',
    data(){
      return {
        data:'',
        users:''
      }
    },
    async mounted() {
        const url = "/api/books";
        const response = await axios.get(url);
        console.log(response.data);
        // このresponse.dataは３つのオブジェクトが入った配列
        this.data = response.data;

        const userUrl = "/api/users";
        const userResponse = await axios.get(userUrl);
        this.users = userResponse.data;
    }
}
</script>