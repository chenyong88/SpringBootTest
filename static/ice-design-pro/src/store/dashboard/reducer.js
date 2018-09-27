/*
 *
 *dashboardreducer
 *
 */

import {
  DASH_BOARD_REQUEST,
  DASH_BOARD_FAILURE,
  DASH_BOARD_SUCCESS,
} from './constants';

// The initial state
const initialState = {};

function dashBoardReducer(state = initialState, action) {
  switch (action.type) {
    case DASH_BOARD_REQUEST:
      return Object.assign({}, state, {
        isLoading: action.isLoading,
      });
    case DASH_BOARD_FAILURE:
      return Object.assign({}, state, {
        isLoading: action.isLoading,
        ...action.payload,
      });
    case DASH_BOARD_SUCCESS:
      return Object.assign({}, state, {
        isLoading: action.isLoading,
      });
    default:
      return state;
  }
}

export default dashBoardReducer;
