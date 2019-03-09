/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Employee.UserAccounterInfo;

import Business.Employee.UserInsurance.*;
import java.util.ArrayList;

/**
 *
 * @author hongxili
 */
public class UserAccounterInfoDirectory {
    
    private ArrayList<UserAccounterInfo> userAccounterInfoDirectory;
    public UserAccounterInfoDirectory() {
        userAccounterInfoDirectory = new ArrayList<UserAccounterInfo>();
    }
    
    

    public ArrayList<UserAccounterInfo> getUserAccounterInfoDirectory() {
        return userAccounterInfoDirectory;
    }

    public void setUserAccounterInfoDirectory(ArrayList<UserAccounterInfo> userAccounterInfoDirectory) {
        this.userAccounterInfoDirectory = userAccounterInfoDirectory;
    }
    public UserAccounterInfo createUserAccounterInfoDirectory(
             String carInsuranceId,
             String takerName,
             String takerInsI,
             double takerAmout,
             String takerStartTime,
             String takerEndTime,
             String CarNumber,
             String carInsId,
             double carAmount,
             String carStartTime,
             String carEndTime
    ){
       
    
            UserAccounterInfo insurance = new UserAccounterInfo();

            userAccounterInfoDirectory.add(insurance);
            return insurance;
    }
    
    public void deleteUserAccounterInfo(UserAccounterInfo userAccounterInfo){
        userAccounterInfoDirectory.remove(userAccounterInfo);
    }
    public UserAccounterInfo addUserAccounterInfo(){
        UserAccounterInfo userAccounterInfo = new UserAccounterInfo();
        userAccounterInfoDirectory.add(userAccounterInfo);
        return userAccounterInfo;
    }
    
    
}
