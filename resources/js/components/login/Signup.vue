<template>
    <v-container>
        <v-form @submit.prevent="signup">
                        <v-text-field
            v-model="form.name"
            label="Username"
            type="text"
            required
            ></v-text-field>
            <span class="red--text" v-if="errors.name">{{errors.name[0]}}</span>
            
            <v-text-field
            v-model="form.email"
            label="E-mail"
            type="email"
            required
            ></v-text-field>
            <span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>


            <v-text-field
            v-model="form.password"
            label="Password"
            type="password"
            required
            ></v-text-field>
            <span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>

            <v-btn type="submit"> Signup </v-btn>

            <router-link to="/login">
                <v-btn flat>Already have an account?</v-btn>
            </router-link>


            
        </v-form>
    </v-container>
</template>

<script>
export default {
    data(){
        return{
            form:{
                name:null,
                email:null,
                password: null
            },
            errors: {
                 
            }   
        }
    },
    created(){
        if(User.isLoggedIn()){
            this.$router.push({name:'discussion'})
        }
    },
    methods: {
        signup(){
            const endpoint = 'http://127.0.0.1:8000/api/auth/signup'
            axios.post(endpoint, this.form)
            .then(res => {
                User.processResponse(res)
                this.$router.push({name:'discussion'})
                })
            .catch(error => this.errors = error.response.data.errors)
        }
    },
}
</script>

<style>

</style>
