<template>
    <div class="form-group">
      <label for="search">Search:</label>
      <input
        type="text"
        class="form-control"
        id="search"
        v-model="search"
        placeholder="Search levels by name"
      />
    </div>
  </template>
  
  <script>
  export default {
    name: 'LevelSearch',
    data() {
      return {
        search: ''
      }
    },
    watch: {
      search: function() {
        this.$emit('search', this.search)
      }
    }
  }
  </script>
  