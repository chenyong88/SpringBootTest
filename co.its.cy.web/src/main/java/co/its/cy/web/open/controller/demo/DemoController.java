package co.its.cy.web.open.controller.demo;

import java.lang.reflect.Method;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.alibaba.dubbo.config.annotation.Reference;

import co.its.cy.api.demo.DemoService;
import co.its.cy.web.open.annotation.RequestLimitAnnotation;

@RestController
public class DemoController {
	@Reference(version="1.0.0")
	private DemoService demoService;
	@RequestMapping("/api")
	@RequestLimitAnnotation(count = 3)
	public String say( String action , String jsonString, HttpServletRequest request, HttpServletResponse response) {
<<<<<<< HEAD
		
		
=======
>>>>>>> branch 'master' of https://github.com/985890777/SpringBootTest.git
		Method [] method = demoService.getClass().getMethods();
		for (int i = 0; i < method.length; i++) {
			System.out.println(method[i].getName());
		} 
		
		
		return   demoService.say(action);
	}
}
