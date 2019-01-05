<template>
    <v-container>
        <v-form @submit.prevent="login">
            <v-text-field
            v-model="form.email"
            label="E-mail"
            type="email"
            required
            ></v-text-field>

            <v-text-field
            v-model="form.password"
            label="Password"
            type="password"
            required
            ></v-text-field>


            <v-btn type="submit">login</v-btn>
              or
            <router-link to="/signup">
                <v-btn flat>Create account</v-btn>
            </router-link>
        </v-form>
    </v-container>
</template>

<script>
export default {
    data(){
        return{
            form:{
                email:null,
                password: null
            }   
        }

    },
    created(){
        if(User.isLoggedIn()){
            this.$router.push({name:'discussion'})
        }
    },
    methods: {
        login(){
            User.login(this.form)
            this.$router.push({name:'discussion'})

        }
    },
}
</script>

<style>

</style>
