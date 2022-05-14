<template>
    <v-col id="container">
        <h1>Сервис Телеметрия</h1>
        <br />
        <h3 id="describtion">
            Данный сервис предназначен для слежения за барменами и вычисления их
            КПД
        </h3>
        <v-divider id="divider" />
        <h4>
            Если вам требуется доступ к просмотру статистики и камер, пожалуйста
            обратитсь к администратору
        </h4>
    </v-col>
</template>

<script>
export default {
    name: "Login",
    data: () => ({}),
    methods: {},
};
</script>
<style>
#container {
    margin: 5% 0;
    padding-right: 2%;
    display: flex;
    flex-direction: column;
    text-align: center;
}
#divider {
    margin: 1em;
}
#describtion {
    margin-top: 1em;
}
</style>
