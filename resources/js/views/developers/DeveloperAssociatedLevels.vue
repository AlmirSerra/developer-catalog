<template>
    <div>
      <div class="card mb-4">
        <div class="card-header">Níveis Associados</div>
        <div class="card-body">
          <div v-if="associatedLevels.length === 0" class="alert alert-warning">
            Este desenvolvedor não está associado a nenhum nível.
          </div>
          <div v-else class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nível</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="level in associatedLevels" :key="level.id">
                  <td>{{ level.title }}</td>
                  <td>
                    <button class="btn btn-danger btn-sm" @click="removeAssociation(level.id)">
                      Desassociar
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      associatedLevels: {
        type: Array,
        required: true
      },
      developerId: {
        type: Number,
        required: true
      }
    },
    methods: {
      removeAssociation(levelId) {
        if (confirm("Tem certeza que deseja desassociar este nível?")) {
          axios.delete(`/api/developers/${this.developerId}/levels/${levelId}`)
            .then(response => {
              this.$emit('level-association-removed', levelId);
            })
            .catch(error => {
              console.log(error);
            });
        }
      }
    }
  }
  </script>
  