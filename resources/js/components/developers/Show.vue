<template>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <router-link :to="{ name: 'createDevelopers' }" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i></router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="bg-primary text-white">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Data de Nascimento</th>
                            <th>Nível</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="developer in developers" :key="developer.id">
                        <td>{{ developer.id }}</td>
                        <td>{{ developer.name }}</td>

                        <td>
                            <router-link :to='{name:"editDevelopers", params:{id:developer.id}}' class="btn btn-info"><i class="fa-light fa-pen-to-square"></i></router-link>
                            <a type="button" @click="deleteDeveloper(developer.id)" class="btn btn-danger"><i class="fa-light fa-trash"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name:"developer",
    data(){
        return {
            developer: []
        }
    },
    mounted(){
        this.showDevelopers()
    },
    methods: {
        async showDevelopers(){
            await this.axios.get('/api/developer')
                .then(response=>{
                    this.developer = response.data
                })
                .catch(error=>{
                    this.developer = []
                })
        },
        deleteDeveloper(id){
            if(confirm("Deseja remover o Desenvolvedor?")){
                this.axios.delete(`api/developer/${id}`)
                .then(response=>{
                    this.showDevelopers()
                })
                .catch(error=>{
                    console
                })
            }
        }
    }
}
</script>