<template>
    <div>
      <label>Sort by:</label>
      <select v-model="sortBy" @input="sort">
        <option value="">None</option>
        <option v-for="field in fields" :value="field">{{ field }}</option>
      </select>
      <button @click="reverseSort">{{ sortDirection }}</button>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      fields: {
        type: Array,
        required: true,
      },
    },
    data() {
      return {
        sortBy: '',
        sortAscending: true,
      }
    },
    computed: {
      sortDirection() {
        return this.sortAscending ? '▲' : '▼';
      },
    },
    methods: {
      sort() {
        this.$emit('sort', this.sortBy, this.sortAscending);
      },
      reverseSort() {
        this.sortAscending = !this.sortAscending;
        this.sort();
      },
    },
  };
  </script>
  