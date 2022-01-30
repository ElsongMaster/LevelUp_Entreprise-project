import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    isConnected:localStorage.getItem("isConnected")?true:false,
    vatNumberIsValid:null,
    tokenConnexion:null,
    personneContact:{
      email:null,
      nom:null,
      num:null,
    },
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
  },
  mutations: {
    setValIsconnected(state,isConnected){
      state.isConnected  = isConnected;
    },
    setValvatNumberIsValid(state,vatNumberIsValid){
      state.vatNumberIsValid  = vatNumberIsValid;
    },
    setValTokenConnexion(state,tokenConnexion){
      state.tokenConnexion  = tokenConnexion;
    },
    setValInfosEntreprise(state,infosEntreprise){
      state.infosEntreprise.num_tva  = infosEntreprise.num_tva;
      state.infosEntreprise.nom  = infosEntreprise.nom;
      state.infosEntreprise.activite  = infosEntreprise.activite;
      state.infosEntreprise.adresse  = infosEntreprise.adresse;
      state.infosEntreprise.ville  = infosEntreprise.ville;
      state.infosEntreprise.code_postal  = infosEntreprise.code_postal;
      state.infosEntreprise.pays  = infosEntreprise.pays;
      state.infosEntreprise.num_fix  = infosEntreprise.num_fix;


    },
    setValPersonneContact(state,personneContact){
      state.personneContact.email  = personneContact.email;
      state.personneContact.nom  = personneContact.nom;
      state.personneContact.num  = personneContact.num;



    }
  },
  actions: {
    updateIsconnected ({commit},isConnected){
      commit("setValIsconnected",isConnected)
    },
    updateTokenConnexion ({commit},tokenConnexion){
      commit("setValTokenConnexion",tokenConnexion)
    },
    updatePersonneContact ({commit},personneContact){
      commit("setValPersonneContact",personneContact)
    },
    updateInfosEntreprise ({commit},infosEntreprise){
      commit("setValInfosEntreprise",infosEntreprise)
    },
    updatevatNumberIsValid ({commit},vatNumberIsValid){
      commit("setValvatNumberIsValid",vatNumberIsValid)
    }

  },
  modules: {
  }
})
