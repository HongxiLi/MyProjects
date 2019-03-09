/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Enterprise;

import Business.Role.Role;
import java.util.ArrayList;
import Business.Enterprise.MobileInternetTravelEnterprise;
import Business.Enterprise.EnterpriseDirectory;
import Business.Enterprise.Enterprise;
import Business.Organization.Organization;
import java.util.List;

/**
 *
 * @author MyPC1
 */
public class MobileInternetTravelEnterprise extends Enterprise {
    


    public MobileInternetTravelEnterprise(String name) {
       super(name, Enterprise.EnterpriseType.MIT);
    }
    @Override
    public ArrayList<Role> getSupportedRole() {
        return null;
    }
    
    @Override
    public List<Organization.Type> getSupportedOrg() {
//        List<Organization.Type> orgTypes = new ArrayList<>();
//        orgTypes.add(Organization.Type.Carowner);
//        orgTypes.add(Organization.Type.Admin);
//        orgTypes.add(Organization.Type.Rdriver);

        return null;
        
    }
    
}
