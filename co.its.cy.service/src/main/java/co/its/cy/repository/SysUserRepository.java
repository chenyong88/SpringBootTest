package co.its.cy.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import co.its.cy.entity.SysUser;
public interface SysUserRepository   extends JpaRepository<SysUser, Integer>{

}
