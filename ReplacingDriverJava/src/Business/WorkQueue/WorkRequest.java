/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Business.WorkQueue;

import Business.UserAccount.UserAccount;
import java.util.Date;

/**
 *
 * @author raunak
 */
public abstract class WorkRequest {

    private String message;
    private String from;
    private int from_index;
    private String to;
    private int to_index;
    private String from_time;
    private String to_time;
    private String number;
    private double c_fee;
    private double d_fee;
    private UserAccount sender;
    private UserAccount receiver;
    private String status;
    private double money;
    private String action; 
    private String transaction_num;
    private Date requestDate;
    private Date resolveDate;
    private String c_insurance;
    private String d_insurance;
    
    public WorkRequest(){
        requestDate = new Date();
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public UserAccount getSender() {
        return sender;
    }

    public void setSender(UserAccount sender) {
        this.sender = sender;
    }

    public UserAccount getReceiver() {
        return receiver;
    }

    public void setReceiver(UserAccount receiver) {
        this.receiver = receiver;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public Date getRequestDate() {
        return requestDate;
    }

    public void setRequestDate(Date requestDate) {
        this.requestDate = requestDate;
    }

    public Date getResolveDate() {
        return resolveDate;
    }

    public void setResolveDate(Date resolveDate) {
        this.resolveDate = resolveDate;
    }

    public int getFrom_index() {
        return from_index;
    }

    public void setFrom_index(int from_index) {
        this.from_index = from_index;
    }

    public int getTo_index() {
        return to_index;
    }

    public void setTo_index(int to_index) {
        this.to_index = to_index;
    }
   

    public String getFrom() {
        return from;
    }

    public void setFrom(String from) {
        this.from = from;
    }

    public String getTo() {
        return to;
    }

    public void setTo(String to) {
        this.to = to;
    }

    public String getFrom_time() {
        return from_time;
    }

    public void setFrom_time(String from_time) {
        this.from_time = from_time;
    }

    public String getTo_time() {
        return to_time;
    }

    public void setTo_time(String to_time) {
        this.to_time = to_time;
    }

    public String getNumber() {
        return number;
    }

    public void setNumber(String number) {
        this.number = number;
    }

    public double getMoney() {
        return money;
    }

    public void setMoney(double money) {
        this.money = money;
    }

    public String getC_insurance() {
        return c_insurance;
    }

    public void setC_insurance(String c_insurance) {
        this.c_insurance = c_insurance;
    }

    public String getD_insurance() {
        return d_insurance;
    }

    public void setD_insurance(String d_insurance) {
        this.d_insurance = d_insurance;
    }

    public String getAction() {
        return action;
    }

    public void setAction(String action) {
        this.action = action;
    }

    public String getTransaction_num() {
        return transaction_num;
    }

    public void setTransaction_num(String transaction_num) {
        this.transaction_num = transaction_num;
    }

    public double getC_fee() {
        return c_fee;
    }

    public void setC_fee(double c_fee) {
        this.c_fee = c_fee;
    }

    public double getD_fee() {
        return d_fee;
    }

    public void setD_fee(double d_fee) {
        this.d_fee = d_fee;
    }

    
    
    @Override
    public String toString() {
        return status;
    }
    
}
