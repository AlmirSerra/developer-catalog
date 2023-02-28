<template>
    <div>
      <h3 class="mb-3">Adicionar Desenvolvedor</h3>
      <form @submit.prevent="addDeveloper">
        <div class="form-group">
          <label>Nome:</label>
          <input type="text" class="form-control" v-model="developer.name" required>
        </div>
        <div class="form-group">
          <label>Email:</label>
          <input type="email" class="form-control" v-model="developer.email" required>
        </div>
        <div class="form-group">
          <label>Nível:</label>
          <select class="form-control" v-model="developer.level" required>
            <option value="">Selecione o nível</option>
            <option value="Junior">Junior</option>
            <option value="Pleno">Pleno</option>
            <option value="Senior">Senior</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    name: "createDevelopers",
    data() {
      return {
        developer: {
          name: "",
          email: "",
          level: "",
        },
      };
    },
    methods: {
      async addDeveloper() {
        try {
          const response = await this.axios.post("/api/developer", this.developer);
          this.$router.push({ name: "developer" });
        } catch (error) {
          console.log(error);
        }
      },
    },
  };
  </script>
  