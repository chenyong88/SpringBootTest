package co.its.cy.api.redis;

import java.util.Map;
import java.util.concurrent.TimeUnit;

public interface JedisService {

	 boolean exists(String key);
	 String set(String key,String value,int seconds);
	 String getSet(String key,String value, int seconds);
	 String get(String key);
	 Long geoadd(String key,double longitude,double latitude,byte[] obj);
	// List<GeoRadiusResponse> georadius(String key,double longitude,double latitude);
	 void delKey(String key);
	 void delNativeKey(String key);
	 Map<String ,Object> getMapData(String key);
	 boolean lock(String key,int seconds);
	 void unlock(String key);   
	 String getLocakValue(String key);
	 long increment(String key , long minitus);
	 void expire(String key ,long milliSeconds, TimeUnit timeUnit);
}
