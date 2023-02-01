<template>
    <h2>本</h2>
    <div class="my-3">
      <label for="search" class="form-label">本の検索</label>
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
        // data: '',
        APIdata:'',
        Books:'',
        keyword: ''
      }
    },
    // mounted:このBookListコンポーネントが作られたあとに１度動作する
    async mounted() {
      const url = "/api/books";
      const response = await axios.get(url);
      console.log(response.data);
      // このresponse.dataは３つのオブジェクトが入った配列
  
      // APIから取得した全データを保存
      this.APIdata = response.data;
  
      // 検索機能で上書きするためにコピーを作る
      this.Books =  response.data;
    },
    methods: {
      search() {
        console.log(this.keyword);
        // 完全一致の場合のみ
        // const result = this.data.filter(book => book.title === this.keyword);
        // 指定した文字を含む場合を作りたい
        const result = this.APIdata.filter(book => book.title.includes(this.keyword));
        console.log(result);
        // this.Booksを上書き
        this.Books = result;
      }
    }
  }
  </script>