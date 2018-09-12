package co.its.cy.web.open.controller.demo;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.alibaba.dubbo.config.annotation.Reference;

import co.its.cy.api.demo.DemoService;
import co.its.cy.web.open.annotation.RequestLimitAnnotation;

@RestController
public class DemoController {
	@Reference
	private DemoService demoService;
	@RequestMapping("/api")
	@RequestLimitAnnotation(count = 3)
	public String say( String action , String jsonString, HttpServletRequest request, HttpServletResponse response) {
		return   demoService.say(action);
	}
}