<template>
  <div class="home">
    <!-- component -->

    <div class="h-screen bg-gray-100 flex justify-center">
      <div class="py-6 px-8 h-2/4 w-2/4 mt-20 bg-white rounded-md shadow-xl">
        <form action="">
          <div class="mb-6">
            <label for="name" class="block text-gray-800 font-bold"
              >Email:</label
            >
            <input
              type="email"
              name="email"
              id="email"
              placeholder="Email"
              class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"
              v-model="bodyDataForm.email"

            />
            <div v-if="$v.bodyDataForm.email.$error">
              <p class="text-red-500" v-if="!$v.bodyDataForm.email.email">
                Veuillez entrer un email valid
              </p>
              <p class="text-red-500" v-if="!$v.bodyDataForm.email.required">
                Ce champ doit être rempli
              </p>
            </div>
          </div>

          <div>
            <label for="password" class="block text-gray-800 font-bold"
              >Password:</label
            >
            <input
              type="password"
              name="password"
              id="password"
              placeholder="password"
              class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"
              v-model="bodyDataForm.password"

            />
            <div v-if="$v.bodyDataForm.password.$error">
              <p
                class="text-red-500"
                v-if="!$v.bodyDataForm.password.minLength"
              >
                mot de asse de min. 4 caractères
              </p>
              <p class="text-red-500" v-if="!$v.bodyDataForm.password.required">
                Ce champ doit être rempli
              </p>
            </div>

            <a
              href="#"
              class="text-sm font-thin text-gray-800 hover:underline mt-2 inline-block hover:text-indigo-600"
              >Forget Password</a
            >
          </div>
          <button
            class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded"
            @click="sendDataForm($event)"
          >
            Login
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { required, minLength, email } from "vuelidate/lib/validators";
export default {
  name: "Home",
  data() {
    return {
      isOkToSubmit: true,
      isConnected: false,
      bodyDataForm: {
        email: null,
        password: null,
      },
      response: null,
    };
  },
  validations: {
    bodyDataForm: {
      email: {
        required,
        email,
      },
      password: {
        required,
        minLength: minLength(4),
      },
    },
  },
  methods: {
    connectionConfirmed() {
      this.$emit("getConfirmationConnected");
    },
    sendDataForm(e) {
      e.preventDefault();
      var formRequest = new FormData();
      var tokenReq = null;
      formRequest.append("email", this.bodyDataForm.email);
      formRequest.append("password", this.bodyDataForm.password);
      if (this.isOkToSubmit) {
        axios
          .post("http://127.0.0.1:8001/api/v1/login/user", formRequest)
          .then((response) => {
            console.log("login", response);
            if (response.data.status == 200) {
              tokenReq = response.data.data.token;
              this.$store.dispatch("updateTokenConnexion", tokenReq);
              localStorage.setItem("tokenConnexion", tokenReq);
              localStorage.setItem("isConnected", 1);
              console.log(response.data.status);
              this.$store.dispatch("updateIsconnected", true);
              this.$router.push({ path: "/multisteps" });
            }
          });
      }
      this.$v.bodyDataForm.email.$touch();
      this.$v.bodyDataForm.password.$touch();
    },
  },
};
</script>