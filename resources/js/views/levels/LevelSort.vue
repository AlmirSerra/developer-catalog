<template>
    <div class="row mt-3">
      <div class="col-md-4">
        <label class="form-label">Ordenar por:</label>
        <select class="form-select" v-model="sort.column" @change="changeSort">
          <option value="name">Nome</option>
          <option value="description">Descrição</option>
        </select>
      </div>
      <div class="col-md-4">
        <label class="form-label">Ordem:</label>
        <select class="form-select" v-model="sort.order" @change="changeSort">
          <option value="asc">Ascendente</option>
          <option value="desc">Descendente</option>
        </select>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'LevelSort',
    props: {
      sort: {
        type: Object,
        required: true
      }
    },
    methods: {
      changeSort() {
        this.$emit('sort-change', this.sort)
      }
    }
  }
  </script>
  