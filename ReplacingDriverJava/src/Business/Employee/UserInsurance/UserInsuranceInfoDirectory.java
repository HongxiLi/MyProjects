/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Employee.UserInsurance;

import java.util.ArrayList;

/**
 *
 * @author hongxili
 */
public class UserInsuranceInfoDirectory {
    
    private ArrayList<UserInsuranceInfo> userInsuranceInfoDrectory;
    public UserInsuranceInfoDirectory() {
        userInsuranceInfoDrectory = new ArrayList<UserInsuranceInfo>();
    }
    
    

    public ArrayList<UserInsuranceInfo> getUserInsuranceInfoDirectory() {
        return userInsuranceInfoDrectory;
    }

    public void setUserInsuranceInfoDirectory(ArrayList<UserInsuranceInfo> userInsuranceInfoDrectory) {
        this.userInsuranceInfoDrectory = userInsuranceInfoDrectory;
    }
    public UserInsuranceInfo createUserInsuranceInfo(
             String carInsuranceId,
             String takerName,
             String takerInsId,
             double takerAmout,
             String takerStartTime,
             String takerEndTime,
             String CarNumber,
             String carInsId,
             double carAmount,
             String carStartTime,
             String carEndTime
    ){
       
    
            UserInsuranceInfo insurance = new UserInsuranceInfo();
            insurance.setCarEndTime(carEndTime);
            insurance.setCarAmount(carAmount);
            insurance.setCarInsId(carInsId);
            insurance.setCarNumber(CarNumber);
            insurance.setCarStartTime(carStartTime);
            insurance.setTakerAmount(takerAmout);
            insurance.setTakerEndTime(takerEndTime);
            insurance.setTakerInsId(takerInsId);
            insurance.setTakerName(takerName);
            insurance.setTakerStartTime(takerStartTime);

            userInsuranceInfoDrectory.add(insurance);
            return insurance;
    }
    
    public void deleteUserInsuranceInfoo(UserInsuranceInfo userInsuranceInfo){
        userInsuranceInfoDrectory.remove(userInsuranceInfo);
    }
    public UserInsuranceInfo addUserInsuranceInfo(){
        UserInsuranceInfo userInsuranceInfo = new UserInsuranceInfo();
        userInsuranceInfoDrectory.add(userInsuranceInfo);
        return userInsuranceInfo;
    }
    
    
}
