package co.its.cy.web.open.interceptor;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.web.servlet.HandlerInterceptor;

/**
 * 拦截器
 * @author rj007
 *
 */
public class SessionInterceptor implements HandlerInterceptor {
	private Logger _logger =  LoggerFactory.getLogger(this.getClass());
	@Override
	public boolean preHandle(HttpServletRequest request, HttpServletResponse response, Object handler)
			throws Exception {
		_logger.info("[{}]","sessionInterceptor  ..");
		return HandlerInterceptor.super.preHandle(request, response, handler);
	}

}
