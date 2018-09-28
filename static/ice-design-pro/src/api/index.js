import axios from 'axios';

export async function login(params) {
  return axios({
    url: '/api/login',
    method: 'post',
    data: params,
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

export async function getDashboardInfo(){
  return axios({
    url: '/getDashboardInfo',
    method: 'get',
  });
}
export async function getUserStatesInfo(){
  return axios({
    url: '/getUserStatesInfo',
    method: 'get'
  });
}

export async function getUserProfile() {
  return axios('/api/profile');
}



export default {
  postUserRegister,
  postUserLogout,
  getDashboardInfo,
  getUserStatesInfo,
  getUserProfile,
};
