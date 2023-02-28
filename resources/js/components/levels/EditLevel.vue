<template>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Edit Level
            </div>
            <div class="card-body">
              <form @submit.prevent="updateLevel">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" v-model="level.name" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "EditLevel",
    data() {
      return {
        level: {},
      };
    },
    created() {
      const id = this.$route.params.id;
      axios.get(`/api/level/${id}`).then((response) => {
        this.level = response.data;
      });
    },
    methods: {
      updateLevel() {
        const id = this.$route.params.id;
        axios.put(`/api/level/${id}`, this.level).then((response) => {
          this.$router.push({ name: "showLevels" });
        });
      },
    },
  };
  </script>
  