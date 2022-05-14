<template>
    <div style="padding: 3em;">
        <v-row>
            <video :src="videoUrl" preload style="width:50%" controls>
            </video>
            <div>
                <h2 style="margin-left:2em">Работника не было на месте: {{ (notInPlace/60).toFixed(2) }} минут</h2>
                <h2 style="margin-left:2em">Работник был на 1 месте: {{ (inPlace/60).toFixed(2) }} минут</h2>
            </div>
        </v-row>
    </div>
</template>
<script>
import axios from "axios";

export default{
    name: "Video",
    data: () => ({
        videoUrl: "", 
        notInPlace: 0,
        inPlace: 0,
    }), 
    mounted() {
        axios.post("/api/get-video-link-by-id", {
            id: this.$route.params.id
        }).then(r => {
            this.videoUrl = ".." + r.data;
        });

        axios.post("/api/get-when-not-in-place").then(r => {
            this.notInPlace = r.data;
        })

        axios.post("/api/get-when-in-one-place").then(r => {
            this.inPlace = r.data;
        })
    },
}
</script>