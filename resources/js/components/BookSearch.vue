<template>
    <h2>検索</h2>
    <div class="my-3">
        <label for="search" class="form-label">書籍の検索</label>
        <input type="text" name="search" id="" class="form-control" v-model="keyword">
        <button class="btn btn-primary" v-on:click="search">検索</button>
    </div>
    <ul v-for="Book in Books" class="list-group">
        <li class="list-group-item">{{ Book.title }}</li>
    </ul>
</template>

<script>
import axios from "axios";

export default {
    name: 'BookSearch',
    data() {
        return {
            APIdata: '',
            Books: '',
            keyword: ''
        }
    },
    methods: {
        async search() {
            console.log(this.keyword);
            const url = "/api/books/search";
            // axios.post('送信先のurl','データ（オブジェクトで渡す）')
            const response =
                await axios.post(
                    url,
                    { keyword: this.keyword }
                );

            console.log(response.data);
            // 検索結果を保存
            const result = response.data;
            this.Books = result;

        }
    }
}
</script>