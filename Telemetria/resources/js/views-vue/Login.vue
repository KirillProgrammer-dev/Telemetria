<template>
<div class="d-flex justify-center align center" style="height: 100%;">
    <v-alert
        style="z-index: 1; margin: 10% auto;"
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
                <v-col>
                    <v-btn @click="authenticate()" outlined depressed elevation="4" color="indigo accent-3">
                        Войти
                    </v-btn>
                    <v-alert :value="alert" type="error" id="Alert" style="transition: 1s; border-radius: 5px; margin:1em;">
                        Упс, что-то не так с данными. Попробуйте еще разок
                    </v-alert>
                </v-col>
        </v-card>
    </v-alert>
</div>
</template>
<script>
export default {
    name:"Login",
    data: () => ({
        alert: false,
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
                if (response.data){
                    localStorage.setItem("key", response.data);
                    console.log(response);
                    window.location = "/";
                } else {
                    this.alert = true;
                }
            })
        }
    }
}
</script>