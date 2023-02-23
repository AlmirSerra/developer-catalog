<template>
    <nav aria-label="Pagination">
      <ul class="pagination">
        <li class="page-item" :class="{ disabled: currentPage === 1 }">
          <a class="page-link" href="#" @click.prevent="changePage(currentPage - 1)">
            Anterior
          </a>
        </li>
        <li v-for="page in pages" :key="page" class="page-item" :class="{ active: page === currentPage }">
          <a class="page-link" href="#" @click.prevent="changePage(page)">{{ page }}</a>
        </li>
        <li class="page-item" :class="{ disabled: currentPage === totalPages }">
          <a class="page-link" href="#" @click.prevent="changePage(currentPage + 1)">
            Próxima
          </a>
        </li>
      </ul>
    </nav>
  </template>
  
  <script>
  export default {
    props: {
      currentPage: {
        type: Number,
        default: 1
      },
      totalPages: {
        type: Number,
        default: 1
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
      changePage(page) {
        if (page >= 1 && page <= this.totalPages) {
          this.$emit('page-change', page)
        }
      }
    }
  }
  </script>
  