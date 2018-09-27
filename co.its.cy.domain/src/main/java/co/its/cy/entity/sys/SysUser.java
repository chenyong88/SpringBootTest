package co.its.cy.entity.sys;

import java.util.Date;

import javax.persistence.Entity;

import co.its.cy.entity.base.BaseEntity;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.EqualsAndHashCode;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
@Entity
@EqualsAndHashCode(callSuper=false)
public class SysUser extends BaseEntity{
	private static final long serialVersionUID = 1L;
	
	private Integer parentUserID;
	private String userCode;
	private String userName;
	private String password;
	private String phone;
	private Boolean active;
	private Integer clientID;
	private Short userType;
	private Integer loginNum;
	private Date lastLoginTime;
	private String memo;
	private String modifyMan;
	private Date modifyTime;
	private String phoneMac;

} 
