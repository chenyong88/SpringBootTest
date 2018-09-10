package co.its.cy.web.open;

import java.util.LinkedHashSet;

import com.xiaoleilu.hutool.util.NetUtil;

public class HutoolMethodTest {
	public static void main(String[] args) {
		LinkedHashSet<String> ips =  NetUtil.localIpv4s();
		System.out.println(ips);
		
	}
	
}
