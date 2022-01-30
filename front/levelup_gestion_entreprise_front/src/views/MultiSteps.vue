<template>
  <component :is ="steps[currentStep].component" @increment="next()" @decrement="previous()"/>
</template>

<script>
// import { component } from "vue/types/umd";
import infosEntreprise from "../components/Steps/InfosEntreprise.vue";
import InfosPersonnecontact from "../components/Steps/InfosPersonnecontact.vue";
export default {
  name: "MultiSteps",
  data() {
    return {
      currentStep: 0,
      steps: [
        {
          component: infosEntreprise,
        },
        {
          component: InfosPersonnecontact,
        },
      ],
    };
  },
  components: {
    infosEntreprise,
    InfosPersonnecontact,
  },

  methods:{
      next(){
          this.currentStep+=1;
      },

      previous(){
          this.currentStep-=1;
      }
  }
};
</script>

<style></style>
