package co.its.cy.entity;

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
@Table(name="sysuser")
public class SysUser  implements Serializable{
	private static final long serialVersionUID = 1L;
	@Id
	@GeneratedValue
	private Integer id;
	
	@Column(name="parentuserid")
	private Integer parentUserID;
	@Column(name="usercode")
	private String userCode;
	@Column(name="username")
	private String userName;
	@Column(name="password")
	private String password;
	@Column(name="phone")
	private String phone;
	@Column(name="active")
	private Boolean active;
	@Column(name="roleid")
	private Integer roleID;
	@Column(name="clientid")
	private Integer clientID;
	@Column(name="usertype")
	private Short userType;
	@Column(name="loginnum")
	private Integer loginNum;
	@Column(name="lastlogintime")
	private Date lastLoginTime;
	@Column(name="memo")
	private String memo;
	@Column(name="modifyman")
	private String modifyMan;
	@Column(name="modifytime")
	private Date modifyTime;
	@Column(name="phonemac")
	private String phoneMac;

} 
