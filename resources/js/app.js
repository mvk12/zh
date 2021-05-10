import './bootstrap';


import Vue from "vue";
import router from "./router";
import { store } from "./store";
import App from "./App.vue";

import vSelect from "vue-select";
import VueToast from "vue-toast-notification";

import "./icons";

Vue.component("v-select", vSelect);

Vue.use(VueToast, {
  position: "top-right"
});

console.log(
  "%c[" + new Date().toUTCString() + "]\nNoktos",
  "font-weight: bold; padding: 5px; font-size: 1.1em; background-color: #14b5e1; color: white;"
);
console.log(
  "%cEnviroment: " + process.env.NODE_ENV,
  "font-weight: bold; background-color: blue; color: white; padding: 5px"
);

if (process.env.NODE_ENV != "production") {
  console.group("> Enviroment variables");
  console.table(process.env);
  console.groupEnd();
}

const app = new Vue({
  el: "#app",
  store,
  router,
  render: h => h(App)
});
