<template>
  <div id="approve-submission">
    <h2>Approve submission</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Approval Status</th>
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
            <input
              :id="product.id"
              type="checkbox"
              v-model="product.approved"
              @change="toggleProductApproval(product)"
            >
            {{product.approved ? 'Approved' : 'Not-approved'}}
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
  methods: {
    toggleProductApproval(product) {
      fetch("http://localhost:8000/api/set-product-approval-status", {
      method: "post",
      mode: "cors",
      headers: new Headers({
        Accept: "application/json",
        "Content-Type": "application/json",
      }),
      body: JSON.stringify({
        productId: product.id,
        status: product.approved,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log("data", data)
        // this.list = data.list
      })
      .catch((error) => console.log(error))
    }
  }
}
</script>