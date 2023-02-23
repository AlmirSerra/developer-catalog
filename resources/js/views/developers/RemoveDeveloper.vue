<template>
    <div>
      <button class="btn btn-danger" @click="showModal = true">
        Remove
      </button>
      <Modal v-if="showModal">
        <p>Are you sure you want to remove this developer?</p>
        <div class="d-flex justify-content-end">
          <button class="btn btn-secondary" @click="showModal = false">
            Cancel
          </button>
          <button class="btn btn-danger" @click="removeDeveloper">
            Remove
          </button>
        </div>
      </Modal>
    </div>
  </template>
  
  <script>
  import Modal from '@/components/Modal.vue'
  import { mapActions } from 'vuex'
  
  export default {
    name: 'RemoveDeveloper',
    components: {
      Modal
    },
    data() {
      return {
        showModal: false
      }
    },
    methods: {
      ...mapActions(['removeDeveloper']),
      removeDeveloper() {
        this.removeDeveloper(this.$route.params.id)
          .then(() => {
            this.showModal = false
            this.$emit('removed')
          })
          .catch(() => {
            this.showModal = false
            this.$emit('error')
          })
      }
    }
  }
  </script>
  