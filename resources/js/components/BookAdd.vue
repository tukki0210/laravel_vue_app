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

            <label for="rakutenBooksAPI">楽天ブックスAPIから探す</label>
            <input type="text" id="rakutenBooksAPI" class="form-control" v-model="title">

            <button type="button" class="btn btn-info" v-on:click="getBooksDataByRakutenAPI">本のデータを取得</button>
        </div>

        <div v-for="APIDatum in APIData">
            <div class="border border-primary d-flex">
                <img v-bind:src="APIDatum.Item.mediumImageUrl" v-bind:alt="APIDatum.Item.title">
                <div>
                    <p>{{ APIDatum.Item.title }}</p>
                    <!-- 拡張機能のポップアップは無視する（clickなどのイベントオブジェクトを表示しろという意味） -->
                    <button class="btn btn-primary" v-on:click="addBook(APIDatum)">登録</button>
                </div>
            </div>
        </div>
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
            title: 'Java'
        }
    },
    methods: {
        // clickイベントの発火時に動作するメソッド
        async send() {
            const url = "/api/books";
            // axios.post('送信先のurl','データ')
            const response = await axios.post(url, this.book);
        },
        async getBooksDataByRakutenAPI() {
            const url = "/api/books/getRakutenAPI";
            const response = await axios.get(url, {
                // paramsにクエリ（URLの？以降）を書ける
                params: {
                    title: this.title
                }
            });

            // APIからの出力結果
            this.APIData = response.data.Items
        },
        async addBook(APIDatum) {
            const url = "/api/books";
            // axios.post('送信先のurl','データ')
            console.log(APIDatum);
            // 選んだ本のデータを登録用に加工する
            const selectBook = APIDatum.Item
            
            const bookData = {
                title: selectBook.title,
                author: selectBook.author,
                publisherName: selectBook.publisherName,
                isbn: selectBook.isbn,
                itemCaption: selectBook.itemCaption,
                // ジャンルはJavaで仮に入れる
                gunre: 'Java',
                largeImageUrl: selectBook.largeImageUrl,
                mediumImageUrl:selectBook.mediumImageUrl,
                available: true
            }
            // データベースに保存のAPIを叩く
            const response = await axios.post(url, bookData);
            console.log(response);
        }
    }
}
</script>