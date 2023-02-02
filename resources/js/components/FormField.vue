<template>
  <DefaultField
    :field="field"
    :errors="errors"
    :show-help-text="showHelpText"
    :full-width-content="fullWidthContent"
  >
    <template #field>
      <div class="flex flex-col sm:flex-row sm:flex-wrap justify-between gap-y-6 ">
          <div v-for="(value, key) in this.field.values" :key="key" class="flex">
              <input
              :id="this.field.uuid+key"
              :name="field.name"
              type="radio"
              @input="handleChange"
              :value="value"
              class="h-5 w-5 border-gray-300 focus:ring-2 focus:ring-blue-300"
              :class="errorClasses"
              :checked="this.value !== '' && this.value == value || this.field.initialValue === value"
              >
              <label :for="this.field.uuid+key" class="whitespace-nowrap text-sm font-medium text-gray-900 ml-2 block text-black dark:text-white">
              {{ key }}
              </label>
          </div>
      </div>
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
