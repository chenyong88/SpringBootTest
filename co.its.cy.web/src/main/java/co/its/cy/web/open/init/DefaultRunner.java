package co.its.cy.web.open.init;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.boot.CommandLineRunner;
import org.springframework.core.annotation.Order;
import org.springframework.stereotype.Component;

@Component
@Order(1) //启动顺序
public class DefaultRunner implements CommandLineRunner {

	private Logger _logger = LoggerFactory.getLogger(this.getClass());
	@Override
	public void run(String... args) throws Exception {
		_logger.info("init data ............");
	}

}
