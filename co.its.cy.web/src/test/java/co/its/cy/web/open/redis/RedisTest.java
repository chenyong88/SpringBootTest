package co.its.cy.web.open.redis;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.stereotype.Component;
import org.springframework.test.context.junit4.SpringRunner;

import co.its.cy.web.open.core.redis.RedisTemplate;

@SpringBootTest
@RunWith(SpringRunner.class)
@Component
public class RedisTest {

	@Autowired
	private RedisTemplate<Object,Object> redisTemplate;
	@Test
	public void test() {
		redisTemplate.opsForValue().set("cy2222", null);
		redisTemplate.opsForValue().set("c111y", 12200);
		System.out.println(redisTemplate.opsForValue().get("c111y"));
		
	}
}
