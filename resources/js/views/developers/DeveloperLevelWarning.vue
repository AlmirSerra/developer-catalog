<template>
    <div class="alert alert-warning" role="alert" v-if="associatedLevels.length > 0">
      Este desenvolvedor está associado aos seguintes níveis:
      <ul>
        <li v-for="level in associatedLevels" :key="level.id">
          {{ level.title }}
        </li>
      </ul>
      Por favor, desassocie-o dos níveis antes de removê-lo.
    </div>
  </template>
  
  <script>
  export default {
    props: {
      associatedLevels: {
        type: Array,
        default: () => []
      }
    }
  }
  </script>
  