package co.its.cy.service.mail;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.mail.SimpleMailMessage;
import org.springframework.mail.javamail.JavaMailSender;
import org.springframework.stereotype.Service;

import co.its.cy.api.mail.MailService;

@Service
public class MailServiceImpl  implements MailService{
	
	private final Logger _logger =  LoggerFactory.getLogger(this.getClass());
	@Autowired
	private JavaMailSender javaMailSender;
	@Value("${mail.fromMail.addr}")
	private String from;

	@Override
	public void sendSimpleMail(String to, String subject, String content) {
		SimpleMailMessage message =  new  SimpleMailMessage();
		message.setFrom(from);
		message.setTo(to);
		message.setSubject(subject);
		message.setText(content);
		try {
			javaMailSender.send(message);
			_logger.info("[{}]","邮件已经发送给"+to);
		} catch (Exception e) {
			_logger.error("[{}]","邮件发送失败:"+e.getMessage());
		}
	}

}
