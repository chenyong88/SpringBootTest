package co.its.cy.service.test.sys;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit4.SpringRunner;

import co.its.cy.api.sys.SysUserService;

@SpringBootTest
@RunWith(SpringRunner.class)
public class SysUserServiceTest {
	@Autowired
	private SysUserService service;
	
	@Test
	public void test() {
		System.out.println("获取用户信息");
		System.out.println(service.getById(""));
	}
}
