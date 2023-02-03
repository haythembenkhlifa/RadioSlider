<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
      <form class="flex flex-col list justify-between" 
           style="grid-row-gap: 1.5rem; row-gap: 1.5rem;" :id="this.field.uuid">
            <div v-for="(value, key) in this.field.values" :key="key" class="flex">
              <input
              :id="this.field.uuid+key"
              :name="field.name"
              type="radio"
              @input="handleChange"
              :value="value"
              class="h-5 w-5 border-gray-300 focus:ring-2 focus:ring-blue-300 bg-green-500"
              :class="errorClasses"
              :checked="this.value !== '' && this.value == value || this.field.initialValue === value"
              >
              <label :for="this.field.uuid+key" class="whitespace-nowrap text-sm font-medium text-gray-900 ml-2 block text-black dark:text-white">
              {{ key }}
              </label>
            </div>
          </form>
    </template>
  </DefaultField>
</template>

<script>
import { FormField, HandlesValidationErrors } from "laravel-nova";

export default {
  mixins: [FormField, HandlesValidationErrors],

  props: ["resourceName", "resourceId", "field"],

  data() {
    return {
      label: "",
    };
  },

  methods: {
    /*
     * Set the initial, internal value for the field.
     */
    setInitialValue() {
      if (this.field.value == null && this.field.initialValue !== undefined) {
        this.value = this.field.initialValue;
      } else {
        this.value = this.field.value || "";
      }
    },

    /**
     * Fill the given FormData object with the field's internal value.
     */
    fill(formData) {
      formData.append(this.field.attribute, this.value || "");
    },
  }
};
</script>
<style scoped>

/* Medium devices (landscape tablets, 768px and less) */
@media only screen and (min-width: 640px) {
  .list{
    flex-direction: row;
    flex-wrap: wrap;
  }
}
</style>