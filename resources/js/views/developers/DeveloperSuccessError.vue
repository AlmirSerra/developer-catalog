<template>
    <div>
      <div v-if="success" class="alert alert-success" role="alert">
        {{ success }}
      </div>
      <div v-if="error" class="alert alert-danger" role="alert">
        {{ error }}
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      successMessage: String,
      errorMessage: String,
    },
    data() {
      return {
        success: null,
        error: null,
      };
    },
    watch: {
      successMessage(value) {
        this.success = value;
        setTimeout(() => (this.success = null), 5000);
      },
      errorMessage(value) {
        this.error = value;
        setTimeout(() => (this.error = null), 5000);
      },
    },
  };
  </script>
  