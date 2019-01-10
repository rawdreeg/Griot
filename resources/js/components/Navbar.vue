<template>
  <v-toolbar>
    <!-- <v-toolbar-side-icon></v-toolbar-side-icon> -->
    <v-toolbar-title>Griot</v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">
      <router-link v-for="item in items"
      v-if="item.show"
      :key="item.title"
      :to="item.to">
         <v-btn flat>{{item.title}}</v-btn>
      </router-link>
    </div>  
  </v-toolbar>
</template>

<script>
export default {
  data(){
    return{
      items:[
        {
          'title': 'Discussion',
          to: '/discussion',
          show: true
        },
        {
          'title': 'Write a post',
          to: '/submit',
          show: User.isLoggedIn()
        },
        {
          'title': 'Huts',
          to: '/huts',
          show: User.isLoggedIn()
        },
        {
          'title': 'Login',
          to: '/login',
          show: !User.isLoggedIn()
        },
        {
          'title': 'Logout',
          to: '/logout',
          show: User.isLoggedIn()
        }
      ]
    }
  },
  created(){
    EventBus.$on('logout',() => {
      User.logout()
    })
  }
}
</script>

<style>

</style>
