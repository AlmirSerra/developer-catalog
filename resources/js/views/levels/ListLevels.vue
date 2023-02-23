<template>
    <div class="container">
      <h1>Levels</h1>
      <div class="row">
        <div class="col-md-6">
          <level-search v-model="search" />
        </div>
        <div class="col-md-6">
          <level-sort v-model="sort" />
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="level in levels" :key="level.id">
                  <td>{{ level.name }}</td>
                  <td>
                    <router-link :to="{ name: 'edit-level', params: { id: level.id } }" class="btn btn-primary mr-2">Edit</router-link>
                    <remove-level :id="level.id" />
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-between mt-3">
            <level-pagination :current-page.sync="currentPage" :total-pages="totalPages" />
            <router-link to="/create-level" class="btn btn-success">Create Level</router-link>
          </div>
        </div>
      </div>
      <level-success-error :success="success" :error="error" />
    </div>
  </template>
  
  <script>
  import LevelSearch from '@/components/levels/LevelSearch'
  import LevelSort from '@/components/levels/LevelSort'
  import LevelPagination from '@/components/levels/LevelPagination'
  import RemoveLevel from '@/components/levels/RemoveLevel'
  import LevelSuccessError from '@/components/levels/LevelSuccessError'
  import { mapActions, mapGetters } from 'vuex'
  
  export default {
    name: 'ListLevels',
    components: {
      LevelSearch,
      LevelSort,
      LevelPagination,
      RemoveLevel,
      LevelSuccessError
    },
    data() {
      return {
        search: '',
        sort: { column: 'name', order: 'asc' },
        currentPage: 1,
        success: '',
        error: '',
        totalPages: 0
      }
    },
    computed: {
      ...mapGetters(['levelsList']),
      levels() {
        return this.levelsList.sort((a, b) => {
          let modifier = 1
          if (this.sort.order === 'desc') modifier = -1
          if (a[this.sort.column] < b[this.sort.column]) return -1 * modifier
          if (a[this.sort.column] > b[this.sort.column]) return modifier
          return 0
        }).filter((level) => {
          return level.name.toLowerCase().includes(this.search.toLowerCase())
        })
      }
    },
    watch: {
      async levels() {
        await this.setTotalPages()
      }
    },
    methods: {
      ...mapActions(['fetchLevels']),
      async setTotalPages() {
        this.totalPages = Math.ceil(this.levels.length / 10)
      }
    },
    async mounted() {
      try {
        await this.fetchLevels()
      } catch (error) {
        console.error(error)
      }
    }
  }
  </script>
  