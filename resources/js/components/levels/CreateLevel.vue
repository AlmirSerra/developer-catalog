<template>
    <div>
      <h3>Criar Nivel</h3>
      <hr>
  
      <form @submit.prevent="createLevel">
        <div class="form-group">
          <label for="name">Nome do Nivel</label>
          <input type="text" class="form-control" id="name" v-model="level.name" required>
        </div>
  
        <div class="form-group">
          <label for="description">Descrição</label>
          <textarea class="form-control" id="description" rows="3" v-model="level.description"></textarea>
        </div>
  
        <button type="submit" class="btn btn-primary">Criar Nivel</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        level: {
          name: '',
          description: ''
        }
      }
    },
    methods: {
      createLevel() {
        axios.post('/api/level', this.level)
          .then(response => {
            this.$router.push({ name: 'showLevel' });
          })
          .catch(error => {
            console.log(error.response);
          });
      }
    }
  }
  </script>
  