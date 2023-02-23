<template>
    <div>
      <div class="alert alert-success" role="alert" v-if="success">
        {{ success }}
      </div>
      <div class="alert alert-danger" role="alert" v-if="error">
        {{ error }}
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'LevelSuccessError',
    props: {
      success: {
        type: String,
        default: ''
      },
      error: {
        type: String,
        default: ''
      }
    }
  }
  </script>
  