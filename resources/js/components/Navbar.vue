<template>
  <v-toolbar>
    <!-- <v-toolbar-side-icon></v-toolbar-side-icon> -->
    <v-toolbar-title>Griot</v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">
      <v-btn flat>Discussions</v-btn>
      <v-btn flat>Huts</v-btn>
      <router-link to="/login">
        <v-btn flat>Login</v-btn>
      </router-link>
      <v-btn flat>Write a post</v-btn>
    </div>
  </v-toolbar>
</template>