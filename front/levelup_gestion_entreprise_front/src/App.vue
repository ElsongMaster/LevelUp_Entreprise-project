<template>
  <div id="app">
    <div class="flex justify-between h-16 px-10 shadow items-center">
      <div class="flex items-center space-x-8">
        <h1 class="text-xl lg:text-2xl font-bold cursor-pointer">Entreprise</h1>
        <div class="hidden md:flex justify-around space-x-4">
          <!-- <a href="#" class="hover:text-indigo-600 text-gray-700">Home</a>
          <a href="#" class="hover:text-indigo-600 text-gray-700">About</a>
          <a href="#" class="hover:text-indigo-600 text-gray-700">Service</a>
          <a href="#" class="hover:text-indigo-600 text-gray-700">Contact</a> -->
          <router-link v-if="this.$route.path != '/dashboard' && !this.$store.state.isConnected" class="hover:text-indigo-600 text-gray-700" to="/"
            >Home</router-link
          >
          <!-- <router-link
            v-if="this.$store.state.isConnected"
            class="hover:text-indigo-600 text-gray-700"
            to="/multisteps"
            >Formulaire Entreprise</router-link
          > -->
        </div>
      </div>
      <div class="flex space-x-4 items-center">
        <!-- <a href="#" class="text-gray-800 text-sm">LOGIN</a> -->
        <router-link
          class="text-gray-800 text-sm"
          v-if="!this.$store.state.isConnected"
          to="/"
          >LOGIN</router-link
        >

        <router-link
          class="bg-indigo-600 px-4 py-2 rounded text-white hover:bg-indigo-500 text-sm"
          to="/register"
          v-if="!this.$store.state.isConnected"
          >SIGNUP</router-link
        >

        <!-- <router-link
          class="text-gray-800 text-sm underline"
          v-if="this.$store.state.isConnected"
          to="/"
          >DASHBOARD</router-link
        > -->

        <router-link
          class="bg-green-600 px-4 py-2 rounded text-white hover:bg-green-500 text-sm"
          to=""
          @click.native="logout()"
          v-if="this.$store.state.isConnected"
          >LOG OUT</router-link
        >
        <!-- <a
          href="#"
          class="bg-indigo-600 px-4 py-2 rounded text-white hover:bg-indigo-500 text-sm"
          >SIGNUP</a
        > -->
      </div>
    </div>
    <div id="nav"></div>
    <!-- <multi-steps></multi-steps> -->
    <router-view :key="$route.path" />
  </div>
</template>

<script>
// import MultiSteps from "./components/MultiSteps.vue";
export default {
  name: "App",

  mounted(){
    console.log(this.$route.path)
  },
  data() {
    return {
      isConnected: false,
    };
  },

  components: {
    // MultiSteps
  },

  methods: {
    setValConnected() {
      this.isConnected = true;
    },
    logout() {
      this.$store.dispatch("updateIsconnected", false);
      localStorage.removeItem("tokenConnexion");
      localStorage.removeItem("isConnected");

      this.$router.push({ path: "/" });
    },
  },
};
</script>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
input{
  border-style: solid !important;
}
</style>
