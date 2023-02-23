<template>
    <nav class="level-pagination" v-if="totalPages > 1">
      <ul class="pagination justify-content-center">
        <li class="page-item" :class="{ disabled: currentPage === 1 }">
          <a class="page-link" href="#" aria-label="Previous" @click.prevent="changePage(currentPage - 1)">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li v-for="page in pages" :key="page" class="page-item" :class="{ active: page === currentPage }">
          <a class="page-link" href="#" @click.prevent="changePage(page)">{{ page }}</a>
        </li>
        <li class="page-item" :class="{ disabled: currentPage === totalPages }">
          <a class="page-link" href="#" aria-label="Next" @click.prevent="changePage(currentPage + 1)">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </template>
  
  <script>
  export default {
    name: 'LevelPagination',
    props: {
      currentPage: {
        type: Number,
        required: true
      },
      totalPages: {
        type: Number,
        required: true
      }
    },
    computed: {
      pages() {
        const pagesArray = []
        for (let i = 1; i <= this.totalPages; i++) {
          pagesArray.push(i)
        }
        return pagesArray
      }
    },
    methods: {
      changePage(pageNumber) {
        this.$emit('page-changed', pageNumber)
      }
    }
  }
  </script>
  
  <style scoped>
  .level-pagination {
    margin-top: 20px;
    margin-bottom: 20px;
  }
  </style>
  