package co.its.cy.common.util;

import org.springframework.lang.Nullable;

public abstract class StringUtils  {
  
	public static boolean isEmpty(@Nullable Object str) {
		return (str == null || "".equals(str));
	}
	
}
