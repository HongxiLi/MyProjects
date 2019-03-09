/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Employee.UserAccounterInfo;

import Business.Employee.UserInsurance.*;

/**
 *
 * @author hongxili
 */
public class UserAccounterInfo {
    
    
    private double discount;
    private double takerBalance;


    
    public UserAccounterInfoDirectory userAccounterInfoDirectory;
    
    
    
    public UserAccounterInfo(){
        userAccounterInfoDirectory = new UserAccounterInfoDirectory();
        
    }

    

    public double getDiscount() {
        return discount;
    }

    public void setDiscount(double discount) {
        this.discount = discount;
    }

    public double getTakerBalance() {
        return takerBalance;
    }

    public void setTakerBalance(double takerBalance) {
        this.takerBalance = takerBalance;
    }
    
    



    public UserAccounterInfoDirectory getUserAccounterInfoDirectory() {
        return userAccounterInfoDirectory;
    }

    public void setUserAccounterInfoDirectory(UserAccounterInfoDirectory userAccounterInfoDirectory) {
        this.userAccounterInfoDirectory = userAccounterInfoDirectory;
    }

    
    
    

    
    
}
