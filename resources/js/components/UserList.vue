<template>
    <h2>ユーザー名</h2>
    <ul v-for="user in users"  class="list-group">
        <li class="list-group-item">{{ user.name }}</li>
    </ul>
</template>

<script>
import axios from "axios";

export default {
    name: 'UserList',
    data(){
      return {
        users:''
      }
    },
    async mounted() {
        const userUrl = "/api/users";
        const userResponse = await axios.get(userUrl);
        this.users = userResponse.data;
    }
}
</script>