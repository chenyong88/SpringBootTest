import axios from 'axios';

export async function login(params) {
  return axios({
    url: 'http://127.0.0.1:8080/js/login',
    method: 'post',
    data: qs.stringify(params),
  });
}

export async function postUserRegister(params) {
  return axios({
    url: '/api/register',
    method: 'post',
    data: params,
  });
}

export async function postUserLogout() {
  return axios({
    url: '/api/logout',
    method: 'post',
  });
}

export async function getUserProfile() {
  return axios('/api/profile');
}

export default {
  postUserRegister,
  postUserLogout,
  getUserProfile,
};
