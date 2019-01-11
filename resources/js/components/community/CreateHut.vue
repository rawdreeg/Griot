<template>
    <v-container fluid>
        <v-flex md6>
            <v-form @submit.prevent="create" >
                            <v-text-field
                v-model="form.title"
                label="Name"
                type="text"
                required
                ></v-text-field>                
                <v-btn type="submit"> submit </v-btn>
                
            </v-form>
        </v-flex>
    </v-container>
</template>

<script>
export default {
    methods:{
        create() {
            
        },
    }

}
</script>

<style>

</style>
