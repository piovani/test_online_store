export default {
  methods: {
    formatValue(param) {
      return this.placeDot(this.replaceDot(this.decimalPlaces(param)));
    },
    decimalPlaces(value) {
      return String(Number(value).toFixed(2));
    },
    replaceDot(value) {
      return value.replace(/\./g, ",");
    },
    placeDot(value) {
      return value.replace(/(\d)(?=(\d{3})+,)/g, "$1.");
    }
  }
};
