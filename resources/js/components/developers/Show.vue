<template>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <router-link :to="{ name: 'createDevelopers' }" class="btn btn-success"><i class="fa-solid fa-circle-plus"></i></router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Nível</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="developer in developers" :key="developer.id">
                        <td>{{ developer.id }}</td>
                        <td>{{ developer.name }}</td>
                        <td>{{ developer.email }}</td>
                        <td>{{ developer.level }}</td>

                        <td>
                            <router-link :to='{name:"editDevelopers", params:{id:developer.id}}' class="btn btn-info"><i class="fa fa-pen-to-square"></i></router-link>
                            <a type="button" @click="deleteDeveloper(developer.id)" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
    name:"developers",
    data(){
        return {
            developers: []
        }
    },
    mounted(){
        this.showDevelopers()
    },
    methods: {
        async showDevelopers(){
            await this.axios.get('/api/developer')
                .then(response=>{
                    this.developers = response.data
                })
                .catch(error=>{
                    this.developers = []
                })
        },
        deleteDeveloper(id){
            if(confirm("Deseja remover o Desenvolvedor?")){
                this.axios.delete(`api/developer/${id}`)
                .then(response=>{
                    this.showDevelopers()
                })
                .catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>