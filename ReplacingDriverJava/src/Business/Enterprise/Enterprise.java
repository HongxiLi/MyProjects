 /*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Enterprise;

import Business.Enterprise.Account.EnterpriseAccountDirectory;
import Business.Organization.Organization;
import Business.Organization.OrganizationDirectory;
import java.util.List;

/**
 *
 * @author MyPC1
 */
public abstract class Enterprise extends Organization{
    
    private EnterpriseType enterpriseType;
    private OrganizationDirectory organizationDirectory;
    private EnterpriseAccountDirectory enterpriseaccountDirectory;
    

    public OrganizationDirectory getOrganizationDirectory() {
        return organizationDirectory;
    }
    
    public enum EnterpriseType{
        MIT("Mobile Internet Travel"), 
        ;
        
        private String value;
        
        private EnterpriseType(String value){
            this.value=value;
        }
        public String getValue() {
            return value;
        }
        
        @Override
        public String toString(){
        return value;
    }
    }

    public EnterpriseType getEnterpriseType() {
        return enterpriseType;
    }

    public void setEnterpriseType(EnterpriseType enterpriseType) {
        this.enterpriseType = enterpriseType;
    }

    public EnterpriseAccountDirectory getEnterpriseaccountDirectory() {
        return enterpriseaccountDirectory;
    }

    public void setEnterpriseaccountDirectory(EnterpriseAccountDirectory enterpriseaccountDirectory) {
        this.enterpriseaccountDirectory = enterpriseaccountDirectory;
    }
    
    
    public abstract List<Organization.Type> getSupportedOrg();
    
    public Enterprise(String name,EnterpriseType type){
        super(name);
        this.enterpriseType=type;
        organizationDirectory=new OrganizationDirectory();
        enterpriseaccountDirectory = new EnterpriseAccountDirectory();
    }
}
