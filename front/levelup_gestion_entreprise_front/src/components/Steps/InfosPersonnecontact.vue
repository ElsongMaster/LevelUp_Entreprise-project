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
                  @click="sendDataToBackend()"
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
  mounted() {
    if (localStorage.getItem("personneContact")) {
      // console.log('mounted1');
      this.personneContact = JSON.parse(
        localStorage.getItem("personneContact")
      );
    }
    this.checkFullFillForm();
  },
  data() {
    return {
      request1IsValid: null,
      request2IsValid: null,
      personneContact: {
        email: null,
        nom: null,
        num: null,
      },
    };
  },

  methods: {
    // decrementStep() {
    //   this.$emit("decrement");
    //   this.$store.dispatch("updatePersonneContact", this.personneContact);
    // },
    checkFullFillForm() {
      this.formIsFullFill =
        this.personneContact.email &&
        this.personneContact.nom &&
        this.personneContact.num;

      localStorage.setItem("personneContact", this.personneContact);

      if (this.formIsFullFill) {
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

    sendInfosPersonnecontact() {
      localStorage.setItem(
        "personneContact",
        JSON.stringify(this.personneContact)
      );
      var formRequest = new FormData();
      formRequest.append("email", this.personneContact.email);
      formRequest.append("nom", this.personneContact.nom);
      formRequest.append("num", this.personneContact.num);

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
          this.request2IsValid = response.status == 200;
          console.log("personneContact", this.request2IsValid, response);
          if (this.request2IsValid) {
            this.updateProfileStatutUSer();
            this.cleanLocalStorage();
          }
          // this.$store.dispatch("updatePersonneContact", this.personneContact);
        });
    },

    sendInfoEntreprise() {
      let infosEntreprise = JSON.parse(localStorage.getItem("InfosEntreprise"));
      var formRequest = new FormData();
      formRequest.append("num_tva", infosEntreprise.num_tva);
      formRequest.append("nom", infosEntreprise.nom);
      formRequest.append("activite", infosEntreprise.activite);
      formRequest.append("adresse", infosEntreprise.adresse);
      formRequest.append("ville", infosEntreprise.ville);
      formRequest.append("code_postal", infosEntreprise.code_postal);
      formRequest.append("pays", infosEntreprise.pays);
      formRequest.append("num_fixe", infosEntreprise.num_fix);

      var tokenReq = localStorage.getItem("tokenConnexion");
      console.log(formRequest, tokenReq, infosEntreprise);
      axios
        .post(
          "http://127.0.0.1:8001/api/v1/register/profilecompany",
          formRequest,
          {
            headers: {
              Authorization: "Bearer " + tokenReq,
              "Content-Type": "multipart/form-data",
            },
          }
        )
        .then((response) => {
          this.request1IsValid = response.status == 200;
          if (this.request1IsValid) {
            this.sendInfosPersonnecontact();
          }
          console.log("profilecompany", this.request1IsValid, response);
        });
    },

    updateProfileStatutUSer() {
      var tokenReq = localStorage.getItem("tokenConnexion");

      //MAJ dans la base donnée en indiquant que le profil est complété
      axios
        .post(
          "http://127.0.0.1:8001/api/v1/profilestatus",
          { profilestatus: true },
          {
            headers: {
              Authorization: "Bearer " + tokenReq,
            },
          }
        )
        .then((response) => {
          console.log("profileStatus", response);
          if (response.status == 200) {
            this.cleanLocalStorage();
            this.$router.push({ path: "/dashboard" });
          }
        });
    },

    sendDataToBackend() {
      this.sendInfoEntreprise();
      console.log("condition", this.request1IsValid && this.request2IsValid);
      // if (this.request1IsValid && this.request2IsValid) {
      this.updateProfileStatutUSer();
      this.$router.push({ path: "/dashboard" });
      // }
    },

    cleanLocalStorage() {
      console.log("cleanLocal");
      localStorage.removeItem("personneContact");
      localStorage.removeItem("InfosEntreprise");
      localStorage.removeItem("vatNumberIsValid");
    },
  },
};
</script>

<style></style>
