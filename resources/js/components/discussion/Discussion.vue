<template>
    <v-layout row wrap>
        <v-flex fluid grid-list-md>
            <post 
            v-for="p in posts"
            :key="p.id"
            :data=p></post>
        </v-flex>
        <!-- <v-flex xs4 fluid grid-list-md>
            side bar
        </v-flex> -->
        </v-layout>
</template>

<script>
import post from './Post'
export default {
    data(){
        return {
            posts: {}
        }
    }, 
    components:{post},
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
