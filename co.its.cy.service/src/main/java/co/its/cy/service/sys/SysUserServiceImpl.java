package co.its.cy.service.sys;

import java.io.Serializable;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;

import com.alibaba.dubbo.common.utils.StringUtils;
import com.alibaba.dubbo.config.annotation.Service;

import co.its.cy.api.sys.SysUserService;
import co.its.cy.entity.sys.SysUser;
import co.its.cy.repository.SysUserRepository;

@Service
public class SysUserServiceImpl implements SysUserService{

	@Autowired
	private SysUserRepository sysUserRepository;
	
	@Override
	public Serializable save(String jsonString) throws RuntimeException {
		
		return null;
	}

	@Override
	public Serializable delete(String jsonString) throws RuntimeException {
		return null;
	}

	@Override
	public Serializable getById(String jsonString) throws RuntimeException {
		Optional<SysUser> sysUser = sysUserRepository.findById(38);
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
