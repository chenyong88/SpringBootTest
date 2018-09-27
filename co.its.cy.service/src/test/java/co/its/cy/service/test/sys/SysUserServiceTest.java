package co.its.cy.service.test.sys;

import java.io.Serializable;
import java.util.HashMap;
import java.util.Map;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit4.SpringRunner;

import com.alibaba.fastjson.JSONObject;

import co.its.cy.api.sys.SysUserService;

@SpringBootTest
@RunWith(SpringRunner.class)
public class SysUserServiceTest {
	@Autowired
	private SysUserService service;
	@Test
	public void test() {
		Map<Object, Object> map  =  new  HashMap<>();
		//map.put("ID", 1);
		System.out.println(service.getById(JSONObject.toJSONString(map)));
	}
	//@Test
	public void testSave() {
		Map<Object, Object> map  =  new  HashMap<>();
		map.put("active", true);
		map.put("username", "cy");
		map.put("usercode", "000001");
		map.put("usertype", "0");
		map.put("password", "123456");
		Serializable serializable =  service.save(JSONObject.toJSONString(map));
		System.out.println(serializable);
		
	}
	
	
}
