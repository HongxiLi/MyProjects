/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Employee;

import Business.Employee.Rdriver.RdriverInfoDirectory;
import Business.Employee.User.UserInfoDirectory;
import Business.Employee.UserAccounterInfo.UserAccounterInfoDirectory;
import Business.Employee.UserCarOwner.CarOwnerInfoDirectory;
import Business.Employee.UserInsurance.UserInsuranceInfoDirectory;

/**
 *
 * @author raunak
 */
public class Employee {
    
    private String name;
    private int id;
    private static int count = 1;
    private CarOwnerInfoDirectory carOwnerInfoDirectory;
    private RdriverInfoDirectory rdriverInfoDirectory;
    private UserInfoDirectory userInfoDirectory;
    private UserInsuranceInfoDirectory userInsuranceInfoDirectory;
    private UserAccounterInfoDirectory userAccounterInfoDirectory;

    public Employee() {
        id = count;
        count++;
        carOwnerInfoDirectory = new CarOwnerInfoDirectory();
        rdriverInfoDirectory = new RdriverInfoDirectory();
        userInfoDirectory = new UserInfoDirectory();
        userInsuranceInfoDirectory = new UserInsuranceInfoDirectory();
        userAccounterInfoDirectory = new UserAccounterInfoDirectory();
    }

    public int getId() {
        return id;
    }

    public void setName(String name) {
        this.name = name;
    }

    
    public String getName() {
        return name;
    }

    public CarOwnerInfoDirectory getCarOwnerInfoDirectory() {
        return carOwnerInfoDirectory;
    }

    public void setCarOwnerInfoDirectory(CarOwnerInfoDirectory carOwnerInfoDirectory) {
        this.carOwnerInfoDirectory = carOwnerInfoDirectory;
    }

    public RdriverInfoDirectory getRdriverInfoDirectory() {
        return rdriverInfoDirectory;
    }

    public void setRdriverInfoDirectory(RdriverInfoDirectory rdriverInfoDirectory) {
        this.rdriverInfoDirectory = rdriverInfoDirectory;
    }

    public UserInfoDirectory getUserInfoDirectory() {
        return userInfoDirectory;
    }

    public void setUserInfoDirectory(UserInfoDirectory userInfoDirectory) {
        this.userInfoDirectory = userInfoDirectory;
    }

    public UserInsuranceInfoDirectory getUserInsuranceInfoDirectory() {
        return userInsuranceInfoDirectory;
    }

    public void setUserInsuranceInfoDirectory(UserInsuranceInfoDirectory userInsuranceInfoDirectory) {
        this.userInsuranceInfoDirectory = userInsuranceInfoDirectory;
    }

    public UserAccounterInfoDirectory getUserAccounterInfoDirectory() {
        return userAccounterInfoDirectory;
    }

    public void setUserAccounterInfoDirectory(UserAccounterInfoDirectory userAccounterInfoDirectory) {
        this.userAccounterInfoDirectory = userAccounterInfoDirectory;
    }
    
    

    @Override
    public String toString() {
        return name;
    }


    
    
}
