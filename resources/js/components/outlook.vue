<template>
    <div class="w-full bg-gray-700 rounded">
        <heading title="Outlook" url="https://outlook.live.com/" />
        <mail :data="data" />
    </div>
</template>

<script>
import Mail from "./sub/mail";
import Heading from './sub/heading';

export default {
    name: "Outlook",

    components: {
        Mail,
        Heading
    },

    created() {
        console.debug(`Loading: Component ${this.$options.name} loaded.`);

        window.Echo.private(`App.Models.User.${window.user.id}`)
            .listen('.outlook', res => {
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
