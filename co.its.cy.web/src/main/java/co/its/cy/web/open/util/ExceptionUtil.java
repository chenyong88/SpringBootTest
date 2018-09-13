package co.its.cy.web.open.util;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.io.PrintStream;

/**
 * 异常处理工具
 * @author rj007
 *
 */
public class ExceptionUtil {
	/**
	 * 获取异常详细信息
	 * @param e
	 * @return
	 */
	public static String getDetailExceptionInfo(Exception e) {
		String ret = "";
        try {
    		ByteArrayOutputStream out = new ByteArrayOutputStream();  
            PrintStream pout = new PrintStream(out);  
            e.printStackTrace(pout);  
            ret = new String(out.toByteArray());  
            pout.close();  
			out.close();
		} catch (IOException e1) {
			e1.printStackTrace();
		}  
        return ret;
	}
	
	/**
	 * 
	 * @param e
	 * @return
	 */
	public static String  getClassExceptionInfo(Exception e) {
		StackTraceElement [] stackTraceElement  = e.getStackTrace();
		for (int i = 0; i < stackTraceElement.length; i++) {
			stackTraceElement[i].getClassName();
		}
		return null;
	}
}
