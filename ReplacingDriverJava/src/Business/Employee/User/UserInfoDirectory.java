/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Employee.User;


import Business.Employee.Rdriver.*;
import java.util.ArrayList;

/**
 *
 * @author star
 */
public class UserInfoDirectory {
    private ArrayList<UserInfo> rdriverInfoDirectory;
    public UserInfoDirectory() {
        rdriverInfoDirectory = new ArrayList<UserInfo>();
    }

    public ArrayList<UserInfo> getUserInfoDirectory() {
        return rdriverInfoDirectory;
    }

    public void setUserInfoDirectory(ArrayList<UserInfo> rdriverInfoDirectory) {
        this.rdriverInfoDirectory = rdriverInfoDirectory;
    }
    public UserInfo createUser(String email,
     String cell,
     String ssn,
     String address,
     String profile,
     String car_num,
     String license_num,
     String car_type,
     int driving_exp,
     String car_insurance,
     int status){
        
        UserInfo employee = new UserInfo();
        
   
        employee.setAddress(address);
        employee.setProfile(profile);
        employee.setStatus(0);
        employee.setCar_num(car_num);
        employee.setEmail(email);
        employee.setSsn(ssn);
        employee.setCell(cell);
        employee.setCar_insurance(car_insurance);
        employee.setCar_type(car_type);
        employee.setDriving_exp(driving_exp);
        employee.setLicense_num(license_num);


//        employee.setConUserPassword(userpassword);

        rdriverInfoDirectory.add(employee);
        return employee;
    }
    
    public void deleteUserInfo(UserInfo rdriverInfo){
        rdriverInfoDirectory.remove(rdriverInfo);
    }
    public UserInfo addInfo(){
        UserInfo rdriverInfo = new UserInfo();
        rdriverInfoDirectory.add(rdriverInfo);
        return rdriverInfo;
    }
}
