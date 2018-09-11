package co.its.cy.web.open.config.redis;

import java.util.ArrayList;
import java.util.List;

/**
 * 
 * @author rj007
 *
 */
//@Configuration
//@ConfigurationProperties(prefix = "spring.redis.cluster")
public class RedisConfigurationProperties {
	   private List<String> nodes = new ArrayList<>();
	    public List<String> getNodes() {
	        return nodes;
	    }
	    public void setNodes(List<String> nodes) {
	        this.nodes = nodes;
	    }

}
