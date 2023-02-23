<template>
    <div>
      <input type="text" v-model="searchTerm" placeholder="Search">
      <button @click="search">Search</button>
      <button @click="clear">Clear</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        searchTerm: '',
      }
    },
    methods: {
      search() {
        this.$emit('search', this.searchTerm);
      },
      clear() {
        this.searchTerm = '';
        this.$emit('clear');
      },
    },
  };
  </script>
  