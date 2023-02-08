<template>
    <h2>書籍の詳細</h2>
    <div>
        <!-- 本の情報を受け取って表示させる -->
        <!-- P362 ルートパラメータを受け取る -->
        {{ bookData }}
    </div>
</template>

<script>
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
}
</script>