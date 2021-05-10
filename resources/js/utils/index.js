export const setValueOnLocalStorage = (key, value) => {
  window.localStorage.setItem(key, value);
};

export const removeKeyFromLocalStorage = key => {
  window.localStorage.removeItem(key);
};
