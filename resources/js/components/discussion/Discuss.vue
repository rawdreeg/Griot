<!-- READ -->
<template>
    <div v-if="post">
        <edit-post v-if="editing"
        :data = post></edit-post>
        <show-post
        v-else
        :data = post
        ></show-post>
    </div>
</template>

<script>
import ShowPost from './ShowPost'
import EditPost from './EditPost'
export default {
    components:{ShowPost, EditPost},
    data(){
        return {
            post: null,
            editing: false
        }
    },
    created(){
        this.listener()
        this.getPost()

    },
    methods:{
        listener(){
            EventBus.$on('startEditing',()=>{
                this.editing = true
            })
            EventBus.$on('stopEditing',()=>{
                this.editing = false
            })
        },

        getPost(){
            axios.get(`/api/discussion/${this.$route.params.slug}`)
            .then(res=>this.post = res.data.data)
        }
    }
}
</script>

<style>

</style>
