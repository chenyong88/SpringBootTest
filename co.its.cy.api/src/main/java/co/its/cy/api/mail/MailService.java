package co.its.cy.api.mail;

public interface MailService {
	void sendSimpleMail(String to, String subject, String content);
}
