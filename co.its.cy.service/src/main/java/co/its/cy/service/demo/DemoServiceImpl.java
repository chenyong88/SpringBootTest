package co.its.cy.service.demo;

import org.springframework.boot.autoconfigure.security.SecurityProperties.User;

import com.alibaba.dubbo.config.annotation.Service;

import co.its.cy.annotation.RedisCacheAnotation;
import co.its.cy.api.demo.DemoService;

@Service
public class DemoServiceImpl  implements DemoService{
	@RedisCacheAnotation(type = User.class)
	public String say(String arg0) {
		return arg0;
	}

}
