<template>
    <div class="container">
        <div class="d-flex my-5">
            <img v-bind:src="bookData.largeImageUrl" v-bind:alt="bookData.title">
            <div class="m-3">
                <h2>{{ bookData.title }}</h2>
                <div class="d-flex justify-content-around">
                    <p>{{ bookData.publisherName }}</p>
                    <p>{{ bookData.isbn }}</p>
                </div>
                <p>{{ bookData.itemCaption }}</p>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            この本を借りる
        </button>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">この本を借りる</h5>
                        <button type="button" class="btn-close" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        （２週間後の日付）まで借りる or （レンタル中のため）借りることが出来ないことを表示
                        <input type="date" v-model="returnDay">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                v-on:click="rentBook">決定</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { addWeeks } from 'date-fns';


export default {
    name: 'BookDetail',
    data() {
        return {
            bookData: {},
            returnDay: ''
        }
    },
    async mounted() {
        // api/books/1や api/books/2にアクセスしたい
        // ${}はテンプレートリテラル
        const url = `/api/books/${this.$route.params.id}`;
        const response = await axios.get(url);
        console.log(response)
        this.bookData = response.data;
    },
    methods: {
        async rentBook() {
            // APIに対して、借りる処理を送る
            // loansテーブルのapiに、book_id,user_id,loan_date,return_dateを送信する処理
            const url = "/api/loans";

            // クリックした時点のDateオブジェクト
            const now = new Date();
            const loan_date = now.toLocaleDateString();

            // 返却日は２週間後とする
            // P279を参照
            // const twoWeekLater = new Date(now.getFullYear(),now.getMonth(),now.getDate()+14);
            // const twoWeekLater = addWeeks(now,2);

            // const return_date = twoWeekLater.toLocaleDateString();
            const return_date = this.returnDay;

            // この本を借りることをAPIに送る
            const response =
                await axios.post(
                    url,
                    {
                        book_id: this.$route.params.id,
                        // user_idはログイン認証が完成したら設定
                        user_id: 2,
                        loan_date: loan_date,
                        return_date: return_date
                    }
                );
            console.log(response);

            // 本を借りたらページ移動をする
            // vue-routerのリダイレクト P360
            this.$router.push('/');
        }
    }
}
</script>