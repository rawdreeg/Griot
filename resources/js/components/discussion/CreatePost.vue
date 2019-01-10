<template>
    <v-container fluid>
        <v-flex md6>
            <v-form @submit.prevent="create" >
                            <v-text-field
                v-model="form.title"
                label="Title"
                type="text"
                required
                ></v-text-field>

                <v-autocomplete
                :items="huts"
                v-model="form.hut_id"
                label="Hut"
                item-text="name"
                item-value="id"
                ></v-autocomplete>

                <markdown-editor preview-class="markdown-body"
                label="Body"
                v-model="form.body"
                name="body"
                ></markdown-editor>
                
                <v-btn type="submit"> submit </v-btn>
                
            </v-form>
        </v-flex>
    </v-container>
</template>

<script>
import markdownEditor from 'vue-simplemde/src/markdown-editor'
export default {
    components: {
      markdownEditor
    },
    data(){
        return{
            form:{
                title: null,
                body: null,
                hut_id: null
            },
            huts: {},
            errors:{}
        }
    },
    created(){
        axios.get('http://127.0.0.1:8000/api/hut')
        .then(res => this.huts = res.data.data)
    },
    methods:{
        create(){
        axios.post('http://127.0.0.1:8000/api/discussion', this.form)
        .then(res => this.$router.push(res.data.path))
        .catch(error => this.errors = error.response.data.error)
        }
    }
}
</script>

<style>
</style>
