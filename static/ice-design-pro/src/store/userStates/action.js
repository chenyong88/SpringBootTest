/*
 *
 * profile actions
 *
 */
import { getUserStatesInfo} from '../../api';
  import {
  USER_STATES_REQUEST,
  USER_STATES_FAILURE,
  USER_STATES_SUCCESS,
} from './constants';

const userStatesRequest = () => {
  return {
    type: USER_STATES_REQUEST,
    isLoading: true,
  };
};

const userStatesSuccess = (payload) => {
  return {
    type: USER_STATES_SUCCESS,
    isLoading: false,
    payload,
  };
};

const userStatesFailure = (payload) => {
  return {
    type: USER_STATES_FAILURE,
    isLoading: false,
    payload,
  };
};

export const userStates = (params) => {
  return async (dispatch) => {
    dispatch(userStatesRequest());
    try {
      const response = await getUserStatesInfo(params);

      dispatch(userStatesSuccess(response.data));
    } catch (error) {
      dispatch(userStatesFailure(error));
    }
  };
};
