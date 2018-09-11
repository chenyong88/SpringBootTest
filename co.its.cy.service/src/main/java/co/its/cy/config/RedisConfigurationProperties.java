package co.its.cy.config;

import java.util.ArrayList;
import java.util.List;

/**
 * 
 * @author rj007
 *
 */
public class RedisConfigurationProperties {
	   private List<String> nodes = new ArrayList<>();
	    public List<String> getNodes() {
	        return nodes;
	    }
	    public void setNodes(List<String> nodes) {
	        this.nodes = nodes;
	    }

}
