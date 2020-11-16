<template>
  <div id="product-submission">
    <form>
      <div class="field">
        <div class="control">
          <input
            class="input is-medium"
            type="text"
            placeholder="Product name"
            v-model="product.name"
          >
        </div>
      </div>

      <div class="field">
        <div class="control">
          <input
            class="input is-medium"
            type="text"
            placeholder="Description"
            v-model="product.description"
          >
        </div>
      </div>

      <div class="field">
        <div class="control">
          <input
            class="input is-medium"
            type="number"
            placeholder="Price"
            v-model="product.price"
            step="any"
          >
        </div>
      </div>

      <div class="field">
        <div class="control">

          <img
            v-show="product && product.image && product.image.indexOf('base64') > -1"
            :src="product.image"
            alt="product image"
            style="max-width: 200px;"
          />

          <label for="product-image-input">
            Click to input the Product Image
          </label>
          <input
            id="product-image-input"
            style="display: none;"
            type="file"
            accept="image/*"
            label="Product Image"
            ref="input"
            @change="onLoad($event)"
          />
        </div>
      </div>

      <button
        class="button is-block is-primary is-fullwidth is-medium"
        @click.prevent="submit()"
      >
        Submit
      </button>
      <br />
      <small><em>Product Register.</em></small>
    </form>
  </div>
</template>

<script>
export default {
  name: "product-submission",
  watch: {},
  data: () => ({
    valid: false,
    showImage: false,
    product: {
      name: "",
      description: "",
      price: 0,
      image: "",
    },
  }),
  methods: {
    onLoad(event) {
      const { files } = event.target,
        fileName = files[0].name,
        fileReader = new FileReader()
      if (fileName.lastIndexOf(".") <= 0) {
        // eslint-disable-next-line no-alert
        return alert("Por favor adicione um arquivo válido")
      }

      fileReader.addEventListener("load", () => {
        this.product.image = fileReader.result
      })
      fileReader.readAsDataURL(files[0])
    },
    submit() {
      debugger
      fetch("http://localhost:8000/api/submit-product", {
        method: "post",
        mode: "cors",
        headers: new Headers({
          Accept: "application/json",
          "Content-Type": "application/json",
        }),
        body: JSON.stringify({product: this.product}),
      })
        .then((response) => response.json())
        .then((data) => {
          
          console.log('data', data)
          if (data.success) {
            this.$router.push({
              name: 'LandingPage', 
              params: {
                showMessage: true, 
                message:'Product registered'
              }
            })
          }

        })
        .catch((error) => console.log(error))
    },
  },
}
</script>