package co.its.cy.api.dashboard;

import java.io.Serializable;

public interface DashboardService {

	Serializable getOverviewSatesChartInfo(String jsonString) throws RuntimeException;
}
