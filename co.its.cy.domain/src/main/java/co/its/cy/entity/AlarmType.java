package co.its.cy.entity;

import java.io.Serializable;

import javax.persistence.Column;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;

import lombok.Data;


@Data
@javax.persistence.Entity
@javax.persistence.Table(name="AlarmType")
public class AlarmType  implements Serializable{
	private static final long serialVersionUID = -5218076739283020378L;
	
	@Id
	@GeneratedValue
	private Integer id;
  
	@Column
	private String alarmDesc;
	
	@Column
	private String groupName;
	
	@Column
	private Integer showFlag;
	
	
}
