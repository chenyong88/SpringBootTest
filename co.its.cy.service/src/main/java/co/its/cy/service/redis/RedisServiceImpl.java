package co.its.cy.service.redis;

import java.util.Map;
import java.util.concurrent.TimeUnit;

import org.springframework.beans.factory.annotation.Autowired;

import com.alibaba.dubbo.config.annotation.Service;

import co.its.cy.api.redis.JedisService;
import redis.clients.jedis.JedisCluster;

@Service
public class RedisServiceImpl  implements JedisService{

	@Autowired
    private JedisCluster jedisCluster;
	@Override
	public boolean exists(String key) {
		boolean flag = false;
        flag = jedisCluster.exists(key);
        return flag;
	}

	@Override
	public String set(String key, String value, int seconds) {
		String responseResult = jedisCluster.set(key,value);
        if(seconds!=0)
            jedisCluster.expire(key,seconds);
        return responseResult;
	}

	@Override
	public String getSet(String key, String value, int seconds) {
		String jedisClusterSet = jedisCluster.getSet(key, value);
        jedisCluster.expire(key,seconds);
        return jedisClusterSet;
	}

	@Override
	public String get(String key) {
		String str = jedisCluster.get(key);
        return str;
	}

	@Override
	public Long geoadd(String key, double longitude, double latitude, byte[] obj) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public void delKey(String key) {
		 jedisCluster.del(key);
		
	}

	@Override
	public void delNativeKey(String key) {
		 jedisCluster.del(key);
	}

	@Override
	public Map<String, Object> getMapData(String key) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public boolean lock(String key, int seconds) {
		if(jedisCluster.incr(key)==1) {
            jedisCluster.expire(key,seconds);
            return false;
        }
        return true;
	}

	@Override
	public void unlock(String key) {
		 jedisCluster.del(key);
	}

	@Override
	public String getLocakValue(String key) {
		 return jedisCluster.get(key);
	}

	@Override
	public long increment(String key, long minitus) {
		return jedisCluster.incrBy(key, minitus);
	}

	@Override
	public void expire(String key, long milliSeconds, TimeUnit timeUnit) {
		
	}

}
