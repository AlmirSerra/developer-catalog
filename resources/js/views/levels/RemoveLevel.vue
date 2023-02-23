<template>
    <div>
      <button @click="show = true" class="text-red-500">Remove</button>
      <Modal :show="show" @close="show = false">
        <h3 slot="header" class="text-lg leading-6 font-medium text-gray-900">Remove level</h3>
        <div slot="body" class="mt-2">
          <p class="text-sm leading-5 text-gray-500">
            Are you sure you want to remove the level "<strong>{{ name }}</strong>"?
          </p>
        </div>
        <div slot="footer" class="mt-4 flex justify-end">
          <button @click="show = false" class="text-gray-500">Cancel</button>
          <button @click="remove" class="ml-4 bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded">
            Remove
          </button>
        </div>
      </Modal>
    </div>
  </template>
  
  <script>
  import Modal from '@/components/Modal'
  import { mapActions } from 'vuex'
  
  export default {
    components: {
      Modal
    },
    props: {
      level: {
        type: Object,
        required: true
      }
    },
    data() {
      return {
        show: false
      }
    },
    computed: {
      name() {
        return this.level ? this.level.name : ''
      }
    },
    methods: {
      ...mapActions(['removeLevel']),
      async remove() {
        try {
          await this.removeLevel(this.level.id)
          this.show = false
        } catch (error) {
          console.error(error)
        }
      }
    }
  }
  </script>
  
  <style>
  /* ... */
  </style>
  