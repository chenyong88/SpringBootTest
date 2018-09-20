package co.its.cy.web.open.redis;

import java.util.Date;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.data.redis.connection.RedisConnection;
import org.springframework.data.redis.connection.RedisStringCommands;
import org.springframework.data.redis.serializer.RedisSerializer;
import org.springframework.stereotype.Component;
import org.springframework.test.context.junit4.SpringRunner;

import com.xiaoleilu.hutool.date.DateUtil;

import co.its.cy.web.open.core.redis.RedisTemplate;

@SpringBootTest
@RunWith(SpringRunner.class)
@Component
public class RedisTest {

	@Autowired
	private RedisTemplate<Object,Object> redisTemplate;
	
	@Test
	public void test() {
		RedisConnection redisConnection  =  redisTemplate.getConnectionFactory().getConnection();
		
		byte[] rawKey = rawKey("login:"+DateUtil.formatDate(new Date()));
		byte[] rawKey1 = rawKey("login:"+"2018-09-19");
		byte[] res = rawKey("rawKey");
		
		redisTemplate.opsForValue().set("cy2222", null);
		redisTemplate.opsForValue().set("c111y", 12200);
		for (int i = 0; i < 10; i++) {
			if(i%2 == 0) {
				redisTemplate.getConnectionFactory().getConnection().setBit(rawKey, i, true);
				redisConnection.setBit(rawKey1, i, false);
			}else {
				redisTemplate.getConnectionFactory().getConnection().setBit(rawKey, i, false);
				redisConnection.setBit(rawKey1, i, true);
			}
		}
		System.out.println("aaa:"+redisTemplate.getConnectionFactory().getConnection().bitCount(rawKey));
		System.out.println("ddd"+redisTemplate.getConnectionFactory().getConnection().bitCount(rawKey1));
		System.out.println("bbb:"+redisTemplate.getConnectionFactory().getConnection().bitOp(RedisStringCommands.BitOperation.AND, res, rawKey,rawKey1));
		
		System.out.println("ccc:"+redisConnection.bitCount(res));
		
	}
	byte[] rawKey(Object key) {

		if (keySerializer() == null && key instanceof byte[]) {
			return (byte[]) key;
		}
		return keySerializer().serialize(key);
	}
	RedisSerializer keySerializer() {
		return redisTemplate.getKeySerializer();
	}

}
