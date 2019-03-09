/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Enterprise.Account;

/**
 *
 * @author hongxili
 */
public class EnterpriseAccount {
    private double Balance;
    
    public EnterpriseAccountDirectory enterpriseaccountDirectory;
    
    public EnterpriseAccount(){
        enterpriseaccountDirectory = new EnterpriseAccountDirectory();
    }

    public double getBalance() {
        return Balance;
    }

    public void setBalance(double Balance) {
        this.Balance = Balance;
    }

    public EnterpriseAccountDirectory getEnterpriseaccountDirectory() {
        return enterpriseaccountDirectory;
    }

    public void setEnterpriseaccountDirectory(EnterpriseAccountDirectory enterpriseaccountDirectory) {
        this.enterpriseaccountDirectory = enterpriseaccountDirectory;
    }
    

}
