/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Employee.UserCarOwner;

import java.util.ArrayList;

/**
 *
 * @author star
 */
public class CarOwnerInfoDirectory {
    private ArrayList<CarOwnerInfo> carOwnerInfoDirectory;
    public CarOwnerInfoDirectory() {
        carOwnerInfoDirectory = new ArrayList<CarOwnerInfo>();
    }

    public ArrayList<CarOwnerInfo> getCarOwnerInfoDirectory() {
        return carOwnerInfoDirectory;
    }

    public void setCarOwnerInfoDirectory(ArrayList<CarOwnerInfo> carOwnerInfoDirectory) {
        this.carOwnerInfoDirectory = carOwnerInfoDirectory;
    }
    public CarOwnerInfo createCustomer(String email,
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
        CarOwnerInfo employee = new CarOwnerInfo();
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

        carOwnerInfoDirectory.add(employee);
        return employee;
    }
    
    public void deleteCarOwnerInfo(CarOwnerInfo carOwnerInfo){
        carOwnerInfoDirectory.remove(carOwnerInfo);
    }
    public CarOwnerInfo addInfo(){
        CarOwnerInfo carownerinfo = new CarOwnerInfo();
        carOwnerInfoDirectory.add(carownerinfo);
        return carownerinfo;
    }
}
