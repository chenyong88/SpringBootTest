import React, { Component } from 'react';
import { Chart, Geom, Axis, Tooltip, Legend, Coord, Label } from 'bizcharts';
import { Grid } from '@icedesign/base';
import IceContainer from '@icedesign/container';

const { Row, Col } = Grid;

export default class UserStatChart extends Component {
  static displayName = 'UserStatChart';
  static propTypes = {};
  static defaultProps = {};
  constructor(props) {
    super(props);
    this.state = {};
  }

  render() {
    return (
      <div className="user-stat-chart">
        <Row wrap gutter="20">
          <Col xxs="24" s="15" l="15">
            <IceContainer title="用户增长数量">
              <Chart
                height={350}
                data={userData}
                forceFit
                padding={[40, 40, 40, 40]}
              >
                <Axis name="month" />
                <Axis name="count" />
                <Tooltip crosshairs={{ type: 'y' }} />
                <Geom type="interval" position="month*count" />
              </Chart>
            </IceContainer>
          </Col>
          <Col xxs="24" s="9" l="9">
            <IceContainer title="年龄">
              <Chart
                height={124}
                data={ageData}
                forceFit
                padding={[0, 0, 0, 0]}
              >
                <Axis name="count" />
                <Tooltip crosshairs={{ type: 'y' }} />
                <Geom type="interval" position="age*count" />
              </Chart>
            </IceContainer>

            <IceContainer title="男女比例">
              <Chart
                height={124}
                data={sexRatio}
                forceFit
                padding={[0, 60, 0, 0]}
              >
                <Coord type="theta" radius={0.75} />
                <Axis name="percent" />
                <Legend position="right" offsetY={-44} offsetX={-40} />
                <Tooltip showTitle={false} />
                <Geom
                  type="intervalStack"
                  position="percent"
                  color="item"
                  tooltip={[
                    'item*percent',
                    (item, percent) => {
                      percent += '%';
                      return {
                        name: item,
                        value: percent,
                      };
                    },
                  ]}
                  style={{ lineWidth: 1, stroke: '#fff' }}
                >
                  <Label
                    content="percent"
                    offset={-20}
                    textStyle={{
                      rotate: 0,
                      textAlign: 'center',
                      shadowBlur: 2,
                      shadowColor: 'rgba(0, 0, 0, .45)',
                    }}
                  />
                </Geom>
              </Chart>
            </IceContainer>
          </Col>
        </Row>
      </div>
    );
  }
}

const sexRatio = [
 
];

const userData = [
 
];
const ageData = [
 
];
