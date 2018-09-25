package co.its.cy.web.open.controller.demo;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.kafka.core.KafkaTemplate;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.alibaba.dubbo.config.annotation.Reference;

import co.its.cy.api.demo.DemoService;

@RestController
public class DemoController2 {
	@Reference(version="1.0.0")
	private DemoService demoService;
	@Autowired
	private KafkaTemplate<Object, Object> kafka;
	@RequestMapping("/api1/{jsonString}")
	public String say( String action , String jsonString, HttpServletRequest request, HttpServletResponse response) throws Exception {
		
		kafka.send("log_api2_test", "12306");
		return  jsonString;
	}
}
