package co.its.cy.web.open.controller.sys;

import java.io.Serializable;
import java.util.Date;

import javax.servlet.http.HttpServletRequest;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.redis.core.StringRedisTemplate;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.bind.annotation.RestController;

import com.alibaba.dubbo.config.annotation.Reference;
import com.xiaoleilu.hutool.date.DateUtil;
import com.xiaoleilu.hutool.json.JSONObject;
import com.xiaoleilu.hutool.json.JSONUtil;

import co.its.cy.api.sys.SysUserService;
import co.its.cy.web.open.common.entity.ApiResult;
import co.its.cy.web.open.common.entity.ApiResultGenerator;
import co.its.cy.web.open.core.redis.RedisTemplate;

@RestController
@ResponseBody
public class SysUserController {
    @Autowired
	private RedisTemplate<Object, Object> redisTemplate;
    
    @Reference
    private SysUserService sysUserService;
    
    StringRedisTemplate a;
	
	@RequestMapping(value="/login")
	public ApiResult login(String action,String jsonString,HttpServletRequest request) {
		Serializable user =  sysUserService.login(jsonString);
		JSONObject jsonObject = JSONUtil.parseObj(user);
		Boolean flag = redisTemplate.opsForValue().setBit("login:"+ DateUtil.formatDate(new Date()),jsonObject.getLong("id") , true);
		
		System.out.println(redisTemplate.opsForValue().getBit(("login:"+ DateUtil.formatDate(new Date())), jsonObject.getLong("id")));
		
		if(flag) {
			return ApiResultGenerator.successRessult(flag);
		}
		return ApiResultGenerator.result(true, "登陆失败", "", "", 0, null);
	}
	
}
