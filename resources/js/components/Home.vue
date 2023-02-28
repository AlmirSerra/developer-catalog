<template>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
          <h1 class="main-title">Bem-vindo ao Developer Catalog!</h1>
          <p>Um sistema para gerenciar informações de desenvolvedores.</p>
          <router-link to="/developers/create" class="btn btn-lg btn-primary">
            Criar novo registro
          </router-link>
          <router-link to="/developers" class="btn btn-lg btn-secondary">
            Ver todos os registros
          </router-link>
        </div>
      </div>
    </div>
  </template>
  
  <style scoped>

    .main-title {
    font-size: 3rem; /* tamanho da fonte */
    font-weight: bold; /* peso da fonte */
    text-align: center; /* alinhamento do texto */
    color: #333; /* cor da fonte */
    text-transform: uppercase; /* transformação do texto para maiúsculas */
    letter-spacing: 2px; /* espaçamento entre letras */
    margin-bottom: 1rem; /* margem inferior */
    }

  h1 {
    font-size: 4rem;
    margin-bottom: 1.5rem;
  }
  
  p {
    font-size: 1.5rem;
    margin-bottom: 2rem;
  }
  
  .btn {
    margin-top: 2rem;
    margin-right: 1rem;
    font-size: 1.25rem;
    padding: 0.75rem 1.5rem;
  }
  </style>
  