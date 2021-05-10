import { oauthToken } from "@/services/common/login";
import { fetchUserData } from "@/services/common/user";

import { setValueOnLocalStorage, removeKeyFromLocalStorage } from "@/utils";

export default {
  namespaced: true,
  state: {
    loading: false,
    isLoggedIn: false,
    token: localStorage.getItem("nk_zh_token") || null,
    refreshToken: localStorage.getItem("nk_zh_refresh_token") || null,
    errorMsg: null,
    user: JSON.parse(localStorage.getItem("nk_zh_user") || "{}")
  },
  mutations: {
    auth_request: state => {
      state.loading = true;
      state.errorMsg = null;
      state.token = null;
    },
    auth_ok: (state, { access_token, refresh_token }) => {
      setValueOnLocalStorage("nk_zh_token", access_token);
      setValueOnLocalStorage("nk_zh_refresh_token", refresh_token);

      state.token = access_token;
      state.refreshToken = refresh_token;
      state.isLoggedIn = true;
    },
    auth_error: (state, { errorMsg }) => {
      removeKeyFromLocalStorage("token");

      state.errorMsg = errorMsg;
    },
    auth_complete: state => {
      state.loading = false;
    },
    logout: state => {
      removeKeyFromLocalStorage("nk_zh_token");
      removeKeyFromLocalStorage("nk_zh_refresh_token");
      removeKeyFromLocalStorage("nk_zh_user");

      state.loading = false;
      state.errorMsg = null;
      state.token = null;
      state.refreshToken = null;
      state.isLoggenIn = false;
    },
    user_data: (state, user) => {
      setValueOnLocalStorage("nk_zh_user", JSON.stringify({ ...user }));

      state.user = Object.assign({}, state.user, user);
    }
  },
  actions: {
    login: ({ commit }, payload) => {
      commit("auth_request");

      let formData = new FormData();
      Object.keys(payload).forEach(key => {
        formData.append(key, payload[key]);
      });

      return oauthToken(formData)
        .then(data => {
          const { access_token, refresh_token } = data;

          commit("auth_ok", {
            access_token,
            refresh_token
          });

          return fetchUserData();
        })
        .then(data => {
          commit("user_data", { ...data });

          return Promise.resolve({ status: true });
        })
        .catch(err => {
          console.log(err);

          commit("auth_error", {
            errorMsg: "Ocurrió un error inesperado"
          });

          return Promise.reject({ status: false });
        })
        .finally(() => {
          commit("auth_complete");
        });
    },
    logout: ({ commit }) => {
      commit("logout");
    }
  }
};
