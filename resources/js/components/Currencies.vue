<template>
<div>
    {{currencies}}
</div>
</template>

<script>
export default {
    name: "Currencies",
    data() {
        return {
            currencies: []
        }
    },
    mounted() {
        axios
            .get('/api/json')
            .then(({data}) => (this.currencies = data))
    }
}
</script>

<style scoped>

</style>
