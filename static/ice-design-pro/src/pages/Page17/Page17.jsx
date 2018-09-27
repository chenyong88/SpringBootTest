import React, { Component } from 'react';
import OverviewSatesChart from './components/OverviewSatesChart';
import UserStatChart from './components/UserStatChart';
import UserTrafficStastistics from './components/UserTrafficStastistics';

export default class Page17 extends Component {
  static displayName = 'Page17';

  constructor(props) {
    super(props);
    this.state = {};
  }

  render() {
    return (
      <div className="page17-page">
        <OverviewSatesChart />
        <UserStatChart />
        <UserTrafficStastistics />
      </div>
    );
  }
}
