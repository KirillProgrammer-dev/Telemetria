import Vue from 'vue'
import Vuex from 'vuex';
import timestemps from './modules/RoomTimesteps'

 Vue.use(Vuex)


// const store = new Vuex.Store({
//     state:{
//         startTime: "",
//         endTime: "",
//     },
//     mutations: {
//         Settiem(state, v1, v2){
//             state.startTime = v1
//             state.endTime = v2
//         }
//     }
// })
// export default store 

export default new Vuex.Store({
    modules: { 
        timestemps
    }
})