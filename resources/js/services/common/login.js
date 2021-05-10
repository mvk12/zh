import axios from "axios";

export const oauthToken = formData =>
  axios({
    url: process.env.API_URL + "/oauth/token",
    method: "POST",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/x-www-form-urlencoded"
    },
    data: formData
  })
    .then(res => Promise.resolve(res.data))
    .catch(err => Promise.reject(err));
