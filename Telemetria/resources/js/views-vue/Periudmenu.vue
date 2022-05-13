<template>
    <div style="width: 80%; padding: 20px; margin: 20px auto; background-color: #f2f2f2">
        <h1>Выберите временные промежутки</h1>
        <form>
            <v-text-field type="number" minlength="10" maxlength="10" :counter="10" v-model="numbers" :error-messages="nameErrors"  label="Начало" required
                ></v-text-field>
            <v-text-field type="number" minlength="10" maxlength="10" :counter="10" v-model="numbers" :error-messages="numbers" label="Конец" required
                ></v-text-field>
            

            <v-btn class="mr-4" @click="submit">
                Подтвердить
            </v-btn>
            <v-btn @click="clear">
                Очистить
            </v-btn>
        </form>
    </div>
</template>


<script>
    export default {
        name: "Menu",
        data: () => ({}),
        methods: {}
    }

</script>
