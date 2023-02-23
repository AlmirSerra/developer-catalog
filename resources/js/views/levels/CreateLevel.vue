<template>
    <div class="container">
      <h2 class="mb-4">Create Level</h2>
      <form @submit.prevent="handleSubmit">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" v-model="level.name" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" rows="3" v-model="level.description" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary" :disabled="loading">{{ loading ? 'Loading...' : 'Create' }}</button>
      </form>
      <div v-if="success" class="alert alert-success mt-4" role="alert">
        {{ success }}
      </div>
      <div v-if="error" class="alert alert-danger mt-4" role="alert">
        {{ error }}
      </div>
    </div>
  </template>
  
  <script>
  import { mapActions } from 'vuex'
  
  export default {
    name: 'CreateLevel',
    data() {
      return {
        level: {
          name: '',
          description: ''
        },
        loading: false,
        success: '',
        error: ''
      }
    },
    methods: {
      ...mapActions(['createLevel']),
      async handleSubmit() {
        try {
          this.loading = true
          await this.createLevel(this.level)
          this.success = 'Level created successfully!'
          this.level.name = ''
          this.level.description = ''
        } catch (error) {
          this.error = error.response.data.message
        } finally {
          this.loading = false
        }
      }
    }
  }
  </script>
  