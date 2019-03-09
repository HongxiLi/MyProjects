/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Organization;

import Business.Role.ReplacingDriverRole;
import Business.Role.Role;
import java.util.ArrayList;

/**
 *
 * @author raunak
 */
public class ReplacingDriverOrganization extends Organization{

    public ReplacingDriverOrganization() {
        super(Organization.Type.ReplacingDriver.getValue());
    }
    
    @Override
    public ArrayList<Role> getSupportedRole() {
        ArrayList<Role> roles = new ArrayList();
        roles.add(new ReplacingDriverRole());
        return roles;
    }
     
}