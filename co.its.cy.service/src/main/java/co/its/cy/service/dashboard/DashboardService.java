package co.its.cy.service.dashboard;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;

import com.alibaba.dubbo.config.annotation.Service;

import co.its.cy.entity.dto.OverviewSatesChartDTO;
@Service
public class DashboardService  implements co.its.cy.api.dashboard.DashboardService{
	@Override
	public Serializable getOverviewSatesChartInfo(String jsonString) throws RuntimeException {
		List<OverviewSatesChartDTO> list =  new  ArrayList<OverviewSatesChartDTO>();
		list.add(new  OverviewSatesChartDTO("页面预览",1203,"12%",true,"#fff","#4FD4A4","#1BC98E"));
		list.add(new  OverviewSatesChartDTO("下载次数",770,"16%",false,"#fff","#EB6C7A","#E64758"));
		list.add(new  OverviewSatesChartDTO("月活跃用户",3203,"20%",true,"#fff","#B29FFF","#9F85FF"));
		list.add(new  OverviewSatesChartDTO("日活跃用户",203,"14%",false,"#fff","#E9E063","#E5D936"));
		return (Serializable) list;
	}

}
