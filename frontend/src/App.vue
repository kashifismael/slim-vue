<template>
    <div>
        <navbar></navbar>
        <div id="content">
          <router-view></router-view>
        </div>
    </div>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Home from './components/Home.vue'

export default {

  components: {
    'navbar' : Navbar
  },

  data () {
    return {

    }
  }
}
</script>

<style>
body {
  margin-left: 0px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  font-family: sans-serif;
  /*color: #444;*/
}

#content {
  margin: 40px auto;
  max-width: 850px;
}

.text-center {
  text-align: center;
}
</style>