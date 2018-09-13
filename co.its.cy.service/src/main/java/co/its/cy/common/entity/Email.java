package co.its.cy.common.entity;

import java.io.Serializable;
import java.util.HashMap;

import lombok.Data;

@Data
public class Email  implements Serializable{
	private static final long serialVersionUID = 6250961910586120911L;
	private String email;//接收方邮件
	private String subject;//主题
    private String content;//邮件内容
    
    private String template;//模板
    private HashMap<String, String> kvMap;// 自定义参数
    

}
