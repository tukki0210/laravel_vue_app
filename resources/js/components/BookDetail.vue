<template>
    <h2>書籍の詳細</h2>
    <div>
        <!-- 本の情報を受け取って表示させる -->
        <!-- P362 ルートパラメータを受け取る -->
        {{ bookData }}
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    （２週間後の日付）まで借りる or （レンタル中のため）借りることが出来ないことを表示
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                    <button type="button" class="btn btn-primary" v-on:click="rentBook">決定</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'BookDetail',
    data() {
        return {
            bookData: {}
        }
    },
    async mounted() {
        // api/books/1や api/books/2にアクセスしたい
        // ${}はテンプレートリテラル
        const url = `/api/books/${this.$route.params.id}`;
        const response = await axios.get(url);
        this.bookData = response.data;
    },
    methods: {
        async rentBook() {
            // APIに対して、借りる処理を送る
            // loansテーブルのapiに、book_id,user_id,loan_date,return_dateを送信する処理
            const url = "/api/loans";
            const response = await axios.get(url);
            console.log(response.data);
        }
    }
}
</script>