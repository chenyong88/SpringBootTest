package co.its.cy.service.sys;

import java.io.Serializable;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;

import com.alibaba.dubbo.common.utils.StringUtils;
import com.alibaba.dubbo.config.annotation.Service;
import com.alibaba.fastjson.JSON;
import com.alibaba.fastjson.JSONObject;

import co.its.cy.api.sys.SysUserService;
import co.its.cy.core.exception.ServiceException;
import co.its.cy.entity.sys.SysUser;
import co.its.cy.repository.SysUserRepository;
import co.its.cy.service.base.BaseService;

@Service
public class SysUserServiceImpl  extends BaseService  implements SysUserService {
	private final SysUserRepository sysUserRepository;
	@Autowired
	public SysUserServiceImpl(SysUserRepository sysUserRepository) {
		this.sysUserRepository = sysUserRepository;
	}
	
	@Override
	public Serializable save(String jsonString) throws RuntimeException {
		SysUser sysUser = JSON.parseObject(jsonString, SysUser.class);
		SysUser s =  sysUserRepository.save(sysUser);
		return s;
	}

	@Override
	public Serializable delete(String jsonString) throws RuntimeException {
		JSONObject  jsonObject =this.parseObject(jsonString, JSONObject.class);
		if(org.springframework.util.StringUtils.isEmpty(jsonObject.get("id"))) {
			throw new ServiceException("id can not be null");
		}
		sysUserRepository.deleteById(jsonObject.getInteger("id"));
		return true;
	}

	@Override
	public Serializable getById(String jsonString) throws RuntimeException {
		JSONObject jsonObject =  this.parseObject(jsonString);
		if(org.springframework.util.StringUtils.isEmpty(jsonObject.get("ID"))) {
			throw  new  ServiceException("id can not be null");
		}
		Optional<SysUser> sysUser = sysUserRepository.findById(jsonObject.getInteger("ID"));
		return sysUser.get();
	}

	@Override
	public Serializable login(String jsonString) throws RuntimeException {
		SysUser sysUser = com.alibaba.fastjson.JSON.parseObject(jsonString, SysUser.class);
		if(StringUtils.isEmpty(sysUser.getUserName())) {
			
		}
		SysUser s = sysUserRepository.findByUserName(sysUser.getUserName());
		
		return s;
	}

}
