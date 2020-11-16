const firebase = require('firebase')
require('firebase/firestore')

const config = {
  apiKey: "AIzaSyDN4GhSyRLZs_DxviuCLJ8g9fByGSfUWl8",
  authDomain: "whatsappclone-3eaa5.firebaseapp.com",
  databaseURL: "https://whatsappclone-3eaa5.firebaseio.com",
  projectId: "whatsappclone-3eaa5",
  storageBucket: "whatsappclone-3eaa5.appspot.com",
  messagingSenderId: "941806558827",
  appId: "1:941806558827:web:52a6fef13c3c69afa8db2e"
};

debugger
this.$options.firebase = firebase.initializeApp(this._config)