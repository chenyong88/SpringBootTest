package co.its.cy.web.open.controller.sys;

import java.io.Serializable;

import javax.servlet.http.HttpServletRequest;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.redis.core.RedisTemplate;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;

import com.alibaba.dubbo.config.annotation.Reference;

import co.its.cy.api.sys.SysUserService;
import co.its.cy.web.open.common.entity.ApiResult;
import co.its.cy.web.open.common.entity.ApiResultGenerator;

@RestController
@ResponseBody
public class SysUserController {
    @Autowired
	private RedisTemplate<Object, Object> redisTemplate;
    
    @Reference
    private SysUserService sysUserService;
	
	@RequestMapping(value="/login")
	public ApiResult login(String action,String jsonString,HttpServletRequest request) {
		Serializable user =  sysUserService.login(jsonString);
	/*	Boolean flag = redisTemplate.opsForValue().setBit("login"+ DateUtil.formatDate(new Date()),jsonObject.getLong("id") , true);
		if(flag) {
			ApiResultGenerator.successRessult(flag);
		}*/
		return ApiResultGenerator.result(true, "登陆失败", "", "", 0, null);
	}
	
}
