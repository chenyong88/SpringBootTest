package co.its.cy.web.open.controller;

import java.lang.reflect.Method;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.alibaba.dubbo.config.annotation.Reference;

import co.its.cy.api.demo.DemoService;

@RestController
public class DemoController {
	@Reference
	private DemoService demoService;
	@RequestMapping("/api")
	public String say( String action , String jsonString, HttpServletRequest request, HttpServletResponse response) {
		System.out.println(action);
		System.out.println(action.split("."));
		String methodName = action.split(".")[1];
		Method [] methods =  demoService.getClass().getMethods();
		Class class1 = action.split(".")[0].getClass();
		System.out.println(methodName);
		
		return   demoService.say(action);
	}
}
