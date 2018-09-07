package co.its.cy.service.demo;

import com.alibaba.dubbo.config.annotation.Service;

import co.its.cy.api.demo.DemoService;

@Service
public class DemoServiceImpl  implements DemoService{

	public String say(String arg0) {
		
		return arg0;
	}

}
