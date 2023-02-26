<template>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header"><h4>Criar Developer</h4></div>
          <div class="card-body">
            <form @submit.prevent="create">
              <div class="row">
                <div class="col-12 mb-2">
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" v-model="developer.name">
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" v-model="developer.email">
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control" v-model="developer.birthdate">
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="form-group">
                    <label>Nível</label>
                    <select class="form-control" v-model="developer.level_id">
                      <option value="" disabled selected>Selecione o nível</option>
                      <option v-for="level in levels" :key="level._id" :value="level._id">{{ level.name }}</option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </template>

<script>
export default {
  name: "create-developer",
  data() {
    return {
      developer: {
        name: "",
        email: "",
        birthdate: "",
        level_id: ""
      },
      levels: [] // adicionei essa propriedade para preencher o select de níveis
    };
  },
  async created() {
    await this.loadLevels();
  },
  methods: {
    async loadLevels() {
      await this.axios
        .get("/api/level")
        .then((response) => {
          this.levels = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    async create() {
      await this.axios
        .post("/api/developer", this.developer)
        .then((response) => {
          this.$router.push({ name: "showDeveloper" });
        })
        .catch((error) => {
          console.log(error);
        });
    }
  }
};

</script>