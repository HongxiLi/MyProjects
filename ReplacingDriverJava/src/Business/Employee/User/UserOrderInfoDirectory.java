/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Employee.User;

import java.util.ArrayList;

/**
 *
 * @author star
 */
public class UserOrderInfoDirectory {
    private ArrayList<UserOrderInfo> userOrderInfoDirectory;
    public UserOrderInfoDirectory() {
        userOrderInfoDirectory = new ArrayList<UserOrderInfo>();
    }

    public ArrayList<UserOrderInfo> getUserOderInfoDirectory() {
        return userOrderInfoDirectory;
    }

    public void setUserOderInfoDirectory(ArrayList<UserOrderInfo> userOrderInfoDirectory) {
        this.userOrderInfoDirectory = userOrderInfoDirectory;
    }
    public UserOrderInfo createUserOder(
    String departure,
    String arrival,
    String departure_time,
    String arrival_time,
    String place,
    int number,
    String note,
    String order_status){
        
        UserOrderInfo employee = new UserOrderInfo();
        
        employee.setArrival(arrival);
        employee.setArrival_time(arrival_time);
        employee.setDeparture(departure);
        employee.setDeparture_time(departure_time);
        employee.setNote(note);
        employee.setNumber(number);
        employee.setPlace(place);
        employee.setOrder_status(order_status);
      

//        employee.setConUserPassword(userpassword);

        userOrderInfoDirectory.add(employee);
        return employee;
    }
    
    public void deleteUserOderInfo(UserOrderInfo userOrderInfo){
        userOrderInfoDirectory.remove(userOrderInfo);
    }
    public UserOrderInfo addOderInfo(){
        UserOrderInfo userOrderInfo = new UserOrderInfo();
        userOrderInfoDirectory.add(userOrderInfo);
        return userOrderInfo;
    }
}
