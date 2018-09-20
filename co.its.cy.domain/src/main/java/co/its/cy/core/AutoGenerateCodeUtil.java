package co.its.cy.core;

import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;

/**
 * 自动生成构件
 * @author rj007
 *
 */
public class AutoGenerateCodeUtil {
	
		public static void execute( File domainDir ,File serviceDir,File daoDir) throws IOException{
				
				// 检查目录是否为空
				if( domainDir == null || serviceDir == null || daoDir == null ) 
					throw new RuntimeException(" no such file ");
				
				// 检查domain目录下是否有文件
				File[] domain_Files = domainDir.listFiles();
				if( domain_Files.length == 0 )
					throw new RuntimeException(" no file in the domain dir ");
				
				
				for( File domain_File :domain_Files ){
					
					// 创建service接口和实现类
					create_interface_and_class_File(domain_File,serviceDir,"service");
					
					// 创建dao接口和实现类
					create_interface_and_class_File(domain_File,daoDir,"dao");
				}
				
				
			}

		private static void create_interface_and_class_File(File domain_class_File, File targetDir, String type) throws IOException {
			String interface_file_suffix_Name = null;
			String interface_impl_file_suffix_Name = null;
			
			if( "service".equals(type)){
				interface_file_suffix_Name = "Service.java";
				interface_impl_file_suffix_Name = "ServiceImpl.java";
			} else if("dao".equals(type)){
				interface_file_suffix_Name = "Dao.java";
				interface_impl_file_suffix_Name = "DaoImpl.java";
			}
			
			
			// 检查impl目录是否村子啊，若不存在则创建该目录
			File implDir = null;
			for( File temp : targetDir.listFiles()){
				if( temp != null && "impl".equals(temp.getName())){
					implDir = temp;
					break;
				}
			}
			
			if( implDir == null ){
				implDir = new File(targetDir,"impl");
				implDir.mkdir();
			}
			
			// 创建接口文件
			String domain_interface_file_Name = domain_class_File.getName()
					.substring(0, domain_class_File.getName().indexOf("."))
					+interface_file_suffix_Name;
			
			File domain_interface_File = new File(targetDir,domain_interface_file_Name);
			domain_interface_File.createNewFile();
			
			// 输入接口文件内容
			BufferedWriter interfaceWriter  = new BufferedWriter(
					new FileWriter(domain_interface_File));
			
			String interfacePackageInfo = StringUtil.getPackageInfo(domain_interface_File);
			String interfaceInfo = StringUtil.getInterfaceInfo(domain_interface_File);
			
			interfaceWriter.write(interfacePackageInfo);
			interfaceWriter.write(interfaceInfo);
			
			interfaceWriter.flush();
			interfaceWriter.close();
			
			
			// 创建实现类文件
			String domain_interface_impl_file_Name = domain_class_File.getName()
					.substring(0, domain_class_File.getName().indexOf("."))
					+interface_impl_file_suffix_Name;
			
			File domain_interface_impl_file = new File(implDir,domain_interface_impl_file_Name);
			domain_interface_impl_file.createNewFile();
			
			// 输入实现类文件内容
			BufferedWriter implWriter  = new BufferedWriter(
					new FileWriter(domain_interface_impl_file));
			
			String classPackageInfo =  StringUtil.getPackageInfo(domain_interface_impl_file);;
			String importInfo = StringUtil.getImportInfo(domain_interface_File);
			String classInfo = StringUtil.getClassInfo(domain_interface_impl_file,
					domain_interface_File);
			
			implWriter.write(classPackageInfo);
			implWriter.write(importInfo);
			implWriter.write(classInfo);
			implWriter.flush();
			implWriter.close();
			
		}

		public static void main(String[] args) throws IOException {
			String relativelyPath = System.getProperty("user.dir");
			String[] path = relativelyPath.split(File.separator.concat(File.separator));
			System.out.println(relativelyPath);
			//AutoGenerateCodeUtil.execute(new File("src/main/java/co/its/cy/entity"), new File("co.its.cy.service/src/main/java/co/its/cy/service"), new File("src/main/java"));
		}

}
