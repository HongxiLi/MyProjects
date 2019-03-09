/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Employee.Rdriver;

/**
 *
 * @author star
 */
public class RdriverInfo {
    private int status;
    private String email;
    private String cell;
    private String ssn;
    private String address;
    private String profile;
    private String car_num;
    private String license_num;
    private String car_type;
    private int driving_exp;
    private String car_insurance;
    private int accountMoney;
    
    public RdriverInfoDirectory rdriverInfoDirectory;
    
    public RdriverInfo(){
        rdriverInfoDirectory = new RdriverInfoDirectory();
    }

    public int getAccountMoney() {
        return accountMoney;
    }

    public void setAccountMoney(int accountMoney) {
        this.accountMoney = accountMoney;
    }
    
    

    public int getStatus() {
        return status;
    }

    public void setStatus(int status) {
        this.status = status;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getCell() {
        return cell;
    }

    public void setCell(String cell) {
        this.cell = cell;
    }

    public String getSsn() {
        return ssn;
    }

    public void setSsn(String ssn) {
        this.ssn = ssn;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getProfile() {
        return profile;
    }

    public void setProfile(String profile) {
        this.profile = profile;
    }

    public String getCar_num() {
        return car_num;
    }

    public void setCar_num(String car_num) {
        this.car_num = car_num;
    }

    public String getLicense_num() {
        return license_num;
    }

    public void setLicense_num(String license_num) {
        this.license_num = license_num;
    }

    public String getCar_type() {
        return car_type;
    }

    public void setCar_type(String car_type) {
        this.car_type = car_type;
    }

    public int getDriving_exp() {
        return driving_exp;
    }

    public void setDriving_exp(int driving_exp) {
        this.driving_exp = driving_exp;
    }

    public String getCar_insurance() {
        return car_insurance;
    }

    public void setCar_insurance(String car_insurance) {
        this.car_insurance = car_insurance;
    }

    public RdriverInfoDirectory getRdriverInfoDirectory() {
        return rdriverInfoDirectory;
    }

    public void setRdriverInfoDirectory(RdriverInfoDirectory rdriverInfoDirectory) {
        this.rdriverInfoDirectory = rdriverInfoDirectory;
    }


    
}
