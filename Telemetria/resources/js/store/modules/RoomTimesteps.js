export default {
    state: {
        time: []
    },
    actions: {
        saveTimestemp(ctx, t1){
            const new_time = [t1[0], t1[1]]
            ctx.commit('updateTimestemp', new_time)
        }
    },
    mutations: {
        updateTimestemp(state, new_time){
            state.time = new_time
        },
        saveTimestemp(state, arr) {
            state.time = arr
        }
    },
    getters: {
        showTimestemp(state){
            return state.time;
        }
    },
}