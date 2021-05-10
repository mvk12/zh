import axios from "axios";
import { store } from "@/store";

export const fetchUserData = () =>
  axios({
    url: process.env.API_URL + `/api/user`,
    method: "GET",
    headers: {
      Accept: "application/json",
      Authorization: `Bearer ${store.state.token}`
    }
  })
    .then(({ data }) => Promise.resolve(data))
    .catch(err => Promise.reject(err));

export const isOnline = () => {
  return axios({
    url: process.env.API_URL + `/api/common/online`,
    method: "GET",
    headers: {
      Accept: "application/json",
      Authorization: `Bearer ${store.state.token}`
    }
  });
};
