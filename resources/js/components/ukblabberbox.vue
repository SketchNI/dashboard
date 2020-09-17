<template>
    <div class="w-full bg-gray-700 rounded">
        <heading title="UKBlabberbox" url="https://mail.ukblabberbox.co.uk:2096/"/>
        <mail :data="data"/>
    </div>
</template>

<script>
import Mail from "./sub/mail";
import Heading from './sub/heading';

export default {
    name: "UKBlabberbox",

    components: {
        Mail,
        Heading
    },

    created() {
        console.debug(`Loading: Component ${this.$options.name} loaded.`);

        window.Echo.private(`App.Models.User.${window.user.id}`)
            .listen('.ukblabberbox', res => {
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

