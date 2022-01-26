<template>
  <component :is ="steps[currentStep].component" />
</template>

<script>
// import { component } from "vue/types/umd";
import infosEntreprise from "./Steps/InfosEntreprise.vue";
import InfosPersonnecontact from "./Steps/InfosPersonnecontact.vue";
export default {
  name: "MultiSteps",
  data() {
    return {
      currentStep: 1,
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
};
</script>

<style></style>
