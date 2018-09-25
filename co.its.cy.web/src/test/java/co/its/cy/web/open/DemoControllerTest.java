package co.its.cy.web.open;

import java.net.URL;

import org.junit.Before;
import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit4.SpringRunner;

import com.xiaoleilu.hutool.http.HttpUtil;
@RunWith(SpringRunner.class)
@SpringBootTest(webEnvironment = SpringBootTest.WebEnvironment.RANDOM_PORT)
public class DemoControllerTest  extends BaseControllerTest{
	
 
    private URL base;
    @Before
    public void setUp() throws Exception {
        this.base = new URL("http://localhost:8080/js");
    }

    
    @Test
    public void getHello() throws Exception {
       String result = 	HttpUtil.get(base+"/api1/123");
       System.out.println(result);
    	
    }
}