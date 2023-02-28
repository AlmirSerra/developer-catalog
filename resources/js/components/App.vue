<template>
  <main>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <!-- <router-link class="navbar-brand" to="/">Developer Catalog</router-link>
<router-link class="nav-link" to="/developers">Developers</router-link>
<router-link class="nav-link" to="/levels">Levels</router-link> -->
          <img src="https://www.gazintech.com.br/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Flogo.0c79ce07.svg&w=750&q=75" alt="Logo" width="90" height="45">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link class="nav-link" to="/">Inicio</router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/developers">Developers</router-link>
            </li>
            <li class="nav-item dropdown">
              <router-link class="nav-link" to="/levels">Levels</router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <router-view></router-view>
  </main>
</template>
  
  <script>
  export default {
    name: 'App'
  }
  </script>
  