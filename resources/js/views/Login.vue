<template>
  <div id="login-component">
    <h2>Login</h2>
    <form>
      <div class="field">
        <div class="control">
          <div class="field">
            <div class="control">
              <div class="select is-primary">
                <select v-model="form.role">
                  <option value="standard">Select dropdown</option>
                  <option value="submit">Submit Product</option>
                  <option value="approve">Approve Product</option>
                  <option value="client">Client View Product</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button
        class="button is-block is-primary is-fullwidth is-medium"
        @click.prevent="login()"
      >
        Login
      </button>
      <br />
      <small><em>Choose your login type</em></small>
    </form>
  </div>
</template>

<script>
export default {
  name: "login-component",
  data() {
    return {
      destination: "",
      form: {
        user:'',
        role: 'standard',
      }
    }
  },
  methods: {
    login() {
      
      fetch("http://localhost:8000/api/login", {
        method: "post",
        mode: "cors",
        headers: new Headers({
          Accept: "application/json",
          "Content-Type": "application/json",
        }),
        body: JSON.stringify(this.form),
      })
        .then((response) => response.json())
        .then((data) => {
          
          console.log('data', data)
          if (data.success) {
            // submit - SubmitProduct
            // approve - ApproveSubmission
            // client - ClientView
            switch(this.form.role) {
              case 'submit':
                this.destination = 'SubmitProduct'
                break
              case 'approve':
                this.destination = 'ApproveSubmission'
                break
              case 'client':
                this.destination = 'ClientView'
                break

              default: break;
            }
            this.$router.push({name: this.destination})
          }

        })
        .catch((error) => console.log(error))
    },
  },
}
</script>