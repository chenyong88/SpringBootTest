package co.its.cy.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import co.its.cy.entity.AlarmType;

public interface AlarmTypRerepository  extends JpaRepository<AlarmType, Integer>{
	//@Cacheable(value="demo")
	AlarmType findByGroupName(String GroupName);
}
