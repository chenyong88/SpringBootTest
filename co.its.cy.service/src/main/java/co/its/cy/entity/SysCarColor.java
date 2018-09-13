package co.its.cy.entity;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Table;

import lombok.Data;


@Data
@Entity
@Table
public class SysCarColor  implements Serializable{
	private static final long serialVersionUID = -5218076739283020378L;
	
	@Id
	@GeneratedValue
	private Integer id;
  
	@Column
	private String ColorName;
	
	@Column
	private Short Code;
	
	
}
