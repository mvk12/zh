import Vue from "vue";
import VueRouter from "vue-router";
import { store } from "../store";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: () =>
      import(/* webpackChunkName: "home" */ "@/pages/Home/index.vue"),
    meta: {
      requiresAuth: false
    }
  },
];

const router = new VueRouter({ mode: "history", routes });

export default router;
