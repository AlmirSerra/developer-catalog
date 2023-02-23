<template>
    <div>
      <h2>Cadastrar Desenvolvedor</h2>
      <form @submit.prevent="saveDeveloper">
        <div>
          <label for="name">Nome:</label>
          <input type="text" id="name" v-model="developer.name" required>
        </div>
        <div>
          <label for="email">Email:</label>
          <input type="email" id="email" v-model="developer.email" required>
        </div>
        <div>
          <label for="level_id">Nível:</label>
          <select id="level_id" v-model="developer.level_id" required>
            <option v-for="level in levels" :value="level.id">{{ level.name }}</option>
          </select>
        </div>
        <button type="submit">Salvar</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        developer: {
          name: '',
          email: '',
          level_id: '',
        },
        levels: [],
      };
    },
    mounted() {
      this.fetchLevels();
    },
    methods: {
      fetchLevels() {
        // chamar API para buscar níveis
      },
      saveDeveloper() {
        // chamar API para salvar desenvolvedor
      },
    },
  };
  </script>
  