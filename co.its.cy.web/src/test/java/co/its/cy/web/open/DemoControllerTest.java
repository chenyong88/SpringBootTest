package co.its.cy.web.open;

import java.net.URL;

import org.junit.Before;
import org.junit.runner.RunWith;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit4.SpringRunner;
@RunWith(SpringRunner.class)
@SpringBootTest(webEnvironment = SpringBootTest.WebEnvironment.RANDOM_PORT)
public class DemoControllerTest  extends BaseControllerTest{
	
 
    private URL base;
    @Before
    public void setUp() throws Exception {
        this.base = new URL("http://localhost:8888/js");
    }

    
    public void getHello() throws Exception {
    	System.out.println("Hello Spring Boot 2.0!");
    }
}