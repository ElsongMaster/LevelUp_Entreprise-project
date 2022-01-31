<template>
<base-panel class="w-full">
        <h2 class="text-2xl font-medium">Nom de l'entreprise</h2>
        <div class="mt-4">
          <div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <base-input label="Name" placeholder="Name"></base-input>
              <base-input
                type="email"
                label="Email address"
                placeholder="Name"
              ></base-input>
              <base-input label="Name" placeholder="Name"></base-input>
              <base-input
                type="email"
                label="Email address"
                placeholder="Name"
              ></base-input>
              <base-input
                type="email"
                label="Email address"
                placeholder="Name"
              ></base-input>
              <base-input
                type="email"
                label="Email address"
                placeholder="Name"
              ></base-input>
              <base-input
                type="email"
                label="Email address"
                placeholder="Name"
              ></base-input>
              <base-input
                type="email"
                label="Email address"
                placeholder="Name"
              ></base-input>
              <base-input
                type="email"
                label="Email address"
                placeholder="Name"
              ></base-input>
            </div>
          </div>
        </div>
      </base-panel>
</template>

<script>
import BaseInput from "../components/BaseInput.vue";
import BasePanel from "../components/BasePanel.vue";
export default {
  components: {
    BaseInput,
    BasePanel,
  },
}
</script>

<style>

</style>