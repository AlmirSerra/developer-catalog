<template>
    <div>
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Listagem de Desenvolvedores</h1>
        <router-link to="/developers/new" class="btn btn-primary">Novo Desenvolvedor</router-link>
      </div>
      <div class="row mb-3">
        <div class="col-sm-6">
          <developer-search :search="search" @search-changed="search = $event"></developer-search>
        </div>
        <div class="col-sm-6">
          <developer-pagination :current-page="currentPage" :total-pages="totalPages" @page-changed="currentPage = $event"></developer-pagination>
        </div>
      </div>
      <div v-if="loading" class="text-center">
        <div class="spinner-border" role="status">
          <span class="sr-only">Carregando...</span>
        </div>
      </div>
      <div v-else>
        <div v-if="success" class="alert alert-success" role="alert">
          {{ success }}
        </div>
        <div v-if="error" class="alert alert-danger" role="alert">
          {{ error }}
        </div>
        <table class="table">
          <thead>
            <tr>
              <th>
                <developer-sort sort-by="name" :current-sort="sort" @sort-changed="sort = $event">Nome</developer-sort>
              </th>
              <th>
                <developer-sort sort-by="email" :current-sort="sort" @sort-changed="sort = $event">E-mail</developer-sort>
              </th>
              <th>
                <developer-sort sort-by="phone" :current-sort="sort" @sort-changed="sort = $event">Telefone</developer-sort>
              </th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="developer in developers" :key="developer.id">
              <td>{{ developer.name }}</td>
              <td>{{ developer.email }}</td>
              <td>{{ developer.phone }}</td>
              <td>
                <router-link :to="{ name: 'editDeveloper', params: { id: developer.id } }" class="btn btn-sm btn-outline-secondary mr-2">Editar</router-link>
                <remove-developer :developer="developer" @removed="onRemoved"></remove-developer>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </template>
  
  <script>
import DeveloperSearch from '@/components/developers/DeveloperSearch'
import DeveloperPagination from '@/components/developers/DeveloperPagination'
import DeveloperSort from '@/components/developers/DeveloperSort'
import RemoveDeveloper from '@/components/developers/RemoveDeveloper'
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'ListDevelopers',
  components: {
    DeveloperSearch,
    DeveloperPagination,
    DeveloperSort,
    RemoveDeveloper
  },
  data() {
    return {
      search: '',
      sort: { column: 'name', order: 'asc' },
      currentPage: 1,
      loading: false,
      success: '',
      error: '',
      totalPages: 0
    }
  },
  computed: {
    ...mapGetters(['developersList']),
    developers() {
      return this.developersList.sort((a, b) => {
        let modifier = 1
        if (this.sort.order === 'desc') modifier = -1
        if (a[this.sort.column] < b[this.sort.column]) return -1 * modifier
        if (a[this.sort.column] > b[this.sort.column]) return modifier
        return 0
      })
    }
  },
  methods: {
    ...mapActions(['fetchDevelopers', 'deleteDeveloper']),
    async deleteItem(id) {
      this.loading = true
      try {
        await this.deleteDeveloper(id)
        this.success = 'Developer has been removed successfully.'
      } catch (err) {
        this.error = 'There was an error while removing the developer.'
      } finally {
        this.loading = false
      }
    },
    async fetchData() {
      this.loading = true
      try {
        await this.fetchDevelopers({
          page: this.currentPage,
          search: this.search,
          sort: this.sort
        })
        this.totalPages = Math.ceil(this.developersList.length / 10)
      } catch (err) {
        this.error = 'There was an error while fetching the developers.'
      } finally {
        this.loading = false
      }
    },
    handlePageChange(page) {
      this.currentPage = page
      this.fetchData()
    },
    handleSortChange(sort) {
      this.sort = sort
      this.fetchData()
    },
    handleSearch(search) {
      this.search = search
      this.fetchData()
    },
    clearMessages() {
      this.success = ''
      this.error = ''
    }
  },
  async created() {
    await this.fetchData()
  }
}
</script>
