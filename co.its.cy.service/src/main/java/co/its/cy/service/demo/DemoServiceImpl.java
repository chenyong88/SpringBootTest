package co.its.cy.service.demo;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.autoconfigure.security.SecurityProperties.User;

import com.alibaba.dubbo.config.annotation.Service;

import co.its.cy.annotation.RedisCacheAnotation;
import co.its.cy.api.demo.DemoService;
import co.its.cy.repository.AlarmTypRerepository;

@Service
public class DemoServiceImpl  implements DemoService{
	@Autowired
	private AlarmTypRerepository alarmTypRerepository;
	@RedisCacheAnotation(type = User.class)
	public String say(String arg0) {
		return alarmTypRerepository.findByGroupName(arg0).toString();
	}

}
