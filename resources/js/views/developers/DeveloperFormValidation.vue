<template>
    <div>
      <b-form-group
        v-bind="$attrs"
        v-bind:label="label"
        v-bind:label-for="inputId"
        :state="feedbackState"
        :invalid-feedback="invalidFeedback"
      >
        <b-form-input
          v-bind="$props"
          :id="inputId"
          @input="onInput"
        ></b-form-input>
      </b-form-group>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      value: {
        type: String,
        required: true
      },
      label: {
        type: String,
        required: true
      },
      inputId: {
        type: String,
        required: true
      },
      validationFunction: {
        type: Function,
        required: true
      }
    },
    data() {
      return {
        feedbackState: null,
        invalidFeedback: ""
      }
    },
    methods: {
      onInput(e) {
        const inputIsValid = this.validationFunction(e.target.value);
        this.feedbackState = inputIsValid ? true : false;
        this.invalidFeedback = inputIsValid ? "" : "Este campo é obrigatório";
        this.$emit("input", e.target.value);
      }
    }
  }
  </script>
  