<template>
  <div id="landing-page">
    <section class="container">
      <div class="columns features" 
        :style="$route.name==='LandingPage' ? 'opacity : 1' : 'opacity: 0'"
      >
        <div class="column is-3">
          <div class="card is-shady">
            <div class="card-content">
              <div class="content">
                <span
                  height="200"
                  @click="$router.push({ name: 'Login' })"
                >
                  Submit Product
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="column is-3">
          <div class="card is-shady">
            <div class="card-content">
              <div class="content">
                <span
                  height="200"
                  @click="$router.push({ name: 'Login' })"
                >
                  Approve Product
                </span>
              </div>
            </div>
          </div>
        </div>
        <div
          class="column is-3 modal-button"
          data-target="modal-card"
        >
          <div class="card is-shady">
            <div class="card-content">
              <div class="content">
                <span
                  height="200"
                  @click="$router.push({ name: 'Login' })"
                >
                  Client View
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="columns features">
        <div
          id="router"
          class="column is-12"
        >
          <router-view />
          <button 
            class="button is-link"
            @click="$router.back()"
            v-show="$route.name!=='LandingPage'"
          >
            Back
          </button>
        </div>

      </div>
      <h2 
        v-show="feedback"
        style="
          text-transform: capitalize;
          display: flex;
          justify-content: center;
          font-size: 30px;
        "
      >
        {{ feedback }}
      </h2>
    </section>
  </div>
</template>

<script>
export default {
   name: 'landing-page',
  mounted() {
    // if (this.$router.params && this.$router.params.showMessage) {
    //   this.feedback = this.$router.params.message
    //   setTimeout(() => {
    //     this.feedback = null
    //   }, 8000);
    // }
  },
  watch: {
    '$router.params'(n) {
      debugger
      if (n.showMessage) {
        this.feedback = this.$router.params.message
        setTimeout(() => {
          this.feedback = null
        }, 8000);
      }
    }

  },
  data() {
    return {
      feedback: null,
    }
  },
  methods: {
    // sendToLogin() {
    //   this.$router.push({ name: 'Login' })
    // },
  }
}
</script>

<style>
.content {
  cursor: pointer;
}
</style>