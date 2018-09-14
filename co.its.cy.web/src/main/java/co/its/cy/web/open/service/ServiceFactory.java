package co.its.cy.web.open.service;

import org.springframework.stereotype.Component;

import com.alibaba.dubbo.config.annotation.Reference;

import co.its.cy.api.demo.DemoService;
import co.its.cy.web.open.core.Reflect;
import lombok.Data;

@Component
@Data
public class ServiceFactory  implements IServiceFactory{
	@Override
	public Object getService(String serviceName) throws RuntimeException {
		return Reflect.newInstance().getFieldValueByName(serviceName, this);
	}

	@Override
	public boolean exists(String serviceName, String methodName) throws RuntimeException {
		return Reflect.newInstance().exists(this, serviceName, methodName);
	}
	
	@Reference(version="1.0.0")
	private DemoService demoService;
	

}
