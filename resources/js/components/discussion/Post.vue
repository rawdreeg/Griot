<template>
    <v-card class="mt-2"> 
    <v-card-title primary-title>
        <h3 class="headline mb-0">
            <router-link :to="data.path">
                {{data.title}}
            </router-link>
        </h3>
        <span class="grey--text">{{data.created_at}} by {{data.user}}</span>
    </v-card-title>
    <v-card-text>
        {{data.body}}
    </v-card-text>
    </v-card>
</template>

<script>
export default {
    props:['data']

}
</script>

<style>

</style>
