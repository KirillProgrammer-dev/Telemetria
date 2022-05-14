<template>
    <v-navigation-drawer
        style="z-index: 999"
        color="deep-orange accent-3 white--text"
        dark
        expand-on-hover
        hide-overlay
        permanent
        right
        absolute
        fixed
    >
        <v-list nav shaped dense>
            <v-list-item two-line>
                <v-list-item-avatar>
                    <span class="white--text text-h5"></span>
                </v-list-item-avatar>
                <v-list-item-content>
                    <v-list-item-title
                        class="font-weight-black"
                    > Admin </v-list-item-title>
                    <v-list-item-subtitle> Admin </v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
            <v-divider class="my-3" />
            <div v-if="login">
                <v-list-item @click="logOut()">
                    <v-list-item-icon>
                        <v-icon>mdi-logout</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title class="text-left"
                            >Выйти</v-list-item-title
                        >
                    </v-list-item-content>
                </v-list-item>
                <v-list-item :to="'/video'">
                    <v-list-item-icon>
                        <v-icon> mdi-movie-open-play-outline </v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title class="text-left"
                            >Просмотр видео</v-list-item-title
                        >
                    </v-list-item-content>
                </v-list-item>
            </div>
            <div v-else>
                <v-list-item link :to="'/login'">
                    <v-list-item-icon>
                        <v-icon>mdi-login</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title class="text-left"
                            >Войти</v-list-item-title
                        >
                    </v-list-item-content>
                </v-list-item>
            </div>
            <v-list-item link :to="'/'">
                <v-list-item-icon>
                    <v-icon> mdi-home-outline </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title class="text-left"
                        >Главная</v-list-item-title
                    >
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
export default {
    name: "Menu",
    data: () => ({
        login: false,
    }),
    methods: {
        logOut() {
            axios.post("api/log-out", null, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("key"),
                },
            });
            this.login = false;
            localStorage.setItem("key", undefined);
        },
        checkLogin() {
            this.login =
                localStorage.getItem("key") != undefined ? true : false;
        },
    },
    mounted() {
        this.checkLogin();
    },
};
</script>
