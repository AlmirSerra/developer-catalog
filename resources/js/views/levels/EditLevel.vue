<template>
    <div>
      <h2>Edit Level</h2>
      <div class="form-group">
        <label for="name">Name</label>
        <input v-model="level.name" type="text" class="form-control" id="name" required>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea v-model="level.description" class="form-control" id="description" rows="3" required></textarea>
      </div>
      <button class="btn btn-primary" @click="updateLevel">Update Level</button>
      <router-link to="/levels" class="btn btn-danger ml-2">Cancel</router-link>
      <hr>
      <h3>Developers Assigned to Level</h3>
      <ul>
        <li v-for="(developer, index) in levelDevelopers" :key="developer.id">
          {{ developer.name }} - {{ developer.email }}
          <button class="btn btn-danger btn-sm ml-2" @click="removeDeveloper(index)">Remove</button>
        </li>
      </ul>
      <h3>Assign Developer to Level</h3>
      <div class="form-group">
        <label for="developer-select">Select Developer:</label>
        <select class="form-control" id="developer-select" v-model="selectedDeveloperId">
          <option v-for="developer in developers" :value="developer.id" :key="developer.id">
            {{ developer.name }} - {{ developer.email }}
          </option>
        </select>
      </div>
      <button class="btn btn-primary" @click="addDeveloper">Assign Developer</button>
    </div>
  </template>
  
  <script>
  import { mapGetters, mapActions } from 'vuex'
  
  export default {
    name: 'EditLevel',
    data() {
      return {
        level: {},
        selectedDeveloperId: ''
      }
    },
    computed: {
      ...mapGetters(['levelById', 'developersList']),
      levelDevelopers() {
        if (this.level && this.level.developers) {
          return this.level.developers.map((developerId) =>
            this.developersList.find((developer) => developer.id === developerId)
          )
        }
        return []
      }
    },
    methods: {
      ...mapActions(['updateLevel']),
      removeDeveloper(index) {
        this.level.developers.splice(index, 1)
        this.updateLevel(this.level)
      },
      addDeveloper() {
        if (this.selectedDeveloperId && !this.level.developers.includes(this.selectedDeveloperId)) {
          this.level.developers.push(this.selectedDeveloperId)
          this.updateLevel(this.level)
          this.selectedDeveloperId = ''
        }
      }
    },
    mounted() {
      const { id } = this.$route.params
      const level = this.levelById(id)
      this.level = Object.assign({}, level)
    }
  }
  </script>
  