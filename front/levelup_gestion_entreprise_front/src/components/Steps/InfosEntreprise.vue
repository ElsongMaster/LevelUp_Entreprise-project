<template>
  <section class="bg-gray-100">
    <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
      <p class="text-4xl underline underline-offset-8 m-5">
        Informations générales de l'Entreprise
      </p>
      <div class="flex justify-center">
        <div
          class="w-3/4 p-8 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-3"
        >
          <form
            ref="form"
            @submit.prevent="verifVatNumber($event)"
            class="space-y-4"
          >
            <div>
              <label class="sr-only" for="num_tva">Numéro de tva</label>
              <input
                class="w-full p-3 text-sm border border-gray-200 rounded-lg"
                placeholder="Numéro de tva"
                type="text"
                id="num_tva"
                ref="num_tva"
                name="num_tva"
                v-model="infosEntreprise.num_tva"
                :disabled="this.$store.state.vatNumberIsValid"
                @blur="verifVatNumber()"
              />
              <!-- <p
                  class="text-red-500"
                  v-if="!this.$store.state.vatNumberIsValid && infosEntreprise.num_tva !=null"
                >
                  Ce numéro de tva n'est pas valide
                </p> -->
              <div v-if="$v.infosEntreprise.num_tva.$error">
                <p
                  class="text-red-500"
                  v-if="!$v.infosEntreprise.num_tva.required"
                >
                  Ce champ doit être rempli
                </p>
              </div>
            </div>
            <div>
              <label class="sr-only" for="nom">Nom</label>
              <input
                @blur="checkFullFillForm()"
                class="w-full p-3 text-sm border border-gray-200 rounded-lg"
                placeholder="nom"
                type="text"
                id="nom"
                ref="nom"
                name="nom"
                v-model="infosEntreprise.nom"
                :disabled="this.$store.state.vatNumberIsValid"
              />
            </div>

            <div>
              <label class="sr-only" for="nom">Activité</label>
              <input
                @blur="checkFullFillForm()"
                class="w-full p-3 text-sm border border-gray-200 rounded-lg"
                placeholder="Activité"
                type="text"
                id="Activité"
                ref="activite"
                name="activite"
                v-model="infosEntreprise.activite"
              />
            </div>

            <div>
              <label class="sr-only" for="nom">Adresse</label>
              <input
                @blur="checkFullFillForm()"
                class="w-full p-3 text-sm border border-gray-200 rounded-lg"
                placeholder="adresse"
                type="text"
                id="adresse"
                name="adresse"
                ref="adresse"
                v-model="infosEntreprise.adresse"
                :disabled="this.$store.state.vatNumberIsValid"
              />
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
              <div>
                <label class="sr-only" for="ville">ville</label>
                <input
                  @blur="checkFullFillForm()"
                  class="w-full p-3 text-sm border border-gray-200 rounded-lg"
                  placeholder="Ville"
                  id="ville"
                  ref="ville"
                  name="ville"
                  v-model="infosEntreprise.ville"
                  :disabled="this.$store.state.vatNumberIsValid"
                />
              </div>

              <div>
                <label class="sr-only" for="code_postal">Code postale</label>
                <input
                  @blur="checkFullFillForm()"
                  class="w-full p-3 text-sm border border-gray-200 rounded-lg"
                  placeholder="Code postal"
                  id="code_postal"
                  ref="code_postal"
                  name="code_postal"
                  v-model="infosEntreprise.code_postal"
                  :disabled="this.$store.state.vatNumberIsValid"
                />
              </div>
              <div>
                <label class="sr-only" for="pays">Pays</label>
                <input
                  @blur="checkFullFillForm()"
                  class="w-full p-3 text-sm border border-gray-200 rounded-lg"
                  placeholder="Pays"
                  id="pays"
                  ref="pays"
                  name="pays"
                  v-model="infosEntreprise.pays"
                  :disabled="this.$store.state.vatNumberIsValid"
                />
              </div>
            </div>
            <div>
              <label class="sr-only" for="num_fix">Numéro fixe</label>
              <input
                @blur="checkFullFillForm()"
                class="w-full p-3 text-sm border border-gray-200 rounded-lg"
                placeholder="Numéro fixe"
                type="text"
                id="num_fix"
                ref="num_fix"
                name="num_fix"
                v-model="infosEntreprise.num_fix"
              />
            </div>

            <div class="mt-5">
              <button
                class="inline-flex items-center mt-5 justify-center w-full px-5 py-3 text-white bg-gray-300 rounded-lg sm:w-auto pointer-events-none"
                disabled
                type="submit"
                ref="btn"
                @click="incrementStep()"
              >
                <span class="font-medium"> Next </span>

                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="w-5 h-5 ml-3"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M14 5l7 7m0 0l-7 7m7-7H3"
                  />
                </svg>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
