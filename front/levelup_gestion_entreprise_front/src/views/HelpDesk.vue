<template>
  <div
    class="flex flex-col items-center justify-center w-screen min-h-screen bg-gray-100 text-gray-800 p-10"
  >
    <h2 class="text-2xl mb-5 underline">
      Bienvenue sur l'assistance chat du site
    </h2>
    <div class="flex m-3">
      <button
        ref="btn"
        @click="getWelcomeMsg()"
        class="cursor-pointer py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
      >
        <i class="fas fa-comments"></i>
      </button>
      <p class="w-1/2 bg-white rounded">
        Cliquer sur l'icone pour entrer en contact avec un admnistrateur
      </p>
    </div>

    <!-- Component Start -->
    <div
      class="flex flex-col flex-grow w-full max-w-xl bg-white shadow-xl rounded-lg overflow-hidden"
    >
      <div class="flex flex-col flex-grow h-0 p-4 overflow-auto">
        <div v-for="(msg, index) in adminMsgs" :key="index">
          <div class="flex w-full mt-2 space-x-3 max-w-xs">
            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
            <div>
              <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
                <p class="text-sm">{{ msg }}</p>
              </div>
              <span class="text-xs text-gray-500 leading-none">2 min ago</span>
            </div>
          </div>
          <div
            v-if="userMsgs[index].display"
            class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end"
          >
            <div>
              <div
                class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg"
              >
                <p class="text-sm">{{ userMsgs[index].contenu }}</p>
              </div>
              <span class="text-xs text-gray-500 leading-none">2 min ago</span>
            </div>
            <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
          </div>
        </div>
        <!-- <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
          <div>
            <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
              <p class="text-sm">Lorem ipsum dolor sit amet.</p>
            </div>
            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
          </div>
          <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
        </div>
        <div class="flex w-full mt-2 space-x-3 max-w-xs">
          <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
          <div>
            <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
              <p class="text-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
            </div>
            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
          </div>
        </div>
        <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
          <div>
            <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
              <p class="text-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
            </div>
            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
          </div>
          <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
        </div>
        <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
          <div>
            <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
              <p class="text-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt.
              </p>
            </div>
            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
          </div>
          <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
        </div>
        <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
          <div>
            <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
              <p class="text-sm">Lorem ipsum dolor sit amet.</p>
            </div>
            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
          </div>
          <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
        </div>
        <div class="flex w-full mt-2 space-x-3 max-w-xs">
          <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
          <div>
            <div class="bg-gray-300 p-3 rounded-r-lg rounded-bl-lg">
              <p class="text-sm">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua.
              </p>
            </div>
            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
          </div>
        </div>
        <div class="flex w-full mt-2 space-x-3 max-w-xs ml-auto justify-end">
          <div>
            <div class="bg-blue-600 text-white p-3 rounded-l-lg rounded-br-lg">
              <p class="text-sm">Lorem ipsum dolor sit.</p>
            </div>
            <span class="text-xs text-gray-500 leading-none">2 min ago</span>
          </div>
          <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-300"></div>
        </div> -->
      </div>

      <div class="bg-gray-300 p-4">
        <input
          v-on:keyup.enter="getMsgUser()"
          class="flex items-center h-10 w-full rounded px-3 text-sm"
          type="text"
          ref="inputUserMsg"
          placeholder="Type your message…"
        />
      </div>
    </div>
    <!-- Component End  -->
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "HelpDesk",

  // created() {
  //   if (!JSON.parse(localStorage.getItem("adminMsgs"))) {
  //     localStorage.setItem("userMsgs", "[]");
  //     localStorage.setItem("adminMsgs", "[]");
  //   }
  // },

  mounted() {
    if(JSON.parse(localStorage.getItem("sessionMsgIsFinish"))){
      this.clotureSessionChat()
    }
    if (localStorage.getItem("adminMsgs")) {
      this.adminMsgs = JSON.parse(localStorage.getItem("adminMsgs"));
      this.userMsgs = JSON.parse(localStorage.getItem("userMsgs"));
      this.sessionMsgIsFinish = JSON.parse(localStorage.getItem("sessionMsgIsFinish"));
    }
    if (this.adminMsgs) {
      this.responseAdmin();
    }

    if (
      !this.sessionMsgIsFinish &&
      this.adminMsgs &&
      !this.$refs.btn.classList.contains("bg-disable")
    ) {
      this.$refs.btn.classList.add("bg-disable");
    } else {
      this.$refs.btn.classList.remove("bg-disable");
    }

    // this.sessionMsgIsFinish = localStorage.getItem("sessionMsgIsFinish") ? false : true;
  },
  data() {
    return {
      userMsgs: null,
      adminMsgs: null,

      sessionMsgIsFinish: false,
    };
  },

  methods: {
    getWelcomeMsg() {
      if (!this.sessionMsgIsFinish) {
        var tokenReq = localStorage.getItem("tokenConnexion");
        axios
          .get("http://127.0.0.1:8001/api/v1/message/welcome", {
            headers: {
              Authorization: "Bearer " + tokenReq,
            },
          })
          .then((response) => {
            console.log(response);
            this.adminMsgs = [];
            this.userMsgs = [];
            this.adminMsgs.push(response.data.data.msg);
            this.userMsgs.push({ contenu: "", display: false });
            localStorage.setItem("userMsgs", JSON.stringify(this.userMsgs));
            localStorage.setItem("adminMsgs", JSON.stringify(this.adminMsgs));
            this.$refs.btn.classList.add("bg-disable");
            this.$refs.btn.setAttribute("disabled", true);
          });
      }
    },

    getMsgUser() {
      console.log("dans ma fonction");
      if (this.adminMsgs.length > 0) {
        this.userMsgs[this.adminMsgs.length - 1].display = true;

        this.userMsgs[this.adminMsgs.length - 1].contenu =
          this.$refs.inputUserMsg.value;
        localStorage.setItem("userMsgs", JSON.stringify(this.userMsgs));
        let msgTmp = this.$refs.inputUserMsg.value;
        this.$refs.inputUserMsg.value = "";
        // stockage du msg
        var formRequest = new FormData();
        formRequest.append("contenu", msgTmp);
        var tokenReq = localStorage.getItem("tokenConnexion");
        axios
          .post("http://127.0.0.1:8001/api/v1/message", formRequest, {
            headers: {
              Authorization: "Bearer " + tokenReq,
            },
          })
          .then((response) => {
            console.log(response);
          });
      }
    },

    responseAdmin() {
      var tokenReq = localStorage.getItem("tokenConnexion");
      axios
        .get("http://127.0.0.1:8001/api/v1/message/admin", {
          headers: {
            Authorization: "Bearer " + tokenReq,
          },
        })
        .then((response) => {
          console.log(response);
          if (response.data.data.sessionMsgIsFinish == "1") {
            this.sessionMsgIsFinish = true;
            this.adminMsgs.push(
              "La session de chat à été cloturé par l'administrateur"
            );
            localStorage.setItem("sessionMsgIsFinish", JSON.stringify(true));
            this.userMsgs.push({ contenu: "", display: false });
          } else {
            this.adminMsgs = JSON.parse(localStorage.getItem("adminMsgs"));
            this.userMsgs = JSON.parse(localStorage.getItem("userMsgs"));
            this.adminMsgs.push(response.data.data.msgAdmin);
            this.userMsgs.push({ contenu: "", display: false });
            localStorage.setItem("adminMsgs", JSON.stringify(this.adminMsgs));
            localStorage.setItem("userMsgs", JSON.stringify(this.userMsgs));
            localStorage.setItem("sessionMsgIsFinish", JSON.stringify(true));
          }
        });
    },

    clotureSessionChat(){
      localStorage.removeItem("userMsgs");
      localStorage.removeItem("adminMsgs");
      localStorage.removeItem("sessionMsgIsFinish");
    }
  },

  // beforeUnmount() {
  //   if (this.sessionMsgIsFinish) {
  //     localStorage.removeItem("userMsgs");
  //     localStorage.removeItem("adminMsgs");
  //     localStorage.removeItem("sessionMsgIsFinish");
  //   }
  // },
};
</script>

<style scoped>
.bg-disable {
  background-color: gray !important;
}
</style>
