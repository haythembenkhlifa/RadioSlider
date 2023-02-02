<template>
    <PanelItem :index="index" :field="field" />
</template>

<script>
export default {
    props: ["index", "resource", "resourceName", "resourceId", "field"],
    mounted() {
        this.field.value = this.findByValue();
    },
    
  methods: {
    /*
     * Find element by value.
     */
    findByValue() {
        const keys = Object.keys(this.field.values);
        const values = Object.values(this.field.values);
        const indexOfValue = values.findIndex(item => item == this.field.value+'' );
        return keys[indexOfValue];
    },
  }

};
</script>
