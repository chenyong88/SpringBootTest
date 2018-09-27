/*
 *
 * profile actions
 *
 */
import { getDashboardInfo} from '../../api';
  import {
  DASH_BOARD_REQUEST,
  DASH_BOARD_FAILURE,
  DASH_BOARD_SUCCESS,
} from './constants';

const dashBoardRequest = () => {
  return {
    type: DASH_BOARD_REQUEST,
    isLoading: true,
  };
};

const dashBoardSuccess = (payload) => {
  return {
    type: DASH_BOARD_SUCCESS,
    isLoading: false,
    payload,
  };
};

const dashBoardFailure = (payload) => {
  return {
    type: DASH_BOARD_FAILURE,
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
