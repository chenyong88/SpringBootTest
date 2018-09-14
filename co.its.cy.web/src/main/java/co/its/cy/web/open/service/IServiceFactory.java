package co.its.cy.web.open.service;

public interface IServiceFactory {
	public Object 	getService	(String serviceName)						throws RuntimeException;
	public boolean 	exists		(String serviceName, String methodName)		throws RuntimeException;
}
