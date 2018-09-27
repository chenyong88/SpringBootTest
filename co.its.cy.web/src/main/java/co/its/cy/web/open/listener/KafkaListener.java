package co.its.cy.web.open.listener;

import org.springframework.stereotype.Component;

public class KafkaListener {

	@org.springframework.kafka.annotation.KafkaListener(topics="log_api2_test")
	public void cunsumer(String message) {
		System.out.println("log_api2_test:"+message);
	}
}
