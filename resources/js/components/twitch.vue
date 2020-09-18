<template>
    <div class="w-full bg-purple-900 rounded">
        <heading title="Twitch" />
        <div class="flex items-center">
            <div class="bg-purple-800 w-1/6 p-4 rounded m-2 text-center" v-for="stream in data">
                <img :src="`https://static-cdn.jtvnw.net/previews-ttv/live_user_${stream.user_name.toLowerCase()}-272x160.jpg`"
                     :alt="`${stream.user_name}s Stream Thumbnail`">
                <span class="font-semibold">{{ stream.user_name }}</span> &middot;
                <svg class="twimg inline" width="20px" height="20px" version="1.1" viewBox="0 0 20 20" x="0px" y="0px"><g><path fill-rule="evenodd" d="M5 7a5 5 0 116.192 4.857A2 2 0 0013 13h1a3 3 0 013 3v2h-2v-2a1 1 0 00-1-1h-1a3.99 3.99 0 01-3-1.354A3.99 3.99 0 017 15H6a1 1 0 00-1 1v2H3v-2a3 3 0 013-3h1a2 2 0 001.808-1.143A5.002 5.002 0 015 7zm5 3a3 3 0 110-6 3 3 0 010 6z" clip-rule="evenodd"></path></g></svg>
                <span class="font-semibold">{{ stream.viewer_count }}</span>
                &middot;
                <a :href="`https://twitch.tv/${stream.user_name}`" target="_blank"
                   class="no-underline text-gray-200 mx-1 twitch hover:text-gray-300 hover:underline">
                    View
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import Heading from "./sub/heading";

export default {
    name: "Twitch",

    props: ['cdata'],

    components: {
        Heading
    },

    created() {
        console.debug(`Loading: Component ${this.$options.name} loaded.`);

        if (this.cdata) {
            this.data = JSON.parse(this.cdata);
        }

        window.Echo.private(`App.Models.User.${window.user.id}`)
            .listen('.twitch', res => {
                this.data = res;
            });
    },

    data() {
        return {
            data: null,
        }
    },

    methods: {

    },
};
</script>

<style scoped>
.twimg {
    fill: #e95c5c;
}

.twitch {
    width: 270px;
}

.twitch img {
    width: 270px !important;
}

</style>
