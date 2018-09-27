/*
 *
 * profile actions
 *
 */

import {
  USER_PROFILE_REQUEST,
  USER_PROFILE_FAILURE,
  USER_PROFILE_SUCCESS,
} from './constants';
import { getDashboardInfo} from '../../api';

const dashBoardRequest = () => {
  return {
    type: USER_PROFILE_REQUEST,
    isLoading: true,
  };
};

const dashBoardSuccess = (payload) => {
  return {
    type: USER_PROFILE_FAILURE,
    isLoading: false,
    payload,
  };
};

constdashBoardFailure = (payload) => {
  return {
    type: USER_PROFILE_SUCCESS,
    isLoading: false,
    payload,
  };
};

export const dashBoard = (params) => {
  return async (dispatch) => {
    dispatch(dashBoardRequest());
    try {
      const response = await getDashboardInfo(params);

      dispatch(dashBoardSuccess(response.data));
    } catch (error) {
      dispatch(dashBoardFailure(error));
    }
  };
};
