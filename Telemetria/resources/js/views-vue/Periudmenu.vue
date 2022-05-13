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
                            <v-text-field id="starttime" label="Начало" value="13:30:00" type="time"></v-text-field>
                        </v-col>
                    </v-row>
                    <br />
                    <v-row>
                        <v-col cols="5">
                            <v-subheader>Выберите конец промежутка</v-subheader>
                        </v-col>
                        <v-col cols="7">
                            <v-text-field id="endtime" label="Конец" value="13:30:00" type="time"></v-text-field>
                        </v-col>
                    </v-row>
                </v-card>
                <br />

                <v-btn class="mb-30" @click="e1 = 2"> Дальше </v-btn>
            </v-stepper-content>

            <v-stepper-content step="2" data-app>
                <v-card class="mb-12" color="grey lighten-1" height="200px" style="margin-bottom: 1em; padding: 1em;">
                    <v-row align="center">
                        <v-col class="d-flex" cols="12" sm="6">
                            <v-select :items="rooms.roomname" label="Standard"></v-select>
                            <p>{{rooms.roomname}}</p>
                        </v-col>
                    </v-row>
                </v-card>
                <br />

                <v-btn @click="e1 = 3"> Подтвердить </v-btn>

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
            rooms: [{
                roomname: {
                    id: 1,
                    name: "",
            		room_id: 1,
            		created_at: "",
		            updated_at: "",
                }
            }]
            
        }),

        methods: {},

        mounted() {
            axios
            .post('api/all-rooms')
            .then(response =>{
                this.rooms = response.data 
                console.log(this.rooms)
            })
        }
    };

</script>
<style>
</style>
