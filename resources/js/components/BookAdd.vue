<template>
    <div class="container">
        <label for="title" class="form-label">タイトル</label>
        <!-- P.65 v-model(双方向データバインディング) -->
        <input type="text" name="title" id="" class="form-control" v-model="book.title">
        <br>
        <label for="author" class="form-label">著者</label>
        <input type="text" name="author" id="author" class="form-control" v-model="book.author">
        <br>
        <!-- P.53 v-on イベント -->
        <button class="btn btn-info" v-on:click="send">送信</button>
    </div>
</template>
<script>
import axios from "axios";

export default {
    name: 'BookList',
    data() {
        return {
            // 入力フォームのデータを保存するオブジェクト
            // bookモデルで入力する内容と一致させる
            book: {
                title: '',
                author: '',
                publisher: 'test',
                ISBN: '1111',
                summary: 'test',
                gunre: 'test',
                available: true
            }
        }
    },
    methods: {
        // clickイベントの発火時に動作するメソッド
        async send() {
            const url = "/api/books";
            // axios.post('送信先のurl','データ')
            const response = await axios.post(url, this.book);
            console.log(response);
        }
    }
}
</script>