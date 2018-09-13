package co.its.cy.service.test.mail;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.test.context.SpringBootTest;
import org.springframework.test.context.junit4.SpringRunner;

import co.its.cy.api.mail.MailService;

@RunWith(SpringRunner.class)
@SpringBootTest
public class MailTest {
	 @Autowired
     private MailService mailService;
	
	 @Test
	 public void testSimpleMail()  throws Exception{
		 for (int i = 0; i < 100; i++) {
			 mailService.sendSimpleMail("2212118829@qq.com", "我是你大爷", "不用谢我"+i);
		}
		
	 }
	
}
