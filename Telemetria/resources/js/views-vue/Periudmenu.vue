<template>
    <v-stepper v-model="e1" style="width: 80%; padding: 20px; margin: 20px auto">
        <v-stepper-header>
            <v-stepper-step :complete="e1 > 1" step="1">
                Выберите нужное время
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
                            <v-text-field v-model="start" id="starttime" label="Начало" value="13:30:20" type="time">
                            </v-text-field>
                        </v-col>
                    </v-row>
                    <br />
                    <v-row>
                        <v-col cols="5">
                            <v-subheader>Выберите конец промежутка</v-subheader>
                        </v-col>
                        <v-col cols="7">
                            <v-text-field v-model="end" id="endtime" label="Конец" value="13:30:20" type="time">
                            </v-text-field>
                        </v-col>
                    </v-row>
                </v-card>
                <br />

                <v-btn class="mb-30" @click="setTime()"> Дальше </v-btn>
            </v-stepper-content>

            <v-stepper-content step="2" data-app>
                <v-card class="mb-12" color="grey lighten-1" height="200px" style="margin-bottom: 1em; padding: 1em;">

                    <v-list>
                        <v-list-group v-for="item in items" :key="item.id" no-action>
                            <template v-slot:activator>
                                <v-list-item-content>
                                    <v-list-item-title v-text="item.nameroom"></v-list-item-title>
                                </v-list-item-content>
                            </template>

                            <v-list-item v-for="child in item.cameras" :key="child.id">
                                <v-list-item-content>
                                    <v-list-item-title v-text="child.name"></v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list-group>
                    </v-list>

                </v-card>
                <br />

                <v-btn @click="checker()"> Подтвердить </v-btn>

                <v-btn @click="e1 = 1"> Назад </v-btn>
            </v-stepper-content>
        </v-stepper-items>
    </v-stepper>
</template>

<script>
    export default {
        name: "Menu",
        data: () => ({
            e1: 1,
            items: [],
            start: "00:00:00",
            end: "00:00:00"


        }),

        methods: {
            setTime() {
                this.e1 = 2
                
                store.commit ("Settime", this.start, this.end)

                console.log(this.$store.state.startTime)
                console.log(this.$store.state.endTime)
            },
            checker(){
                console.log(this.$store.state.startTime)
                console.log(this.$store.state.endTime)
            }
        },

        mounted() {
            axios
                .post('api/all-rooms')
                .then(response => {
                    this.items = response.data;
                });

                console.log(this.$store.state.startTime)
                console.log(this.$store.state.endTime)
        }
    };

</script>