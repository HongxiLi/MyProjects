/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Employee.UserInsurance;

/**
 *
 * @author hongxili
 */
public class UserInsuranceInfo {
    

    private String takerName;
    private String takerInsId;
    private double takerAmount;
    private String takerStartTime;
    private String takerEndTime;
    private String CarNumber;
    private String carInsId;
    private double carAmount;
    private String carStartTime;
    private String carEndTime;

    
    public UserInsuranceInfoDirectory userInsuranceInfoDirectory;

    public UserInsuranceInfo(){
        userInsuranceInfoDirectory = new UserInsuranceInfoDirectory();
    }


    public String getTakerName() {
        return takerName;
    }

    public void setTakerName(String takerName) {
        this.takerName = takerName;
    }

    public String getTakerInsId() {
        return takerInsId;
    }

    public void setTakerInsId(String takerInsId) {
        this.takerInsId = takerInsId;
    }

    public double getTakerAmount() {
        return takerAmount;
    }

    public void setTakerAmount(double takerAmount) {
        this.takerAmount = takerAmount;
    }

    public String getTakerStartTime() {
        return takerStartTime;
    }

    public void setTakerStartTime(String takerStartTime) {
        this.takerStartTime = takerStartTime;
    }

    public String getTakerEndTime() {
        return takerEndTime;
    }

    public void setTakerEndTime(String takerEndTime) {
        this.takerEndTime = takerEndTime;
    }

    public String getCarNumber() {
        return CarNumber;
    }

    public void setCarNumber(String CarNumber) {
        this.CarNumber = CarNumber;
    }

    public String getCarInsId() {
        return carInsId;
    }

    public void setCarInsId(String carInsId) {
        this.carInsId = carInsId;
    }

    public double getCarAmount() {
        return carAmount;
    }

    public void setCarAmount(double carAmount) {
        this.carAmount = carAmount;
    }

    public String getCarStartTime() {
        return carStartTime;
    }

    public void setCarStartTime(String carStartTime) {
        this.carStartTime = carStartTime;
    }

    public String getCarEndTime() {
        return carEndTime;
    }

    public void setCarEndTime(String carEndTime) {
        this.carEndTime = carEndTime;
    }

    public UserInsuranceInfoDirectory getUserInsuranceInfoDirectory() {
        return userInsuranceInfoDirectory;
    }

    public void setUserInsuranceInfoDirectory(UserInsuranceInfoDirectory userInsuranceInfoDirectory) {
        this.userInsuranceInfoDirectory = userInsuranceInfoDirectory;
    }

    
    

    
    
}
