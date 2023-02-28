<template>
    <div>
      <h1>Levels</h1>
      <div class="row mb-2">
        <div class="col-md-6">
          <router-link to="/levels/create" class="btn btn-primary">Criar NIvel</router-link>
        </div>
        <div class="col-md-6">
          <div class="input-group">
            <input v-model="search" type="text" class="form-control" placeholder="Search...">
            <div class="input-group-append">
              <button @click="searchLevels" class="btn btn-outline-secondary" type="button">Procurar</button>
            </div>
          </div>
        </div>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">
              <a href="#" @click="sortBy('id')">ID</a>
              <span :class="sortIcon('id')"></span>
            </th>
            <th scope="col">
              <a href="#" @click="sortBy('name')">Nome</a>
              <span :class="sortIcon('name')"></span>
            </th>
            <th scope="col">Ação</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="level in levels" :key="level.id">
            <td>{{ level.id }}</td>
            <td>{{ level.name }}</td>
            <td>
              <router-link :to="{ name: 'editLevels', params: { id: level.id } }" class="btn btn-primary btn-sm">Editar</router-link>
              <button @click="deleteLevel(level.id)" class="btn btn-danger btn-sm">Apagar</button>
            </td>
          </tr>
        </tbody>
      </table>
      <pagination :data="levels" :limit="perPage" @pagination-change-page="getLevels"></pagination>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import Pagination from '../Pagination.vue';
  
  export default {
    components: { Pagination },
    data() {
      return {
        levels: [],
        search: '',
        sortByField: 'id',
        sortDesc: false,
        perPage: 10
      }
    },
    methods: {
      getLevels(page = 1) {
        axios.get(`/api/level?page=${page}&search=${this.search}&sort_by=${this.sortByField}&sort_desc=${this.sortDesc}`)
          .then(response => {
            this.levels = response.data.data;
          });
      },
      deleteLevel(id) {
        if(confirm('Tem certeza que deseja apagar este nivel?')) {
          axios.delete(`/api/level/${id}`)
            .then(() => {
              this.levels = this.levels.filter(level => level.id !== id);
              alert('Nivel apagado com sucesso!');
            });
        }
      },
      searchLevels() {
        this.getLevels();
      },
      sortBy(field) {
        if(this.sortByField === field) {
          this.sortDesc = !this.sortDesc;
        } else {
          this.sortByField = field;
          this.sortDesc = false;
        }
  
        this.getLevels();
      },
      sortIcon(field) {
        if(this.sortByField !== field) {
          return '';
        }
  
        return this.sortDesc ? 'fa fa-arrow-down' : 'fa fa-arrow-up';
      }
    },
    created() {
      this.getLevels();
    }
  }
  </script>
  