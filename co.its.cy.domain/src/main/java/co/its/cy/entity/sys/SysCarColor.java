package co.its.cy.entity.sys;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Table;

import co.its.cy.entity.base.BaseEntity;
import lombok.Data;
import lombok.EqualsAndHashCode;

@Data
@Entity
@Table
@EqualsAndHashCode(callSuper=false)
public class SysCarColor  extends BaseEntity{
	private static final long serialVersionUID = -5218076739283020378L;
	
  
	@Column
	private String ColorName;
	
	@Column
	private Short Code;
	
	
}
