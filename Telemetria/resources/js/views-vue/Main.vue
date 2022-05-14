<template>
    <div
    style="margin: 5% 0; padding-right: 2%"
    d-flex 
    justify-center 
    align-center>
        <section 
        id="header"
        style="text-align: center">
            <h1>Сервис Телеметрия</h1>
            <br>
            <h4>Данный сервис предназначен для слежения за барменами и вычисления их КПД</h4>
            <hr style="margin: 10px 0">
        </section>

        <section 
        id="main"
        style="text-align: center">
            <h4>Если вам требуется доступ к просмотру статистики и камер, пожалуйста обратитсь к администратору</h4>
            <br>
            <p>{{showTimestemp}}</p>
        </section>
    </div>
</template>


<script>
import {mapGetters} from 'vuex'
export default {
    name:"Login",
    data: () => ({
    }),
    computed: mapGetters(["showTimestemp"]),
    methods: {},
}
</script>