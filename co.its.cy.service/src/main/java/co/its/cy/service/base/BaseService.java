package co.its.cy.service.base;

import org.springframework.util.StringUtils;

import com.alibaba.fastjson.JSONObject;

import co.its.cy.core.exception.ServiceException;

public class BaseService {
   
	protected JSONObject parseObject(String jsonString) {
		if(StringUtils.isEmpty(jsonString)) {
			throw new ServiceException("jsonString is null");
		}
		return  JSONObject.parseObject(jsonString);
	}
	
	protected  <T> T parseObject(String text, Class<T> clazz) {
		if(StringUtils.isEmpty(text)) {
			throw new ServiceException("jsonString is null");
		}
		if(null == clazz) {
			throw new ServiceException("clazz is null");
		}
		 return JSONObject.parseObject(text, clazz);
	}
	
	
}
