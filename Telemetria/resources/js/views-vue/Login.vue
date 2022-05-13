<template>
<div class="d-flex justify-center align center" style="height: 100%;">
    <v-alert
        style="z-index: 1; margin: 10% auto;"
        :value="alert"
        width="600px"
        transition="scale-transition">
        <v-card  class="mt-5 pa-10" style="padding: 10px">
            <v-card-title>
                Войдите в аккаунт
            </v-card-title>

            <v-text-field
                label="Введите логин"
                v-model="login"
                outlined
            ></v-text-field>

            <v-text-field
                type="password"
                label="Введите пароль"
                v-model="password"
                outlined
            ></v-text-field>
            <v-list>
                <v-list-content>
                    <v-list-item>
                        <v-row>
                            <v-btn @click="authenticate()" outlined depressed elevation="4" color="indigo accent-3">
                                Войти
                            </v-btn>
                        </v-row>
                    </v-list-item>
                    <v-list-item>
                        <v-alert type="error" id="Alert" style="opacity: 0; transition: 1s; border-radius: 5px;">
                            Упс, что-то не так с данными. Попробуй еще разок ^_^
                        </v-alert>
                    </v-list-item>
                </v-list-content>
            </v-list>
        </v-card>
    </v-alert>
</div>
</template>
<script>
export default {
    name:"Login",
    data: () => ({
        alert: true,
        password: "",
        login: "",
    }),
    methods: {
        authenticate(){
            axios.post('api/token', {
                login: this.login,
                password: this.password,
                device_name: navigator.userAgent
            }).then((response)=>{
                localStorage.setItem("key", response.data)
                console.log(response)
            })
        }
    }
}
</script>