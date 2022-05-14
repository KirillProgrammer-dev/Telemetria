<template>
    <div style="padding: 3em">
        <v-row>
            <video
                :src="videoUrl"
                preload
                style="width: 50%"
                controls
                type="video/mp4"
            >
                <object
                    type="application/x-shockwave-flash"
                    width="360"
                    height="240"
                    data="player.swf?file=movie.mp4"
                >
                    <param name="movie" value="player.swf?file=movie.mp4" />
                    <a href="movie.mp4">Download the movie</a>
                </object>
            </video>
            <div>
                <h2 style="margin-left: 2em">
                    Работника не было на месте:
                    {{ (notInPlace / 60).toFixed(2) }} минут
                </h2>
                <h2 style="margin-left: 2em">
                    Работник был на 1 месте:
                    {{ (inPlace / 60).toFixed(2) }} минут
                </h2>
            </div>
        </v-row>
        <div :style="'width:' + videoWidth + ';margin-top: 1em;'" id="timeline">
            <div
                v-for="section in sections[0]"
                class="timeline-section"
                :style="
                    'background-color:' +
                    (section[0] == 'work' ? 'blue;' : 'red;') +
                    'height:200px;width:' +
                    (section[1] / sections[1]) * 100 +
                    '%;'
                "
            ></div>
        </div>
        <v-row style="margin-top:1em;">
            <div style="background-color: blue;width:1em;height:1em;"></div><span>- человек работал</span>
        </v-row>
        <v-row>
            <div style="background-color: red;width:1em;height:1em;"></div><span>- человека не было на месте</span>
        </v-row>
    </div>
</template>
<script>
import axios from "axios";
import { VueHorizontalTimeline } from "vue-horizontal-timeline";

export default {
    name: "Video",
    data: () => ({
        videoUrl: "",
        notInPlace: 0,
        inPlace: 0,
        videoWidth: 0,
        sections: [],
    }),
    mounted() {
        this.videoWidth = document.getElementsByTagName("video")[0].style.width;
        axios.post("/api/get-sections").then((r) => {
            this.sections = r.data;
        });
        let array_start = localStorage.getItem("videoStart").split(":");
        let array_end = localStorage.getItem("videoEnd").split(":");
        let start_sec = Number(array_start[0]*60*60) + Number(array_start[1]*60) + Number(array_start[2]);
        let end_sec = Number(array_end[0]*60*60) + Number(array_end[1]*60) + Number(array_end[2]);
        let interval = end_sec - start_sec;
        axios
            .post("/api/get-video-link-by-id", {
                id: this.$route.params.id,
                start: localStorage.getItem("videoStart"),
                interval: interval,
            })
            .then((r) => {
                this.videoUrl = ".." + r.data;
            });

        axios.post("/api/get-when-not-in-place").then((r) => {
            this.notInPlace = r.data;
        });

        axios.post("/api/get-when-in-one-place").then((r) => {
            this.inPlace = r.data;
        });
    },
    components: {
        VueHorizontalTimeline,
    },
};
</script>
<style>
.timeline-section {
    height: 11em !important;
    width: 1em;
}
#timeline {
    display: flex;
    flex-direction: row;
}
</style>
