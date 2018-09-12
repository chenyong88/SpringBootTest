package co.its.cy.service.demo;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.cache.annotation.Cacheable;

import com.alibaba.dubbo.config.annotation.Service;
import com.alibaba.fastjson.JSONObject;

import co.its.cy.api.demo.DemoService;
import co.its.cy.entity.AlarmType;
import co.its.cy.repository.AlarmTypRerepository;

@Service(version= "1.0.0", interfaceClass = DemoService.class)
public class DemoServiceImpl  implements DemoService{
	@Autowired
	private AlarmTypRerepository alarmTypRerepository;
	
	@Cacheable(value="AlarmType")
	public String say(String arg0) {
		AlarmType alarmType = alarmTypRerepository.findByGroupName(arg0);
		return JSONObject.toJSONString(alarmType);
	}

}
