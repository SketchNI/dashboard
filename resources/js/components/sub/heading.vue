<template>
    <div class="flex justify-between items-center mx-4 my-3">
        <div class="text-2xl font-semibold text-gray-300" v-text="title"></div>
        <a v-if="url" :href="url" target="_blank" class="btn">View</a>
    </div>
</template>

<script>
export default {
    name: "heading",

    props: ['title', 'url', 'classes']
}
</script>

<style scoped>
.btn {
    @apply bg-gray-600 border border-gray-600 text-gray-100 px-4 py-2 rounded-lg font-semibold ease-in-out transition duration-150;
}

.btn:hover {
    @apply bg-gray-700 border-gray-800 shadow;
}

.btn:active,
.btn:focus {
    @apply bg-gray-800 text-gray-400 border-gray-800 shadow outline-none;
}
</style>