import { required } from "vuelidate/lib/validators";
// const vatNumberIsValid = (vm)=>{vm.value}
export default {
  name: "infosEntreprise",
  data() {
    return {
      infosEntreprise: {
        num_tva: null,
        nom: null,
        activite: null,
        adresse: null,
        ville: null,
        code_postal: null,
        pays: null,
        num_fix: null,
      },
      formIsFullFill: null,
    };
  },
  validations: {
    infosEntreprise: {
      num_tva: {
        required,
      },
    },
  },
  mounted() {
    // console.log(localStorage.getItem('InfosEntreprise'));
    if (localStorage.getItem("InfosEntreprise")) {
      // console.log('mounted2');
      this.infosEntreprise = JSON.parse(
        localStorage.getItem("InfosEntreprise")
      );
    }
    this.checkFullFillForm();
  },

  methods: {
    incrementStep() {
      this.$emit("increment");
      this.$store.dispatch("updateInfosEntreprise", this.infosEntreprise);

      // this.sendDataForm();
    },

    disabledInput() {
      this.$refs.num_tva.setAttribute("disabled", true);
      this.$refs.nom.setAttribute("disabled", true);
      this.$refs.activite.setAttribute("disabled", true);
      this.$refs.adresse.setAttribute("disabled", true);
      this.$refs.ville.setAttribute("disabled", true);
      this.$refs.code_postal.setAttribute("disabled", true);
      this.$refs.pays.setAttribute("disabled", true);
      this.$refs.num_fix.setAttribute("disabled", true);
    },

    enabledInput() {
      this.$refs.num_tva.setAttribute("disabled", false);
      this.$refs.nom.setAttribute("disabled", false);
      this.$refs.activite.setAttribute("disabled", false);
      this.$refs.adresse.setAttribute("disabled", false);
      this.$refs.ville.setAttribute("disabled", false);
      this.$refs.code_postal.setAttribute("disabled", false);
      this.$refs.pays.setAttribute("disabled", false);
      this.$refs.num_fix.setAttribute("disabled", false);
    },

    // sendDataForm() {
    //     localStorage.setItem('InfosEntreprise',JSON.stringify(this.infosEntreprise))
    //   var formRequest = new FormData();
    //   formRequest.append("num_tva", this.infosEntreprise.num_tva);
    //   formRequest.append("nom", this.infosEntreprise.nom);
    //   formRequest.append("activite", this.infosEntreprise.activite);
    //   formRequest.append("adresse", this.infosEntreprise.adresse);
    //   formRequest.append("ville", this.infosEntreprise.ville);
    //   formRequest.append("code_postal", this.infosEntreprise.code_postal);
    //   formRequest.append("pays", this.infosEntreprise.pays);
    //   formRequest.append("num_fixe", this.infosEntreprise.num_fix);

    //   var tokenReq = localStorage.getItem("tokenConnexion");
    //   console.log(formRequest, tokenReq, this.infosEntreprise);

    //   axios
    //     .post(
    //       "http://127.0.0.1:8001/api/v1/register/profilecompany",
    //       formRequest,
    //       {
    //         headers: {
    //           Authorization: "Bearer " + tokenReq,
    //           "Content-Type": "multipart/form-data",
    //         },
    //       }
    //     )
    //     .then((response) => {
    //       console.log("profilecompany", response);
    //     });
    // },

    checkFullFillForm() {
      this.formIsFullFill =
        this.infosEntreprise.num_tva &&
        this.infosEntreprise.nom &&
        this.infosEntreprise.activite &&
        this.infosEntreprise.adresse &&
        this.infosEntreprise.ville &&
        this.infosEntreprise.code_postal &&
        this.infosEntreprise.pays &&
        this.infosEntreprise.num_fix;
      let vatNumberIsValid = JSON.parse(
        localStorage.getItem("vatNumberIsValid")
      );

      if (this.formIsFullFill && vatNumberIsValid) {
        localStorage.setItem(
          "InfosEntreprise",
          JSON.stringify(this.infosEntreprise)
        );
        this.$refs.btn.classList.remove("pointer-events-none");
        this.$refs.btn.classList.remove("bg-gray-300");
        this.$refs.btn.classList.add("bg-black");
        this.$refs.btn.disabled = false;
        this.disabledInput();
      } else if (!this.$refs.btn.classList.contains("bg-gray-300")) {
        this.$refs.btn.classList.add("pointer-events-none");
        this.$refs.btn.classList.add("bg-gray-300");
        this.$refs.btn.classList.remove("bg-black");
        this.$refs.btn.disabled = true;
        this.enabledInput();
      }
    },

    verifVatNumber() {
      // console.log('boolean',!this.$store.state.vatNumberIsValid && this.infosEntreprise.num_tva !=null);
      axios
        .get(
          "http://13.38.138.92/api/companies/" +
            this.infosEntreprise.num_tva +
            "/info"
        )
        .then((response) => {
          console.log("controler", response.data.statut);
          let isValid = response.data.statut == 200;
          // var infosEntrepriseTemp = {};
          if (isValid) {
            localStorage.setItem("vatNumberIsValid", "true");
            this.infosEntreprise.tva = response.data.data.tva;
            this.infosEntreprise.nom = response.data.data.nom;
            this.infosEntreprise.adresse = response.data.data.adresse;
            this.infosEntreprise.activite = response.data.data.activite;
            this.infosEntreprise.num_fix = response.data.data.numero;
            this.infosEntreprise.ville = response.data.data.ville;
            this.infosEntreprise.code_postal = response.data.data.code_postal;
            this.infosEntreprise.pays = response.data.data.pays;

            localStorage.setItem(
              "InfosEntreprise",
              JSON.stringify(this.infosEntreprise)
            );

            // this.$store.dispatch("updateInfosEntreprise", this.infosEntreprise);
            this.$store.dispatch("updatevatNumberIsValid", true);
          }
          // else{
          //   this.$store.dispatch("updatevatNumberIsValid", false);
          // }
        });
      this.checkFullFillForm();
      this.$v.infosEntreprise.num_tva.$touch();
    },
  },
  computed: {
    value() {
      return this.$store.state.vatNumberIsValid;
    },
  },
};
</script>

<style></style>
