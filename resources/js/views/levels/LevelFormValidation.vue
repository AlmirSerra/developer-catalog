<template>
    <div>
      <ValidationObserver ref="observer" v-slot="{ invalid }">
        <form @submit.prevent="handleSubmit">
          <div class="form-group">
            <label for="name">Name</label>
            <ValidationProvider rules="required" v-slot="{ errors }">
              <input type="text" class="form-control" id="name" v-model="form.name">
              <div v-if="errors.length" class="invalid-feedback">{{ errors[0] }}</div>
            </ValidationProvider>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <ValidationProvider rules="required" v-slot="{ errors }">
              <textarea class="form-control" id="description" rows="5" v-model="form.description"></textarea>
              <div v-if="errors.length" class="invalid-feedback">{{ errors[0] }}</div>
            </ValidationProvider>
          </div>
          <button type="submit" class="btn btn-primary" :disabled="invalid">{{ buttonText }}</button>
        </form>
      </ValidationObserver>
    </div>
  </template>
  
  <script>
  import { ValidationObserver, ValidationProvider } from 'vee-validate'
  import { mapActions } from 'vuex'
  
  export default {
    name: 'LevelFormValidation',
    components: {
      ValidationObserver,
      ValidationProvider
    },
    props: {
      level: {
        type: Object,
        default: null
      }
    },
    data() {
      return {
        form: {
          name: '',
          description: ''
        },
        buttonText: 'Save'
      }
    },
    mounted() {
      if (this.level) {
        this.form = { ...this.level }
        this.buttonText = 'Update'
      }
    },
    methods: {
      ...mapActions(['createLevel', 'updateLevel']),
      handleSubmit() {
        this.$refs.observer.validate().then(success => {
          if (success) {
            if (this.level) {
              this.updateLevel({ ...this.form, id: this.level.id })
            } else {
              this.createLevel(this.form)
            }
            this.$emit('close')
          }
        })
      }
    }
  }
  </script>
  