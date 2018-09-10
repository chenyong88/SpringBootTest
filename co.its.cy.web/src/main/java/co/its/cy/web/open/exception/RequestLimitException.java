package co.its.cy.web.open.exception;

import lombok.Data;
import lombok.EqualsAndHashCode;

@Data
@EqualsAndHashCode(callSuper=false)
public class RequestLimitException  extends RuntimeException{
	private static final long serialVersionUID = 1L;
	private String errCode;
	private String errMsg;
	
   public  RequestLimitException(String errCode,String errMsg){
    	 this.errCode = errCode;
    	 this.errMsg = errMsg;
     }
   
   
}
