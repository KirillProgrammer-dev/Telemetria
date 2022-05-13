<template>
    <v-stepper v-model="e1" style="width: 80%; padding: 20px; margin: 20px auto">
        <v-stepper-header>
            <v-stepper-step :complete="e1 > 1" step="1">
                Выберите нудное время
            </v-stepper-step>

            <v-divider></v-divider>

            <v-stepper-step :complete="e1 > 2" step="2">
                Выберите нужный филиал
            </v-stepper-step>

            <v-divider></v-divider>

        </v-stepper-header>

        <v-stepper-items>
            <v-stepper-content step="1">
                <v-card class="mb-12" color="grey lighten-1" height="200px">
                    <v-row>
                        <v-col cols="5">
                            <v-subheader>Выберите начало промежутка</v-subheader>
                        </v-col>
                        <v-col cols="7">
                                    <v-menu ref="menu" v-model="menu2" :close-on-content-click="false" :nudge-right="40"
                                        :return-value.sync="time" transition="scale-transition" offset-y
                                        max-width="290px" min-width="290px">
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field v-model="time" label="Picker in menu"
                                                prepend-icon="mdi-clock-time-four-outline" readonly v-bind="attrs"
                                                v-on="on"></v-text-field>
                                        </template>
                                        <v-time-picker v-if="menu2" v-model="time" full-width
                                            @click:minute="$refs.menu.save(time)"></v-time-picker>
                                    </v-menu>
                        </v-col>
                    </v-row>
                    <br>
                    <v-row>
                        <v-col cols="5">
                            <v-subheader>Выберите конец промежутка</v-subheader>
                        </v-col>
                        <v-col cols="7">
                            <v-text-field label="Конец" value="13:30:00" type="text"></v-text-field>
                        </v-col>
                    </v-row>
                </v-card>
                <br>

                <v-btn @click="e1 = 2">
                    Дальше
                </v-btn>

            </v-stepper-content>

            <v-stepper-content step="2">
                <v-card class="mb-12" color="grey lighten-1" height="200px"></v-card>
                <br>

                <v-btn @click="e1 = 3">
                    Подтвердить
                </v-btn>

                <v-btn @click="e1 = 1">
                    Назад
                </v-btn>
            </v-stepper-content>

        </v-stepper-items>
    </v-stepper>
</template>



<script>
    export default {
        name: "Menu",
        data() {
            return {
                e1: 1,
                time: null,
                menu2: false,
            }
        },
        methods: {

        }

    }

</script>
