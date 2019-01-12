<template>
    <v-container fluid>
        <v-flex md6>
            <v-form @submit.prevent="submit" >
                            <v-text-field
                v-model="form.name"
                label="Name"
                type="text"
                required
                ></v-text-field>                
                <v-btn type="submit" v-show="!editSlug"> submit </v-btn>
                <v-btn type="submit"  v-show="editSlug"> Update </v-btn>

                
            </v-form>
            <v-card class="mt-4">
                <v-toolbar dense >
                <v-toolbar-title>Communities</v-toolbar-title>
                <v-spacer></v-spacer>
                </v-toolbar>

                <v-list>
                    <div 
                    v-for="(hut, index) in huts"
                    :key="hut.hut_id">
                        <v-list-tile >
                            <v-list-tile-content>
                                <v-list-tile-title>{{ hut.name }}</v-list-tile-title>
                            </v-list-tile-content>
                            <v-tile-actions>
                                <v-btn flat value="edit" @click="edit(index)">
                                    <v-icon>edit</v-icon>
                                    <span>Edit</span>
                                </v-btn>
                                <v-btn flat value="delete" @click="destroy(hut.slug)">
                                    <v-icon>delete</v-icon>
                                    <span>Delete</span>
                                </v-btn>
                            </v-tile-actions>
                        </v-list-tile>
                        <v-divider></v-divider>

                    </div>
                </v-list>
            </v-card>
        </v-flex>
    </v-container>
</template>

<script>
export default {

    data(){
        return{
            form:{
                name: null
            },
            huts:{},
            errors:{},
            editSlug: null

        }
    },
    created(){
        this.getHuts()
    },
    methods:{
        submit() {
            if(this.editSlug){
                this.update();
            }else{
                this.create();
            }
        },
        edit(index){
            this.form.name = this.huts[index].name
            this.editSlug = this.huts[index].slug
            this.huts.splice(index, 1)
        },
        destroy(slug){
            axios.delete(`http://127.0.0.1:8000/api/hut/${slug}`)
            .then( res => {
                this.getHuts()
            }).catch(error => this.errors = error.response.data.error)
        },

        getHuts(){
            const endpoint = 'http://127.0.0.1:8000/api/hut'
            axios.get(endpoint)
            .then(res => this.huts = res.data.data)
            .catch(error => this.errors = error.response.data.errors)
        },

        update(){
            axios.patch('http://127.0.0.1:8000/api/hut/' + this.editSlug, this.form)
            .then(res => {
                this.getHuts()
                this.form.name = null
                this.editSlug = null
                })
            .catch(error => this.errors = error.response.data.error)
        },

        create(){
            axios.post('http://127.0.0.1:8000/api/hut', this.form)
            .then(res => {
                this.getHuts()
                this.form.name = null
                })
            .catch(error => this.errors = error.response.data.error)
        }
    }

}
</script>

<style>

</style>
