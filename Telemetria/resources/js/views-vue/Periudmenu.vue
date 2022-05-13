<template>
    <v-stepper v-model="e1">
        <v-stepper-header>
            <v-stepper-step :complete="e1 > 1" step="1">
                Выбор временных рамок
            </v-stepper-step>

            <v-divider></v-divider>

            <v-stepper-step :complete="e1 > 2" step="2">
                Выбор камеры
            </v-stepper-step>
        </v-stepper-header>

        <v-stepper-items>
            <v-stepper-content step="1">
                <v-card class="mb-12" color="grey lighten-1" height="200px">
                    <v-range-slider
                    hint="Im a hint"
                    max="50"
                    min="-50"
                    ></v-range-slider>
                </v-card>

                <v-btn color="primary" @click="e1 = 2">
                    Далее
                </v-btn>

                <v-btn text>
                    Отмена
                </v-btn>
            </v-stepper-content>

            <v-stepper-content step="2">
                <v-card class="mb-12" color="grey lighten-1" height="200px"></v-card>

                <v-btn color="primary" @click="e1 = 3">
                    
                </v-btn>

                <v-btn text>
                    Отмена
                </v-btn>
            </v-stepper-content>
        </v-stepper-items>
    </v-stepper>
</template>


<script>
export default {
    name: "Menu",
    data: () => ({
        time: null,
        menu2: false,
        modal2: false,
        e1: 1,
    }),
    methods: {}
}

</script>
