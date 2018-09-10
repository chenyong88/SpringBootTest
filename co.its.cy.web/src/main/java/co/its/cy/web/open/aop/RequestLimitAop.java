package co.its.cy.web.open.aop;

import java.util.concurrent.TimeUnit;

import javax.servlet.http.HttpServletRequest;

import org.aspectj.lang.JoinPoint;
import org.aspectj.lang.annotation.Aspect;
import org.aspectj.lang.annotation.Before;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.redis.core.RedisTemplate;
import org.springframework.web.context.request.RequestContextHolder;
import org.springframework.web.context.request.ServletRequestAttributes;

import com.alibaba.dubbo.common.logger.Logger;
import com.alibaba.dubbo.common.logger.LoggerFactory;

import co.its.cy.web.open.annotation.RequestLimitAnnotation;
import co.its.cy.web.open.exception.RequestLimitException;
import co.its.cy.web.open.util.WebSocketUtil;

@Aspect
public class RequestLimitAop {

	private static final Logger logger = LoggerFactory.getLogger(RequestLimitAop.class);
	@SuppressWarnings("rawtypes")
	@Autowired
	private RedisTemplate redisTemplate;
	
	@Before("within(co.its.cy.web.open.controller.demo..*) && @annotation(limit)")
	public void requestLimit(JoinPoint joinPoint, RequestLimitAnnotation limit) throws RequestLimitException {
		try {
			Object []args = joinPoint.getArgs();
			HttpServletRequest request = ((ServletRequestAttributes) RequestContextHolder.currentRequestAttributes()).getRequest();
            String ip = WebSocketUtil.getIpAdderss(request);
			String url = request.getRequestURL().toString();
            String key = "req_limit_".concat(url).concat("_").concat(ip);
            boolean checkResult = checkWithRedis(limit, key);
            if (!checkResult) {
                logger.debug(String.format("requestLimited," + "[用户ip:{}],[访问地址:{}]超过了限定的次数[{}]次", ip, url, limit.count()));
                throw new RequestLimitException("10001",String.format("requestLimited," + "[用户ip:{}],[访问地址:{}]超过了限定的次数[{}]次", ip, url, limit.count()));
            }
		} catch (Exception e) {
			throw e;
		}
	}

	@SuppressWarnings("unchecked")
	private boolean checkWithRedis(RequestLimitAnnotation limit, String key) {
		long count = redisTemplate.opsForValue().increment(key, 1);
		if (count == 1) {
            redisTemplate.expire(key, limit.time(), TimeUnit.MILLISECONDS);
        }
        if (count > limit.count()) {
            return false;
        }
        return true;
	}


}
