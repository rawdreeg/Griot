<template>
    <v-container fluid>
        <v-flex md6>
            <v-form @submit.prevent="edit" >
                            <v-text-field
                v-model="form.title"
                label="Title"
                type="text"
                required
                ></v-text-field>
                
                <markdown-editor preview-class="markdown-body"
                label="Body"
                v-model="form.body"
                name="body"
                ></markdown-editor>

                <v-card-actions>
                    <v-btn flat value="Save" @click="edit">
                        <v-icon>save</v-icon>
                        <span>save</span>
                    </v-btn>
                    <v-btn flat value="Cancel" @click="done">
                        <v-icon>cancel</v-icon>
                        <span>cancel</span>
                    </v-btn>
                </v-card-actions>
                                
            </v-form>
        </v-flex>
    </v-container>
</template>

<script>
export default {
    props:['data'],
    data(){
        return {
            form:{
                title: null,
                body: null
            }
        }
    },
    mounted(){
        this.form = this.data
    },
    methods:{
        edit(){
            axios.patch(`/api/discussion/${this.data.slug}`, this.form)
            .then(res => this.done())
            .catch(error=> console.log(error.response.data))
        },

        done(){
            EventBus.$emit('stopEditing')
        }
    }

}
</script>

<style>

</style>
