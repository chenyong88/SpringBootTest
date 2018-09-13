package co.its.cy.web.open.common.entity;

import java.io.Serializable;

import lombok.Data;

@Data
public class ApiResult   implements Serializable{
	private static final long serialVersionUID = 5094946651862615155L;
	private ApiResult() {}
	public  static  ApiResult newInstance() {
		return new ApiResult();
	}
	private String msg;
	private boolean flag = false;
	private Object result;
	private String jumpUrl;
	private int rows;
	private long time;
}
