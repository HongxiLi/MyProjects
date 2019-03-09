/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Enterprise.Account;

import java.util.ArrayList;

/**
 *
 * @author hongxili
 */
public class EnterpriseAccountDirectory {
    private ArrayList<EnterpriseAccount> enterpriseAccountDirectory;
    
    public EnterpriseAccountDirectory(){
        enterpriseAccountDirectory = new ArrayList<EnterpriseAccount>();
    }

    public ArrayList<EnterpriseAccount> getEnterpriseAccountDirectory() {
        return enterpriseAccountDirectory;
    }

    public void setEnterpriseAccountDirectory(ArrayList<EnterpriseAccount> enterpriseAccountDirectory) {
        this.enterpriseAccountDirectory = enterpriseAccountDirectory;
    }
    public void deleteEnterpriseAccount(EnterpriseAccount enterpriseaccount){
        enterpriseAccountDirectory.remove(enterpriseaccount);
    }
    public EnterpriseAccount addEnterpriseAccount(){
        EnterpriseAccount enterpriseaccount = new EnterpriseAccount();
        enterpriseAccountDirectory.add(enterpriseaccount);
        return enterpriseaccount;
    }
    
}
