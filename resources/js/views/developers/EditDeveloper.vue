<template>
    <div>
      <h1>Edit Developer</h1>
      <form @submit.prevent="editDeveloper">
        <div>
          <label for="name">Name</label>
          <input type="text" name="name" id="name" v-model="developer.name" />
          <developer-form-validation :errors="errors" field="name" />
        </div>
        <div>
          <label for="email">Email</label>
          <input type="email" name="email" id="email" v-model="developer.email" />
          <developer-form-validation :errors="errors" field="email" />
        </div>
        <div>
          <label for="level_id">Level</label>
          <select name="level_id" id="level_id" v-model="developer.level_id">
            <option v-for="level in levels" :value="level.id" :key="level.id">{{ level.name }}</option>
          </select>
        </div>
        <div>
          <button type="submit">Save</button>
        </div>
      </form>
      <developer-success-error :success="success" :error="error" />
    </div>
  </template>
  
  <script>
  import axios from 'axios'
  import DeveloperFormValidation from '@/components/DeveloperFormValidation.vue'
  import DeveloperSuccessError from '@/components/DeveloperSuccessError.vue'
  
  export default {
    components: {
      DeveloperFormValidation,
      DeveloperSuccessError
    },
    data () {
      return {
        developer: {
          name: '',
          email: '',
          level_id: ''
        },
        levels: [],
        success: '',
        error: '',
        errors: {}
      }
    },
    created () {
      this.fetchDeveloper()
      this.fetchLevels()
    },
    methods: {
      fetchDeveloper () {
        const id = this.$route.params.id
        axios.get(`/api/developers/${id}`)
          .then(response => {
            this.developer = response.data
          })
          .catch(error => {
            console.log(error)
          })
      },
      fetchLevels () {
        axios.get('/api/levels')
          .then(response => {
            this.levels = response.data.data
          })
          .catch(error => {
            console.log(error)
          })
      },
      editDeveloper () {
        const id = this.$route.params.id
        axios.put(`/api/developers/${id}`, this.developer)
          .then(response => {
            this.success = 'Developer edited successfully.'
            this.error = ''
            this.errors = {}
          })
          .catch(error => {
            if (error.response.status === 422) {
              this.errors = error.response.data.errors
              this.success = ''
              this.error = ''
            } else {
              this.error = 'An error occurred while editing the developer.'
              this.success = ''
              this.errors = {}
            }
          })
      }
    }
  }
  </script>
  