/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package business;

import java.util.Date;

/**
 *
 * @author hongxili
 */
public class Account {
    
    private String routingNumber;
    private String accountNumber;
    private String bankName;
    private int balance;
    private Date createdOn;

    
    // different line//
    public Account() {
        this.createdOn = new Date();
        
        
    }
       

    public String getRoutingNumber() {
        return routingNumber;
    }

    public void setRoutingNumber(String routingNumber) {
        this.routingNumber = routingNumber;
    }

    public String getAccountNumber() {
        return accountNumber;
    }

    public void setAccountNumber(String accountNumber) {
        this.accountNumber = accountNumber;
    }

    public String getBankName() {
        return bankName;
    }

    public void setBankName(String bankName) {
        this.bankName = bankName;
    }

    public int getBalance() {
        return balance;
    }

    public void setBalance(int balance) {
        this.balance = balance;
    }

    public Date getCreatedOn() {
        return createdOn;
    }
    
     @Override
    public String toString()
    {
         return this.bankName;
    }

    
    
    
}
