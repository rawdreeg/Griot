<template>
    <v-container fluid>
        <v-flex md6>
            <v-form @submit.prevent="create" >
                            <v-text-field
                v-model="form.name"
                label="Name"
                type="text"
                required
                ></v-text-field>                
                <v-btn type="submit"> submit </v-btn>
                
            </v-form>
            <v-card class="mt-4">
                <v-toolbar dense >
                <v-toolbar-title>Communities</v-toolbar-title>
                <v-spacer></v-spacer>
                </v-toolbar>

                <v-list>
                    <div 
                    v-for="hut in huts"
                    :key="hut.hut_id">
                        <v-list-tile >
                            <v-list-tile-content>
                                <v-list-tile-title>{{ hut.name }}</v-list-tile-title>
                            </v-list-tile-content>
                            <v-tile-actions>
                                <v-btn flat value="edit" @click="edit">
                                    <v-icon>edit</v-icon>
                                    <span>Edit</span>
                                </v-btn>
                                <v-btn flat value="delete" @click="destroy">
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
            huts:{}

        }
    },
    created(){
        const endpoint = 'http://127.0.0.1:8000/api/hut'
        axios.get(endpoint)
        .then(res => this.huts = res.data.data)
        .catch(error => this.errors = error.response.data.errors)
    },
    methods:{
        create() {
            axios.post('http://127.0.0.1:8000/api/hut', this.form)
            .then(res => console.log(res.data))
            .catch(error => this.errors = error.response.data.error)
        },
        edit(){

        },
        destroy(){

        },
    }

}
</script>

<style>

</style>
