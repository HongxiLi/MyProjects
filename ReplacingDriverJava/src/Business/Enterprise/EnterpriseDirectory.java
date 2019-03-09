/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Enterprise;

import Business.Organization.OrganizationDirectory;
import java.util.ArrayList;

/**
 *
 * @author MyPC1
 */
public class EnterpriseDirectory {
    private ArrayList<Enterprise> enterpriseList;
   

    public ArrayList<Enterprise> getEnterpriseList() {
        return enterpriseList;
    }

    public void setEnterpriseList(ArrayList<Enterprise> enterpriseList) {
        this.enterpriseList = enterpriseList;
    }
    
    public EnterpriseDirectory(){
        enterpriseList=new ArrayList<Enterprise>();
    }
    
    //Create enterprise
    public Enterprise createAndAddEnterprise(String name,Enterprise.EnterpriseType type){
        Enterprise enterprise=null;
//        if(type==Enterprise.EnterpriseType.Caller){
//            enterprise=new DidiEnterprise(name);
//            enterpriseList.add(enterprise);
//        }
//        if(type==Enterprise.EnterpriseType.RMV){
//            enterprise=new UberEnterprise(name);
//            enterpriseList.add(enterprise);
//        }
        if (type.getValue().equals(Enterprise.EnterpriseType.MIT.getValue())){
            enterprise = new MobileInternetTravelEnterprise(name);
            //enterprise.setName(name);
            enterpriseList.add(enterprise);
        }
//        else if (type.getValue().equals(Enterprise.EnterpriseType.Uber.getValue())){
//            enterprise = new UberEnterprise(name);
//            //enterprise.setName(name);
//            enterpriseList.add(enterprise);
//        }
        return enterprise;
    }
    
    public void deleteEnterprise(Enterprise enterprise){
        enterpriseList.remove(enterprise);
    }
}
