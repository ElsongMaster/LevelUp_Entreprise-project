<template>
  <div class="h-screen bg-gray-100 flex justify-center">
    <div class="py-6 px-8 h-3/4 w-1/2 mt-20 bg-white rounded shadow-xl">
      <form action="">
        <div class="mb-6">
          <label for="name" class="block text-gray-800 font-bold">Name:</label>
          <input
            type="text"
            name="name"
            id="name"
            v-model="bodyDataForm.name"
            placeholder="username"
            class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"
          />
        </div>

        <div>
          <label for="email" class="block text-gray-800 font-bold"
            >Email:</label
          >
          <input
            type="text"
            name="email"
            id="email"
            placeholder="@email"
            v-model="bodyDataForm.email"
            class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"
          />
        </div>

        <div>
          <label for="email" class="block text-gray-800 font-bold"
            >Password:</label
          >
          <input
            type="password"
            name="password"
            id="password"
            placeholder="password"
            v-model="bodyDataForm.password"
            class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"
          />
        </div>
        <button
          class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded"
          @click="sendDataForm($event)"
        >
          Register
        </button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      isOkToSubmit: true,
      bodyDataForm: {
        nom: null,
        email: null,
        password: null,
      },
    };
  },
  methods: {
    sendDataForm(e) {
      e.preventDefault();
      var formRequest = new FormData();
      var tokenReq = null;
      formRequest.append("name", this.bodyDataForm.email);
      formRequest.append("email", this.bodyDataForm.email);
      formRequest.append("password", this.bodyDataForm.password);

      if (this.isOkToSubmit) {
        console.log(formRequest.values());
        axios
          .post("http://127.0.0.1:8001/api/v1/register/user", formRequest
          )
          .then((response) => {
            console.log("register", response);
            tokenReq = response.data.data.token;

            this.$store.dispatch("updateTokenConnexion", tokenReq);
            localStorage.setItem("tokenConnexion", tokenReq);
            this.$router.push({ path: "/" });
          });
      }
    },
  },
};
</script>

<style></style>
