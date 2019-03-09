/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Employee.Rdriver;


import java.util.ArrayList;

/**
 *
 * @author star
 */
public class RdriverInfoDirectory {
    private ArrayList<RdriverInfo> rdriverInfoDirectory;
    public RdriverInfoDirectory() {
        rdriverInfoDirectory = new ArrayList<RdriverInfo>();
    }

    public ArrayList<RdriverInfo> getRdriverInfoDirectory() {
        return rdriverInfoDirectory;
    }

    public void setRdriverInfoDirectory(ArrayList<RdriverInfo> rdriverInfoDirectory) {
        this.rdriverInfoDirectory = rdriverInfoDirectory;
    }
    public RdriverInfo createCustomer(String email,
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
        
        RdriverInfo employee = new RdriverInfo();
  
        employee.setAddress(address);
        employee.setProfile(profile);
        employee.setStatus(status);
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
    
    public void deleteRdriverInfo(RdriverInfo rdriverInfo){
        rdriverInfoDirectory.remove(rdriverInfo);
    }
    public RdriverInfo addInfo(){
        RdriverInfo rdriverInfo = new RdriverInfo();
        rdriverInfoDirectory.add(rdriverInfo);
        return rdriverInfo;
    }
}
