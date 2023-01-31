<template>
    <h2>本</h2>
    <ul v-for="datum in data"  class="list-group">
        <li class="list-group-item">{{ datum.title }}</li>
    </ul>

</template>

<script>
import axios from "axios";

export default {
    name: 'BookList',
    data(){
      return {
        data:''
      }
    },
    // mounted:このBookListコンポーネントが作られたあとに１度動作する
    async mounted() {
        const url = "/api/books";
        const response = await axios.get(url);
        console.log(response.data);
        // このresponse.dataは３つのオブジェクトが入った配列
        this.data = response.data;
    }
}
</script>