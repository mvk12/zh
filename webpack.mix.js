const mix = require("laravel-mix");
const webpack = require("webpack");

require("dotenv").config({ path: process.env.ENV_FILE });

let _config = {
  NODE_ENV: JSON.stringify(process.env.NODE_ENV),
};

Object.entries(process.env || {})
  .map(([key, val], idx) => {
    if (key.startsWith("VUE_APP_")) {
      return [String(key).replace("VUE_APP_", ""), val];
    } else {
      return null;
    }
  })
  .filter((v, idx) => {
    return !!v;
  })
  .forEach(([key, val]) => {
    _config[key] = JSON.stringify(val);
  });

mix.webpackConfig({
  resolve: {
    extensions: [".js", ".vue"],
    alias: {
      "@": __dirname + "/resources/js",
    },
  },
  plugins: [
    new webpack.DefinePlugin({
      "process.env": _config,
    }),
  ],
});

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .js("resources/js/app.js", "public/js")
  .vue()
  .sass("resources/scss/app.scss", "public/css", [
    //
  ])
  .extract([
    "axios",
    "date-fns",
    "vue",
    "vue-router",
    "vue-select",
    "vue-toast-notification",
    "vuex",
    "@fortawesome/fontawesome-svg-core",
    "@fortawesome/vue-fontawesome",
    "@fortawesome/free-solid-svg-icons",
  ]);
