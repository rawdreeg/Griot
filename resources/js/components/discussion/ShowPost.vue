<template>
   <v-card>
       <v-card-title>
           <div>
               <div class="headline">
                   {{data.title}}
               </div>
                <span class="grey--color">
                    {{data.created_at}} by {{data.user}}
                </span>
           </div>
           <v-spacer></v-spacer>
           <v-btn>5 Replies</v-btn>
       </v-card-title>
       <v-card-text v-html="body">
       </v-card-text>
       <v-card-actions right v-if="own">
           <v-btn icon @click="edit">
               <v-icon>
                   edit
               </v-icon>
           </v-btn>
            <v-btn icon small>
               <v-icon @click="destroy">
                   delete
               </v-icon>
           </v-btn>
       </v-card-actions>
    </v-card> 
</template>

<script>

export default {
    props:['data'],
    data(){
        return {
            own : User.own(this.data.user_id)
        }
    },
    computed:{
        body(){
            return md.parse(this.data.body)
        }
    },
    methods:{
        destroy(){
            axios.delete(`/api/discussion/${this.data.slug}`)
            .then(res=>this.$router.push('/discussion'))
            .catch(error=> console.log(error.response.data))
        },
        edit(){
            EventBus.$emit('startEditing')
        }
    }
}
</script>

<style>

</style>
