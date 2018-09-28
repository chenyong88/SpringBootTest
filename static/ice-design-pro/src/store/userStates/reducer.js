/*
 *
 *dashboardreducer
 *
 */

import {
  USER_STATES_REQUEST,
  USER_STATES_FAILURE,
  USER_STATES_SUCCESS,
} from './constants';

// The initial state
const initialState = {};

function userStatesReducer(state = initialState, action) {
  switch (action.type) {
    case USER_STATES_REQUEST:
      return Object.assign({}, state, {
        isLoading: action.isLoading,
      });
    case USER_STATES_FAILURE:
      return Object.assign({}, state, {
        isLoading: action.isLoading,
        ...action.payload,
      });
    case USER_STATES_SUCCESS:
      return action.payload;
    default:
      return state;
  }
}

export default userStatesReducer;
