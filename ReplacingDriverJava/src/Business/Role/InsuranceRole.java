/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Role;

import Business.EcoSystem;
import Business.Enterprise.Enterprise;
import Business.Organization.InsuranceOrganization;
import Business.Organization.Organization;
import Business.UserAccount.UserAccount;
import javax.swing.JPanel;
import userinterface.CheckerRole.CheckerWorkArea;
import userinterface.InsuranceRole.InsuranceWorkArea;

/**
 *
 * @author star
 */
public class InsuranceRole extends Role{
    
    @Override
    public JPanel createWorkArea(JPanel userProcessContainer, UserAccount account, Organization organization, Enterprise enterprise, EcoSystem business) {
        return new InsuranceWorkArea(userProcessContainer, account, (InsuranceOrganization) organization, enterprise, business);
    }
    
}
