<template>
    <div class="w-full bg-gray-700 rounded">
        <heading title="SketchNI" url="https://mail.sketchni.uk:2096/"/>
        <mail :data="data"/>
    </div>
</template>

<script>
import Mail from "./sub/mail";
import Heading from './sub/heading';

export default {
    name: "SketchNI",

    props: ['cdata'],

    components: {
        Mail,
        Heading
    },

    created() {
        console.debug(`Loading: Component ${this.$options.name} loaded.`);

        if (this.cdata) {
            this.data = JSON.parse(this.cdata);
        }

        window.Echo.private(`App.Models.User.${window.user.id}`)
            .listen('.sketchni', res => {
                this.data = res;
            });
    },

    data() {
        return {
            data: null,
        }
    },

    methods: {},
};
</script>
