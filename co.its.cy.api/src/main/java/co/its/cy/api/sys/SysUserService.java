package co.its.cy.api.sys;

import java.io.Serializable;
/**
 * 
 * @author rj007
 *
 */
public interface SysUserService {
	Serializable login(String jsonString)  throws RuntimeException;
	Serializable save(String jsonString) throws RuntimeException;
	Serializable delete(String jsonString) throws RuntimeException;
	Serializable getById(String jsonString) throws RuntimeException;
}
