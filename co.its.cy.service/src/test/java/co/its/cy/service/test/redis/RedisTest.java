package co.its.cy.service.test.redis;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.stereotype.Component;
import org.springframework.test.context.junit4.SpringRunner;

import co.its.cy.api.demo.DemoService;

@SpringBootTest
@RunWith(SpringRunner.class)
@Component
public class RedisTest {
	
	@Autowired
	private DemoService demoService;
	@Test
	public void test() {
		for (int i = 0; i < 5; i++) {
			System.out.println(demoService.say("线路偏移"));
			
		}
		
	}
}
