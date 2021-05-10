import Vue from "vue";
import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon as Fai } from "@fortawesome/vue-fontawesome";
import {
  faAngleDown,
  faExclamationTriangle,
  faSpinner,
  faTimes
} from "@fortawesome/free-solid-svg-icons";

library.add(faAngleDown, faExclamationTriangle, faSpinner, faTimes);

Vue.component("fai", Fai);
