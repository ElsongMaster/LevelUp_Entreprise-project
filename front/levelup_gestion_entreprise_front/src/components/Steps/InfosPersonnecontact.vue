<template>
  <div>
    <section class="bg-gray-100">
      <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
        <p class="text-4xl underline underline-offset-8 m-5">
          Informations sur la personne de contact
        </p>
        <div class="flex justify-center">
          <div
            class="w-3/4 p-8 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-3"
          >
            <form action="" class="space-y-4">
              <div>
                <label class="sr-only" for="email">Email</label>
                <input
                @blur="checkFullFillForm()"
                  class="w-full p-3 text-sm border border-gray-200 rounded-lg"
                  placeholder="email"
                  type="text"
                  id="email"
                  name="email"
                  v-model="personneContact.email"
                />
              </div>

              <div>
                <label class="sr-only" for="nom">Nom</label>
                <input
                @blur="checkFullFillForm()"
                  class="w-full p-3 text-sm border border-gray-200 rounded-lg"
                  placeholder="nom"
                  type="text"
                  id="nom"
                  name="nom"
                  v-model="personneContact.nom"
                />
              </div>

              <div>
                <label class="sr-only" for="num">Numéro de téléphone</label>
                <input
                @blur="checkFullFillForm()"
                  class="w-full p-3 text-sm border border-gray-200 rounded-lg"
                  placeholder="Numéro de téléphone"
                  type="text"
                  id="num"
                  name="num"
                  v-model="personneContact.num"
                />
              </div>

              <div class="mt-5">


                <button
                ref="btn2"
                  type="button"
                  class="inline-flex items-center mt-5 ml-2 justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto"
                  @click="sendDataForm()"
                  disabled
                >
                  Submit
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "InfosPersonnecontact",
  data() {
    return {
      personneContact: {
        email: this.$store.state.personneContact.email,
        nom: this.$store.state.personneContact.nom,
        num: this.$store.state.personneContact.num,
      },
    };
  },

  methods: {
    decrementStep() {
      this.$emit("decrement");
      this.$store.dispatch("updatePersonneContact", this.personneContact);
    },
    checkFullFillForm() {
      this.formIsFullFill =
        this.infosEntreprise.email &&
        this.infosEntreprise.nom &&
        this.infosEntreprise.num;


      if (this.formIsFullFill ) {
        this.$refs.btn2.classList.remove("pointer-events-none");
        this.$refs.btn2.classList.remove("bg-gray-300");
        this.$refs.btn2.classList.add("bg-black");
        this.$refs.btn2.disabled = false;
      } else if (!this.$refs.btn2.classList.contains("bg-gray-300")) {
        this.$refs.btn2.classList.add("pointer-events-none");
        this.$refs.btn2.classList.add("bg-gray-300");
        this.$refs.btn2.classList.remove("bg-black");
        this.$refs.btn2.disabled = true;
      }
    },

    sendDataForm() {
      var formRequest = new FormData();
      formRequest.append("email", this.$store.state.personneContact.email);
      formRequest.append("nom", this.$store.state.personneContact.nom);
      formRequest.append("num", this.$store.state.personneContact.num);

      var tokenReq = localStorage.getItem("tokenConnexion");

      axios
        .post(
          "http://127.0.0.1:8001/api/v1/register/personnecontact",
          formRequest,
          {
            headers: {
              Authorization: "Bearer " + tokenReq,
              "Content-Type": "multipart/form-data",
            },
          }
        )
        .then((response) => {
          console.log("personneContact", response);
          this.$store.dispatch("updatePersonneContact", this.personneContact);
        });
    },
  },
};
</script>

<style></style>
