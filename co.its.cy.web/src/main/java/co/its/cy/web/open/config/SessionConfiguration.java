package co.its.cy.web.open.config;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.config.annotation.InterceptorRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;

import co.its.cy.web.open.interceptor.SessionInterceptor;
/**
 * SessionConfiguration
 * @author rj007
 *
 */
@Configuration
public class SessionConfiguration  implements WebMvcConfigurer{
	private Logger _logger =  LoggerFactory.getLogger(this.getClass());
	@Override
	public void addInterceptors(InterceptorRegistry registry) {
		_logger.info("[{}]",this.getClass()  +"sessionConfiguration is  init.....");
		registry.addInterceptor(new SessionInterceptor()).addPathPatterns("/**");
	}
	
}
