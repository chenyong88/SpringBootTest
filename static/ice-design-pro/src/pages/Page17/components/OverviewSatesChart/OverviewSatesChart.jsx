import React, { Component } from 'react';
import { Grid, Icon } from '@icedesign/base';
import IceContainer from '@icedesign/container';
import ColumnChart from './ColumnChart';
import injectReducer from '../../../../utils/injectReducer';
import dashBoardReducer from '../../../../store/dashboard/reducer';
import { dashBoard } from '../../../../store/dashboard/action';
import { connect } from 'react-redux';
import { compose } from 'redux';
const { Row, Col } = Grid;


var mockData = [];
 class OverviewSatesChart extends Component {
  static displayName = 'OverviewSatesChart';
  constructor(props) {
    super(props);
  }
  componentDidMount() {
    this.props.dashBoard();
  }
  render() {
    const dashBoardData = this.props.dashBoardData;
    
    if(Array.isArray(dashBoardData)){
        mockData = dashBoardData;
    }

    return (
      <IceContainer>
        <Row wrap gutter={20}>
          {mockData.map((item, index) => {
            return (
              <Col xxs="24" l="6" key={index}>
                <div style={{ ...styles.content, background: item.background }}>
                  <div
                    style={{
                      ...styles.summary,
                      border: `1px solid ${item.borderColor}`,
                    }}
                  >
                    <p style={styles.title}>{item.title}</p>
                    <div style={styles.data}>
                      <h2 style={styles.amount}>{item.amount}</h2>
                      <div style={styles.percent}>
                        {item.percent}{' '}
                        <Icon
                          type={`arrow-${
                            item.increase ? 'up' : 'down'
                          }-filling`}
                          size="xs"
                          style={styles.arrowIcon}
                        />
                      </div>
                    </div>
                  </div>
                  <ColumnChart color="#fff" />
                </div>
              </Col>
            );
          })}
        </Row>
      </IceContainer>
    );
  
  
  }
}

const mapDispatchToProps = {
  dashBoard
};
const mapStateToProps = (state) => {
  return state;
};
const withConnect = connect(
  mapStateToProps,
  mapDispatchToProps
);
const withDataBoardReducer = injectReducer({
  key: 'dashBoardData',
  reducer: dashBoardReducer,
});
export default compose(
  withDataBoardReducer,
  withConnect
)(OverviewSatesChart);


const styles = {
  content: {
    color: '#fff',
  },
  summary: {
    padding: '20px',
  },
  title: {
    margin: '0 0 10px 0',
  },
  data: {
    display: 'flex',
    margin: '10px 0',
  },
  amount: {
    margin: '0 15px 0 0',
    fontSize: '28px',
  },
  percent: {
    display: 'flex',
    alignItems: 'flex-end',
    marginBottom: '4px',
    fontSize: '12px',
  },
  arrowIcon: {
    marginLeft: '8px',
  },
};
