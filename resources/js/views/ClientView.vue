<template>
  <div id="client-view">
    <h2>Full list submission</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody v-if="list && list.length > 0">
        <tr  
          v-for="(product) in list"
          :key="product.id"
        >
          <td>
            {{ product.name }}
          </td>
          <td>
            {{ product.description }}
          </td>
          <td>
            {{ product.price }}
          </td>
          <td>
            <img
              v-if="product.image && product.image.indexOf('base64') > -1"
              :src="product.image" 
              alt="product image"
              style="width: 100px;"
             >
          </td>
        </tr>
      </tbody>
    </table>
    <h4 v-if="list.length === 0">Empty list</h4>
  </div>
</template>

<script>
export default {
  name: "approve-submission",
  mounted() {
    fetch("http://localhost:8000/api/all-products", {
      method: "get",
      mode: "cors",
      headers: new Headers({
        Accept: "application/json",
        "Content-Type": "application/json",
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log("data", data)
        this.list = data.list
      })
      .catch((error) => console.log(error))
  },
  data() {
    return {
      list: [],
    }
  },
}
</script>