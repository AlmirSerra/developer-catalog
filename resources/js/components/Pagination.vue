<template>
    <nav v-if="pagination.last_page > 1">
      <ul class="pagination justify-content-center">
        <li class="page-item" :class="{ disabled: pagination.current_page <= 1 }">
          <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page - 1)">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li v-for="page in pages" :key="page" class="page-item" :class="{ active: pagination.current_page === page }">
          <a class="page-link" href="#" @click.prevent="changePage(page)">{{ page }}</a>
        </li>
        <li class="page-item" :class="{ disabled: pagination.current_page >= pagination.last_page }">
          <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page + 1)">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </template>
  
  <script>
  export default {
    props: {
      pagination: Object,
    },
    computed: {
      pages() {
        if (!this.pagination.to) {
          return [];
        }
  
        let from = this.pagination.current_page - 2;
        if (from < 1) {
          from = 1;
        }
  
        let to = from + 4;
        if (to >= this.pagination.last_page) {
          to = this.pagination.last_page;
          from = to - 4;
          if (from < 1) {
            from = 1;
          }
        }
  
        let pagesArray = [];
        while (from <= to) {
          pagesArray.push(from);
          from++;
        }
  
        return pagesArray;
      },
    },
    methods: {
      changePage(page) {
        if (page < 1 || page > this.pagination.last_page) {
          return;
        }
  
        this.$emit("page-changed", page);
      },
    },
  };
  </script>
  