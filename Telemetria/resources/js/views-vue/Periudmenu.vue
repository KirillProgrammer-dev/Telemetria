<template>
    <v-stepper
        v-model="e1"
        style="width: 60%; padding: 20px; margin: 20px auto"
    >
        <v-stepper-header>
            <v-stepper-step :complete="e1 > 1" step="1">
                Выберите нужное время
            </v-stepper-step>

            <v-divider></v-divider>

            <v-stepper-step :complete="e1 > 2" step="2">
                Выберите нужный филиал
            </v-stepper-step>
        </v-stepper-header>

        <v-stepper-items>
            <v-stepper-content step="1">
                <v-card
                    class="stepper-card"
                    color="grey lighten-1"
                    height="200px"
                    style="box-shadow: none"
                >
                    <v-row>
                        <v-col cols="5">
                            <v-subheader
                                >Выберите начало промежутка</v-subheader
                            >
                        </v-col>
                        <v-col cols="7">
                            <v-text-field
                                v-model="start"
                                id="starttime"
                                label="Начало"
                                value="00:00:00"
                                type="time"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <br />
                    <v-row>
                        <v-col cols="5">
                            <v-subheader>Выберите конец промежутка</v-subheader>
                        </v-col>
                        <v-col cols="7">
                            <v-text-field
                                v-model="end"
                                id="endtime"
                                label="Конец"
                                value="00:00:00"
                                type="time"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-card-actions>
                        <v-btn @click="e1 = 2"> Дальше </v-btn>
                    </v-card-actions>
                </v-card>
            </v-stepper-content>

            <v-stepper-content step="2" data-app>
                <v-card
                    class="stepper-card"
                    color="grey lighten-1"
                    height="200px"
                    style="margin-bottom: 1em; padding: 1em; box-shadow: none"
                >
                    <yandex-map
                        ref="map"
                        :coords="[55.72, 37.65]"
                        zoom="10"
                        style="width: 100%; height: 600px"
                        :controls="[]"
                    >
                        <ymap-marker
                            v-for="n in markers"
                            :key="n.id"
                            :marker-id="n.id"
                            marker-type="placemark"
                            :coords="n.coord"
                            @click="markerClick(n)"
                        ></ymap-marker>
                    </yandex-map>
                    <v-list>
                        <v-list-group
                            v-for="item in items"
                            :key="item.id"
                            no-action
                        >
                            <template v-slot:activator>
                                <v-list-item-content>
                                    <v-list-item-title
                                        v-text="item.nameroom"
                                    ></v-list-item-title>
                                </v-list-item-content>
                            </template>

                            <v-list-item
                                v-for="child in item.cameras"
                                :key="child.id"
                            >
                                <v-list-item-content>
                                    <v-list-item-title
                                        @click="openVideo(child.id)"
                                        link
                                        v-text="child.name"
                                    ></v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </v-list-group>
                    </v-list>
                </v-card>
                <br />

                <v-btn @click="e1 = 1"> Назад </v-btn>
            </v-stepper-content>
        </v-stepper-items>
    </v-stepper>
</template>

<script>
import { yandexMap, ymapMarker } from "vue-yandex-maps";

export default {
    name: "Menu",
    data: () => ({
        e1: 1,
        items: [],
        start: "00:00:00",
        end: "00:00:00",
        settings: {
            apiKey: "23b02bd1-30cc-4b27-8a91-217c362532bc",
            lang: "ru_RU",
            coordorder: "latlong",
            enterprise: false,
            version: "2.1",
        },
        markers: [
            { coord: [55.8, 37.4], text: "1" },
        ].map((n, i) => ({ ...n, id: i + 1 })),
    }),

    components: { yandexMap, ymapMarker },

    mounted() {
        axios.post("api/all-rooms").then((response) => {
            this.items = response.data;
        });
    },

    methods: {
        // openVideo(id) {
        //     localStorage.setItem("videoStart", this.start);
        //     localStorage.setItem("videoEnd", this.end);
        //     window.location = "/video/" + id;
        // },
        markerClick(m) {
            localStorage.setItem("videoStart", this.start);
            localStorage.setItem("videoEnd", this.end);
            window.location = "/video/" + m.text;
        }
    },
};
</script>
<style>
.stepper-card {
    box-shadow: none;
}
.theme--light.v-btn.v-btn--has-bg {
    background-color: #363636;
    color: white;
    margin: -1em 0 0 1.4em;
}
.v-stepper {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
</style>
