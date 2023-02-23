<template>
    <div>
      <b-modal
        ref="modal"
        title="Remover Desenvolvedor"
        hide-footer
        @ok="removeDeveloper"
      >
        <p class="my-4">
          Tem certeza que deseja remover o desenvolvedor {{ developer.name }}?
        </p>
        <div class="d-flex justify-content-end">
          <b-button class="mr-2" variant="outline-secondary" @click="$refs.modal.hide()">Cancelar</b-button>
          <b-button variant="danger" @click="$refs.modal.ok()">Remover</b-button>
        </div>
      </b-modal>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      developer: {
        type: Object,
        required: true
      },
      removeCallback: {
        type: Function,
        required: true
      }
    },
    methods: {
      removeDeveloper() {
        this.removeCallback(this.developer);
      }
    }
  }
  </script>
  