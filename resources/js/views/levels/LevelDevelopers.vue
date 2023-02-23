<template>
    <div>
      <div class="level-info">
        <h1 class="title">{{ level.name }} Developers</h1>
        <router-link :to="{ name: 'editLevel', params: { id: level.id } }" class="button is-link">Edit Level</router-link>
      </div>
      <hr>
      <h2 class="subtitle">Developers:</h2>
      <table class="table is-fullwidth">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="developer in level.developers" :key="developer.id">
            <td>{{ developer.name }}</td>
            <td>{{ developer.email }}</td>
            <td>
              <remove-developer :developer="developer" :level="level" />
            </td>
          </tr>
        </tbody>
      </table>
      <router-link :to="{ name: 'addDeveloper', params: { id: level.id } }" class="button is-primary mt-5">Add Developer</router-link>
    </div>
  </template>
  
  <script>
  import RemoveDeveloper from '@/components/levels/RemoveDeveloper'
  import { mapGetters } from 'vuex'
  
  export default {
    name: 'LevelDevelopers',
    components: {
      RemoveDeveloper
    },
    computed: {
      ...mapGetters(['levelById']),
      level() {
        return this.levelById(Number(this.$route.params.id))
      }
    }
  }
  </script>
  
  <style scoped>
  .level-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
  }
  </style>
  