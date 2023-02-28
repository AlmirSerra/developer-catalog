<template>
    <div class="row">
        <div class="col-12">
            <div class="card-header">
                <h4>Editar Developer</h4>
            </div>
            <div class="card-body">
                <form @submit.prevent="atualizar">
                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" v-model="developer.name">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"edit-developer",
    data(){
        return {
            developer:{
                name:"",
                email:"",
                level_id:""
            }
        }
    },
    mounted(){
        this.showDeveloper()
    },
    methods:{
        async showDeveloper(){
            await this.axios.get(`/api/developer/${this.$route.params.id}`)
            .then(response=>{
                const { name, email, level_id } = response.data
                this.developer.name = name,
                this.developer.email = email,
                this.developer.level_id = level_id
            })
            .catch(error=>{
                console.log(error)
            })
        },
        async atualizar(){
            await this.axios.put(`/api/developer/${this.$route.params.id}`, this.developer)
                .then(response=>{
                    this.$router.push({
                        name:"showDeveloper"
                    })
                })
                .catch(error=>{
                console.log(error)
            })
        }
    }
    

}
</script>