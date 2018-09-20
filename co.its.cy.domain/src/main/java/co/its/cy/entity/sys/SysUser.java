package co.its.cy.entity.sys;

import java.io.Serializable;
import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Table;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;

@Data
@NoArgsConstructor
@AllArgsConstructor
@Entity
@Table(name="SysUser")
public class SysUser  implements Serializable{
	private static final long serialVersionUID = 1L;
	@Id
	@GeneratedValue
	private Integer id;
	
	@Column
	private Integer parentUserID;
	@Column
	private String userCode;
	@Column
	private String userName;
	@Column
	private String password;
	@Column
	private String phone;
	@Column
	private Boolean active;
	@Column
	private Integer roleID;
	@Column
	private Integer clientID;
	@Column
	private Short userType;
	@Column
	private Integer loginNum;
	@Column
	private Date lastLoginTime;
	@Column
	private String memo;
	@Column
	private String modifyMan;
	@Column
	private Date modifyTime;
	@Column
	private String phoneMac;

} 
