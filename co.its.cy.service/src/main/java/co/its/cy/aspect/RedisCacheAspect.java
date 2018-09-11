package co.its.cy.aspect;

import java.lang.reflect.Method;

import org.aspectj.lang.ProceedingJoinPoint;
import org.aspectj.lang.Signature;
import org.aspectj.lang.annotation.Around;
import org.aspectj.lang.annotation.Pointcut;
import org.aspectj.lang.reflect.MethodSignature;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

import com.alibaba.dubbo.common.json.JSON;
import com.alibaba.dubbo.config.annotation.Reference;

import co.its.cy.annotation.RedisCacheAnotation;
import co.its.cy.api.redis.JedisService;

public class RedisCacheAspect {
	private Logger logger = LoggerFactory.getLogger(this.getClass());
	
	@Reference
    private JedisService jedisService;
	@Pointcut("execution(public * co.its.cy.service..*.*(..))")
    public void webAspect(){}
	@SuppressWarnings({ "unused", "unchecked", "rawtypes" })
	@Around("webAspect()")
    public Object redisCache(ProceedingJoinPoint pjp) throws Throwable {
		  String redisResult = "";
		 String className = pjp.getTarget().getClass().getName();
		 String methodName = pjp.getSignature().getName();
		 Object[] args = pjp.getArgs();
		 String key = genKey(className,methodName,args);
		 logger.info("生成的key[{}]",key);
		 Signature signature = pjp.getSignature();
	     if(!(signature instanceof MethodSignature)){
	            throw  new IllegalArgumentException();
	      }
	     MethodSignature methodSignature = (MethodSignature) signature;
	        Method method = pjp.getTarget().getClass().getMethod(methodSignature.getName(),methodSignature.getParameterTypes());
	        //得到被代理的方法上的注解
	        Class modelType = method.getAnnotation(RedisCacheAnotation.class).type();
	        int cacheTime = method.getAnnotation(RedisCacheAnotation.class).cacheTime();
	        Object result = null;
	        if(!jedisService.exists(key)) {
	            logger.info("缓存未命中");
	            //缓存不存在，则调用原方法，并将结果放入缓存中
	            result = pjp.proceed(args);
	            redisResult = JSON.json(result);
	            jedisService.set(key,redisResult,cacheTime);
	        } else{
	            //缓存命中
	            logger.info("缓存命中");
	            redisResult = jedisService.get(key);
	            //得到被代理方法的返回值类型
	            Class returnType = method.getReturnType();
	            result = JSON.parse(redisResult, returnType);
	        }
	        return result;
	}
	private String genKey(String className, String methodName, Object[] args) {
		 StringBuilder sb = new StringBuilder("sb:");
	        sb.append(className);
	        sb.append("_");
	        sb.append(methodName);
	        sb.append("_");
	        for (Object object: args) {
	            logger.info("obj:"+object);
	            if(object!=null) {
	                sb.append(object+"");
	                sb.append("_");
	            }
	        }
	        return sb.toString();
	}
	
}
