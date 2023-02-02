<template>
    <span>{{ fieldValue }}</span>
</template>

<script>
export default {
    props: ["resourceName", "field"],

    computed: {
        fieldValue() {
            return this.findByValue();
        },
    },
    methods: {
        /*
        * Find element by value.
        */
        findByValue() {
            const keys = Object.keys(this.field.values);
            const values = Object.values(this.field.values);
            const indexOfValue = values.findIndex(item => item == this.field.value+'' );
            return keys[indexOfValue] !== undefined ?  keys[indexOfValue] : '--';
        },
    }

};
</script>
