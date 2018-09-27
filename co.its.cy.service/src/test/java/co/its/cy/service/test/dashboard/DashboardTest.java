package co.its.cy.service.test.dashboard;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit4.SpringRunner;

import co.its.cy.api.dashboard.DashboardService;

@SpringBootTest
@RunWith(SpringRunner.class)
public class DashboardTest {

	@Autowired
	private DashboardService dashboardService;
	@Test
	public void testGetOverviewSatesChartInfo() {
		System.out.println(dashboardService.getOverviewSatesChartInfo(""));
		
	}
}
