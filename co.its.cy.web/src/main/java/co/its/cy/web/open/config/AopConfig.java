package co.its.cy.web.open.config;

import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.context.annotation.Configuration;
import org.springframework.context.annotation.EnableAspectJAutoProxy;

import co.its.cy.web.open.aop.RequestLimitAop;

@Configuration
@EnableAspectJAutoProxy
@ComponentScan(basePackages= {"co.its.cy.web.open.aop"})
public class AopConfig {

	@Bean
	public RequestLimitAop requestLimitAop() {
		return new RequestLimitAop();
	}
}
