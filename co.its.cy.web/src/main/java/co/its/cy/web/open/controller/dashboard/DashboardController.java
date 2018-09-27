package co.its.cy.web.open.controller.dashboard;

import java.io.Serializable;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;

import com.alibaba.dubbo.config.annotation.Reference;

import co.its.cy.api.dashboard.DashboardService;
import co.its.cy.web.open.common.entity.ApiResult;
import co.its.cy.web.open.common.entity.ApiResultGenerator;

@RestController
@ResponseBody
public class DashboardController {
	@Reference
	private DashboardService dashboardService;

	@RequestMapping("/getDashboardInfo")
	public ApiResult getDashboardInfo(String jsonString) {
		Serializable s=  dashboardService.getOverviewSatesChartInfo(jsonString);
		return  ApiResultGenerator.successRessult(s);
	}
}
