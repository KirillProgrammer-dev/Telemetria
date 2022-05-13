<template>
    <div class="d-flex justify-center align center" style="height: 100%;">
    <v-alert
      style="z-index: 10; margin: 10% auto;"
      :value="alert"
      width="600px"
      transition="scale-transition">
        <v-card  class="mt-5 pa-10" style="padding: 10px">
            <v-card-title>
                Войдите в аккаунт
            </v-card-title>

            <v-text-field
                label="Введите имя"
                v-model="name"
                outlined
            >
            </v-text-field>

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
        </v-card>
         </v-alert>
    </div>
</template>
<script>
export default {
    name:"LoginView",
    data: () => ({
        name: "",
        password: "",
        login: "",
    }),
    methods: {
        authenticate(){
            this.axios({
                method: 'GET',
                url: 'https://61f4184a10f0f7001768c802.mockapi.io/users',
            }).then((response)=>{
                let find = false;
                for(let i of response.data){
                    if((i.name == this.name) && (i.password == this.password) && (i.login == this.login)){
                        this.$emit('login', {
                            name: i.name,
                            password: i.password,
                            login: i.login,
                            id: i.id,
                            avatar: i.avatar,
                            website: i.website,
                            email: i.email,
                            city: i.city,
                            company: i.company,
                            photo: i.photo,
                            loggedin: true,
                        })
                        this.$router.push("/home");
                        find = true;
                    }
                }
                if(!find) {
                    document.getElementById("Alert").style.opacity = "1";
                }
                
            })
        }
    }
}
</script>