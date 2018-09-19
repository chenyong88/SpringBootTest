package co.its.cy.entity;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Inheritance;
import javax.persistence.InheritanceType;
import lombok.Data;

@Data
@Entity
@Inheritance(strategy=InheritanceType.JOINED)
public class Customer {

 @Id
 @GeneratedValue
 private int ID;
 
 private String customerName;
	
}
