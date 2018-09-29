import React, { Component } from 'react';
import TreeTable from './components/TreeTable';
import FilterBar from './components/FilterBar';
export default class System extends Component {
  static displayName = 'System';

  constructor(props) {
    super(props);
    this.state = {};
  }

  render() {
    return (
      <div className="system-page">
        <FilterBar />
        <TreeTable />
      </div>
    );
  }
}
