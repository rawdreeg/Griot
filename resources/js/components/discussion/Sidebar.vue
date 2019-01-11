<template>
    <div>
        <v-card>
            <v-toolbar dense class="mt-2">
            <v-toolbar-title>Communities</v-toolbar-title>
            <v-spacer></v-spacer>
            </v-toolbar>

            <v-list>
                <v-list-tile 
                v-for="hut in huts"
                :key="hut.hut_id">
                    <v-list-tile-content>
                        <v-list-tile-title>{{ hut.name }}</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>

            </v-list>
        </v-card>
    </div>
</template>

<script>
export default {
    data(){
        return{
            huts : {}
        }
    },
    created(){
        const endpoint = 'http://127.0.0.1:8000/api/hut'
        axios.get(endpoint)
        .then(res => this.huts = res.data.data)
        .catch(error => this.errors = error.response.data.errors)
    },


}
</script>

<style>

</style>
