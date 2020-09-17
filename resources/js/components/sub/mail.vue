<template>
    <div>
        <div v-if="data === null" class="border-t border-gray-600 text-center p-4">
            There are no messages to display.
        </div>

        <div v-if="data !== null" v-for="mail in data" class="border-t border-gray-600">
            <div class="p-4">
                <div class="flex justify-between">
                    <div class="text-sm">
                        {{ mail.from }}
                    </div>
                    <div class="text-xs text-right">
                        {{ mail.date }}
                    </div>
                </div>
                <p>{{ mail.subject }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "mail",

    props: ['data']
}
</script>

<style scoped>

</style>
