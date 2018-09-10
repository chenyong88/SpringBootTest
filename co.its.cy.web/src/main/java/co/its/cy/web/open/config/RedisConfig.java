package co.its.cy.web.open.config;

import org.springframework.cache.annotation.CachingConfigurerSupport;
import org.springframework.cache.annotation.EnableCaching;
import org.springframework.context.annotation.Configuration;

/*@Configuration
@EnableCaching*/
public class RedisConfig extends CachingConfigurerSupport  {

	// @Bean
/*    public KeyGenerator keyGenerator() {
        return new KeyGenerator() {
            @Override
            public Object generate(Object target, Method method, Object... params) {
                StringBuilder sb = new StringBuilder();
                sb.append(target.getClass().getName());
                sb.append(method.getName());
                for (Object obj : params) {
                    sb.append(obj.toString());
                }
                return sb.toString();
            }
        };
    }*/
	
	/*  *//**
	     * 管理缓存
	     *//*
	    @SuppressWarnings("rawtypes")
		//@Bean
	    public CacheManager cacheManager(RedisTemplate redisTemplate) {
	        RedisCacheManager rcm = new RedisCacheManager(null, null);
	        return rcm;
	    }*/
	   // @SuppressWarnings({ "rawtypes", "unchecked" })
	//	@Bean
	   /* public RedisTemplate<String, String> redisTemplate(RedisConnectionFactory factory) {
	        StringRedisTemplate template = new StringRedisTemplate(factory);
	        Jackson2JsonRedisSerializer jackson2JsonRedisSerializer = new Jackson2JsonRedisSerializer(Object.class);
	        ObjectMapper om = new ObjectMapper();
	        om.setVisibility(PropertyAccessor.ALL, JsonAutoDetect.Visibility.ANY);
	        om.enableDefaultTyping(ObjectMapper.DefaultTyping.NON_FINAL);
	        jackson2JsonRedisSerializer.setObjectMapper(om);
	        template.setValueSerializer(jackson2JsonRedisSerializer);
	        template.afterPropertiesSet();
	        return template;
	    }*/
}
