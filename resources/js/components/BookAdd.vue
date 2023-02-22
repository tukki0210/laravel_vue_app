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
        <button type="button" class="btn btn-info" v-on:click="send">送信</button>

        <div class="mt-5">
            <button type="button" class="btn btn-info" v-on:click="getBooksDataByRakutenAPI">本のデータを取得</button>
        </div>

        <ul v-for="(APIDatum, index) in APIData">
            <li class="border border-primary" v-bind:key="index" v-on:click="addBook(APIDatum)">{{ APIDatum.Item.title }}
            </li>
        </ul>
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
            },
            APIData: [],
        }
    },
    methods: {
        // clickイベントの発火時に動作するメソッド
        async send() {
            const url = "/api/books";
            // axios.post('送信先のurl','データ')
            const response = await axios.post(url, this.book);
            console.log(response);
        },
        async getBooksDataByRakutenAPI() {
            const url = "/api/books/getRakutenAPI";
            const response = await axios.get(url);
            this.APIData = response.data.Items
            console.log(this.APIData[0]);
        },
        async addBook(APIDatum) {
            const url = "/api/books";
            // axios.post('送信先のurl','データ')
            console.log(APIDatum);
            // 選んだ本のデータ
            const bookData = {
                'title': APIDatum.Item.title,
                'author': APIDatum.Item.author,
                'publisherName': APIDatum.Item.publisherName,
                'isbn': APIDatum.Item.isbn,
                'itemCaption': APIDatum.Item.itemCaption,
                'gunre': 'Java',
                'largeImageUrl': APIDatum.Item.largeImageUrl,
                'mediumImageUrl': APIDatum.Item.mediumImageUrl,
                'available':true
            }
            const response = await axios.post(url, bookData);
            console.log(response);
        }
    }
}
</script>