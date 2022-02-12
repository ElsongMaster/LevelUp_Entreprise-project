<template>
    <div class="row">
        <div class="col-8">
            <div class="card card-default">
                <div class="card-header">Messages</div>
                <div class="card-body p-0">
                    <ul
                        class="list-unstyled"
                        style="height: 300px; overflow-y: scroll"
                    >
                        <li
                            class="p-2"
                            v-for="(message, index) in messages"
                            :key="index"
                        >
                            <strong>{{ message.user.name }}</strong>
                            {{ message.message }}
                        </li>
                    </ul>
                </div>

                <input
                    v-on:keyup.enter="sendMessage()"
                    v-model="newMessage"
                    type="text"
                    name="message"
                    placeholder="Enter your message..."
                    class="form-control"
                />
            </div>
            <span class="text-muted" v-if="true">Elsong is typing...</span>
        </div>

        <div class="col-4">
            <div class="card card-default">
                <div class="card-header">Active Users</div>
                <div class="card-body">
                    <ul>
                        <li class="py-2">{{ user.name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AppComponent",
    props: ["user"],
    data() {
        return {
            messages: [],
            newMessage: "",
        };
    },
    created() {
        this.fetchMessages();
        Echo.join("chat").listen("MessageSent", (event) => {
            this.messages.push(event.message);
        });
    },

    methods: {
        login() {
            var formRequest = new FormData();
            var tokenReq = null;
            formRequest.append("email", "oklm@gmail.com");
            formRequest.append("password", "test");
            axios
                .post("http://127.0.0.1:8001/api/v1/login/user", formRequest)
                .then((response) => {
                    console.log("login", response);

                    if (response.data.status == 200) {
                        tokenReq = response.data.data.token;
                        localStorage.setItem("tokenConnexion2", tokenReq);
                        this.fetchMessages();
                    }
                });
        },
        fetchMessages() {
            var tokenReq = localStorage.getItem("tokenConnexion2");
            console.log("message", tokenReq);
            axios.get("/api/messages").then((response) => {
                this.messages = response.data;
            });
        },
        sendMessage() {
            this.messages.push({ user: this.user, message: this.newMessage });
            axios.post("/api/messages", {
                user: this.user,
                message: this.newMessage,
            });
            this.newMessage = "";
        },
    },
};
</script>

<style></style>
