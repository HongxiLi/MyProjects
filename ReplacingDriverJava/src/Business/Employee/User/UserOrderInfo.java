/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.Employee.User;

/**
 *
 * @author star
 */
public class UserOrderInfo {
    private String departure;
    private String arrival;
    private String departure_time;
    private String arrival_time;
    private String place;
    private int number;
    private String note;
    private String order_status;
    private String insurance;
    
    private UserOrderInfoDirectory userOrderInfoDirectory;
    
    public UserOrderInfo(){
        userOrderInfoDirectory = new UserOrderInfoDirectory();
    }

    public String getDeparture() {
        return departure;
    }

    public void setDeparture(String departure) {
        this.departure = departure;
    }

    public String getArrival() {
        return arrival;
    }

    public void setArrival(String arrival) {
        this.arrival = arrival;
    }

    public String getDeparture_time() {
        return departure_time;
    }

    public void setDeparture_time(String departure_time) {
        this.departure_time = departure_time;
    }

    public String getArrival_time() {
        return arrival_time;
    }

    public void setArrival_time(String arrival_time) {
        this.arrival_time = arrival_time;
    }

    public String getPlace() {
        return place;
    }

    public void setPlace(String place) {
        this.place = place;
    }

    public int getNumber() {
        return number;
    }

    public void setNumber(int number) {
        this.number = number;
    }

    public String getNote() {
        return note;
    }

    public void setNote(String note) {
        this.note = note;
    }

    public String getOrder_status() {
        return order_status;
    }

    public void setOrder_status(String order_status) {
        this.order_status = order_status;
    }

    public String getInsurance() {
        return insurance;
    }

    public void setInsurance(String insurance) {
        this.insurance = insurance;
    }

    public UserOrderInfoDirectory getUserOrderInfoDirectory() {
        return userOrderInfoDirectory;
    }

    public void setUserOrderInfoDirectory(UserOrderInfoDirectory userOrderInfoDirectory) {
        this.userOrderInfoDirectory = userOrderInfoDirectory;
    }
    
    
}
