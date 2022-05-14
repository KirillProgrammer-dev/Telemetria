<template>
    <div style="font-family: 'Mulish', sans-serif">
        <Menu @addController="overlay = !overlay"></Menu>
        <router-view></router-view>
        <v-overlay :absolute="true" :value="overlay">
            <v-col
                style="
                    display: flex;
                    flex-direction: column;
                    justify-self: center;
                "
            >
                <span
                    >Введите id пользователя для назначения его
                    контроллером</span
                >
                <v-text-field
                    prepend-icon="mdi-database-plus-outline"
                    v-model="id_controller"
                    type="number"
                >
                </v-text-field>
                <v-btn @click="doController()">Назначить</v-btn>
            </v-col>
        </v-overlay>
    </div>
</template>
<script>
import axios from "axios";
import Menu from "./components/Menu.vue";

export default {
    name: "App",
    data: () => ({
        overlay: false,
        id_controller: 0,
    }),
    components: {
        Menu,
    },
    methods: {
        doController() {
            axios
                .post("/api/set-controller", null, {
                    headers: {
                        Authorization: "Bearer " + localStorage.getItem("key"),
                    },
                })
                .then((r) => {
                    this.overlay = !this.overlayl;
                });
        },
    },
};
</script>
<style>
@import url("https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
</style>
