<template>
    <v-layout row wrap>
        <v-flex md7 fluid grid-list-md class="mr-3">
            <post 
            v-for="p in posts"
            :key="p.id"
            :data=p></post>
        </v-flex>
        <v-flex md4 fluid grid-list-md>
            <sidebar></sidebar>
        </v-flex> 
        </v-layout>
</template>

<script>
import post from './Post'
import sidebar from './Sidebar'
export default {
    data(){
        return {
            posts: {}
        }
    }, 
    components:{post, sidebar},
    created(){
        const endpoint = 'http://127.0.0.1:8000/api/discussion'
        axios.get(endpoint)
        .then(res => this.posts = res.data.data)
        .catch(error => this.errors = error.response.data.errors)
    }

}
</script>

<style>

</style>
