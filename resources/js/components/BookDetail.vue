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
                    <button type="button" class="btn-close"  aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    （２週間後の日付）まで借りる or （レンタル中のため）借りることが出来ないことを表示
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" v-on:click="rentBook">決定</button>
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
            const twoWeekLater = new Date(now.getFullYear(),now.getMonth(),now.getDate()+14);
            const return_date = twoWeekLater.toLocaleDateString();

            // この本を借りることをAPIに送る
            const response =
                await axios.post(
                    url,
                    {
                        book_id: this.$route.params.id,
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