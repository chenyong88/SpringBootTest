package co.its.cy.web.open.config;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.config.annotation.CorsRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurationSupport;

@Configuration
public class CorsConfigurer  extends WebMvcConfigurationSupport  {
	private Logger _logger =  LoggerFactory.getLogger(this.getClass());
 @Override
public void addCorsMappings(CorsRegistry registry) {
    _logger.error("[{}]",this.getClass()  +"CorsConfigurer is  init.....");
	 registry.addMapping("/**")
		     .allowedOrigins("*")
		     .allowedMethods("GET", "POST", "PUT", "OPTIONS", "DELETE", "PATCH")
		     .allowCredentials(true).maxAge(3600);
}
}
