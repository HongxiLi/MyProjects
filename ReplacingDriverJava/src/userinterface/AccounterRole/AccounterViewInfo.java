/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package userinterface.AccounterRole;


import userinterface.InsuranceRole.*;
import Business.Employee.Employee;
import Business.Employee.User.UserInfo;
import Business.Employee.UserAccounterInfo.UserAccounterInfo;
import Business.Employee.UserInsurance.UserInsuranceInfo;

import Business.Enterprise.Enterprise;
import Business.UserAccount.UserAccount;
import Business.WorkQueue.LabTestWorkRequest;

import javax.swing.JOptionPane;
import javax.swing.JPanel;


import java.awt.CardLayout;

/**
 *
 * @author star
 */
public class AccounterViewInfo extends javax.swing.JPanel {

    /**
     * Creates new form ReviewInfoJPanel
     */
    JPanel userProcessContainer;
    LabTestWorkRequest request;
    
  
    private Employee e;


    public AccounterViewInfo(JPanel userProcessContainer, LabTestWorkRequest request) {
        initComponents();
        this.userProcessContainer = userProcessContainer;
        this.request = request;
        
        this.userProcessContainer = userProcessContainer;

        this.e = request.getSender().getEmployee();
        
        populate();

        
        
        
        for(UserInfo c : request.getSender().getEmployee().getUserInfoDirectory().getUserInfoDirectory()){
        
        nTf.setText(request.getSender().getEmployee().getName());
        sTf.setText(c.getSsn());
        eTf.setText(c.getEmail());
        for(UserAccounterInfo ac : request.getSender().getEmployee().getUserAccounterInfoDirectory().getUserAccounterInfoDirectory()){
            ActionLabel.setText(request.getAction());
            //takerNameTf.setText(c.getUserName());
            sactionLabel.setText(request.getTransaction_num());
            balanceLabel.setText(String.valueOf(ac.getTakerBalance()));
            discountLabel.setText(String.valueOf(ac.getDiscount()));
            amountLabel.setText(String.valueOf(request.getMoney()));
        }
        //takerNameTf.setText(request.getSender().getEmployee().getName());         
        }
        
        
        
        
        
            
    }
    public void populate(){
        for(UserAccounterInfo c : request.getSender().getEmployee().getUserAccounterInfoDirectory().getUserAccounterInfoDirectory()){
//            ActionLabel.setText(request.getAction());
//            //takerNameTf.setText(c.getUserName());
//            sactionLabel.setText(request.getTransaction_num());
//            balanceLabel.setText(String.valueOf(c.getTakerBalance()));
            if( c.getTakerBalance()<500){
                c.setDiscount(1.00);
            }
            if(c.getTakerBalance()>=500 && c.getTakerBalance()<=1000){
                c.setDiscount(0.98);
            }
            if(c.getTakerBalance()>1000 && c.getTakerBalance()<2000){
                c.setDiscount(0.95);
            }
            if(c.getTakerBalance()>=2000 && c.getTakerBalance()<=5000){
                c.setDiscount(0.9);
            }
            if(c.getTakerBalance()>5000){
                c.setDiscount(0.88);
            }
            discountLabel.setText(String.valueOf(c.getDiscount()));
            balanceLabel.setText(String.valueOf(c.getTakerBalance()));
            System.out.println(c.getDiscount());
            //actionTf.setText(request.getMessage());
            
        }
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLabel5 = new javax.swing.JLabel();
        jLabel12 = new javax.swing.JLabel();
        jLabel1 = new javax.swing.JLabel();
        RejectButton = new javax.swing.JButton();
        backJButton = new javax.swing.JButton();
        jLabel20 = new javax.swing.JLabel();
        nTf = new javax.swing.JTextField();
        jLabel21 = new javax.swing.JLabel();
        sTf = new javax.swing.JTextField();
        jLabel22 = new javax.swing.JLabel();
        eTf = new javax.swing.JTextField();
        jLabel23 = new javax.swing.JLabel();
        jLabel28 = new javax.swing.JLabel();
        jLabel30 = new javax.swing.JLabel();
        saveInsBtn = new javax.swing.JButton();
        jLabel29 = new javax.swing.JLabel();
        discountLabel = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        refreshBtn = new javax.swing.JButton();
        ActionLabel = new javax.swing.JLabel();
        sactionLabel = new javax.swing.JLabel();
        balanceLabel = new javax.swing.JLabel();
        jLabel31 = new javax.swing.JLabel();
        amountLabel = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        jLabel6 = new javax.swing.JLabel();

        jLabel5.setText("jLabel5");

        setBackground(new java.awt.Color(224, 246, 221));

        jLabel12.setFont(new java.awt.Font("Tahoma", 2, 12)); // NOI18N
        jLabel12.setText("------Basic Information--------------------------------");

        jLabel1.setFont(new java.awt.Font("Tahoma", 3, 24)); // NOI18N
        jLabel1.setText("Check  Information And Charge Here!");

        RejectButton.setBackground(new java.awt.Color(204, 0, 0));
        RejectButton.setFont(new java.awt.Font("Lucida Grande", 0, 14)); // NOI18N
        RejectButton.setText("Reject ");
        RejectButton.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                RejectButtonActionPerformed(evt);
            }
        });

        backJButton.setFont(new java.awt.Font("Lucida Grande", 0, 14)); // NOI18N
        backJButton.setText("Back");
        backJButton.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                backJButtonActionPerformed(evt);
            }
        });

        jLabel20.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        jLabel20.setText("Name:");

        nTf.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        nTf.setEnabled(false);

        jLabel21.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        jLabel21.setText("ssn:");

        sTf.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        sTf.setEnabled(false);

        jLabel22.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        jLabel22.setText("email:");

        eTf.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        eTf.setEnabled(false);

        jLabel23.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        jLabel23.setText("Taker Discount:");

        jLabel28.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        jLabel28.setText("Current Balance:");

        jLabel30.setFont(new java.awt.Font("Tahoma", 2, 12)); // NOI18N
        jLabel30.setText("-----Account Balance Information---------");

        saveInsBtn.setBackground(new java.awt.Color(0, 204, 0));
        saveInsBtn.setFont(new java.awt.Font("Lucida Grande", 0, 14)); // NOI18N
        saveInsBtn.setText("Accept");
        saveInsBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                saveInsBtnActionPerformed(evt);
            }
        });

        jLabel29.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        jLabel29.setText("Transaction Number:");

        jLabel2.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        jLabel2.setText("Action:");

        refreshBtn.setFont(new java.awt.Font("Lucida Grande", 0, 14)); // NOI18N
        refreshBtn.setText("Refresh");
        refreshBtn.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                refreshBtnActionPerformed(evt);
            }
        });

        balanceLabel.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        balanceLabel.setForeground(new java.awt.Color(255, 255, 255));
        balanceLabel.setText("       ");

        jLabel31.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        jLabel31.setText("Transaction Amount:");

        amountLabel.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N

        jLabel3.setBackground(new java.awt.Color(51, 51, 255));
        jLabel3.setForeground(new java.awt.Color(255, 255, 255));
        jLabel3.setIcon(new javax.swing.ImageIcon(getClass().getResource("/userinterface/AccounterRole/7.png"))); // NOI18N

        jLabel4.setIcon(new javax.swing.ImageIcon(getClass().getResource("/userinterface/AccounterRole/9.png"))); // NOI18N

        jLabel6.setIcon(new javax.swing.ImageIcon(getClass().getResource("/userinterface/AccounterRole/13.png"))); // NOI18N

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(this);
        this.setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(142, 142, 142)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel23)
                    .addComponent(jLabel28)
                    .addComponent(jLabel2)
                    .addComponent(jLabel29)
                    .addComponent(jLabel31))
                .addGap(55, 55, 55)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(amountLabel, javax.swing.GroupLayout.PREFERRED_SIZE, 147, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(ActionLabel, javax.swing.GroupLayout.PREFERRED_SIZE, 113, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(sactionLabel, javax.swing.GroupLayout.PREFERRED_SIZE, 113, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                            .addGroup(layout.createSequentialGroup()
                                .addComponent(balanceLabel, javax.swing.GroupLayout.PREFERRED_SIZE, 143, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                .addComponent(refreshBtn, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGroup(layout.createSequentialGroup()
                                .addGap(25, 25, 25)
                                .addComponent(saveInsBtn, javax.swing.GroupLayout.PREFERRED_SIZE, 99, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(jLabel4)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 19, Short.MAX_VALUE)
                                .addComponent(RejectButton)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addComponent(jLabel6)))
                        .addGap(47, 47, 47))))
            .addGroup(layout.createSequentialGroup()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGap(282, 282, 282)
                        .addComponent(discountLabel, javax.swing.GroupLayout.PREFERRED_SIZE, 113, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(110, 110, 110)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 508, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(layout.createSequentialGroup()
                                .addGap(35, 35, 35)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                    .addComponent(jLabel22, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.PREFERRED_SIZE, 56, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel21, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.PREFERRED_SIZE, 56, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(jLabel20, javax.swing.GroupLayout.Alignment.LEADING))
                                .addGap(27, 27, 27)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                    .addComponent(nTf, javax.swing.GroupLayout.PREFERRED_SIZE, 171, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(eTf, javax.swing.GroupLayout.PREFERRED_SIZE, 171, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(sTf, javax.swing.GroupLayout.PREFERRED_SIZE, 171, javax.swing.GroupLayout.PREFERRED_SIZE)))))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(58, 58, 58)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel30, javax.swing.GroupLayout.PREFERRED_SIZE, 237, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel12, javax.swing.GroupLayout.PREFERRED_SIZE, 254, javax.swing.GroupLayout.PREFERRED_SIZE))))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel3)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(backJButton, javax.swing.GroupLayout.PREFERRED_SIZE, 85, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(0, 0, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jLabel1)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jLabel12)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(nTf, javax.swing.GroupLayout.PREFERRED_SIZE, 28, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(sTf, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(eTf, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jLabel20, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jLabel21, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(jLabel22)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jLabel30)
                        .addGap(6, 6, 6)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel28, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(balanceLabel, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)))
                    .addGroup(layout.createSequentialGroup()
                        .addGap(0, 0, Short.MAX_VALUE)
                        .addComponent(refreshBtn, javax.swing.GroupLayout.PREFERRED_SIZE, 41, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel23, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(discountLabel))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel2)
                    .addComponent(ActionLabel))
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel29, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(sactionLabel))
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel31, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(amountLabel, javax.swing.GroupLayout.PREFERRED_SIZE, 16, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(70, 70, 70)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(RejectButton, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(saveInsBtn, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel4, javax.swing.GroupLayout.PREFERRED_SIZE, 43, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel6))
                .addGap(29, 29, 29)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jLabel3)
                    .addComponent(backJButton, javax.swing.GroupLayout.PREFERRED_SIZE, 40, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap())
        );
    }// </editor-fold>//GEN-END:initComponents

    private void RejectButtonActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_RejectButtonActionPerformed
        // TODO add your handling code here:
        
       // for(UserInfo c : request.getSender().getEmployee().getUserInfoDirectory().getUserInfoDirectory()){
           
            System.out.println(request.getSender().getEmployee().getName());
            JOptionPane.showMessageDialog(null, "Please check your transaction number again!");
            saveInsBtn.setEnabled(false);
            RejectButton.setEnabled(false);
            //     }

    }//GEN-LAST:event_RejectButtonActionPerformed

    private void backJButtonActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_backJButtonActionPerformed

        
        userProcessContainer.remove(this);
        CardLayout layout = (CardLayout) userProcessContainer.getLayout();
        layout.previous(userProcessContainer);
        
    }//GEN-LAST:event_backJButtonActionPerformed

    private void saveInsBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_saveInsBtnActionPerformed
        // TODO add your handling code here:
            populate();       
            //double Balance = Double.valueOf(balanceTf.getText());
            //double actionMoney = Double.valueOf(actionTf.getText());
            //double discount = Double.valueOf(discountTf.getText());
            
            for(UserAccounterInfo c : request.getSender().getEmployee().getUserAccounterInfoDirectory().getUserAccounterInfoDirectory()){
                double a =  c.getTakerBalance()+Double.valueOf(request.getMoney());
                c.setTakerBalance(a);
            }
                
           // c.setDiscount(discount);
                 
            
            JOptionPane.showMessageDialog(null, "Operate Successfully!");
            request.setStatus("Completed");
            if(request.getSender().getRole().equals("Customer")){
            AccounterProcessCusRq processWorkRequestJPanel = new AccounterProcessCusRq(userProcessContainer, request);
            userProcessContainer.add("processWorkRequestJPanel", processWorkRequestJPanel);
            CardLayout layout = (CardLayout) userProcessContainer.getLayout();
            layout.next(userProcessContainer);
            populate();
            saveInsBtn.setEnabled(false);
            RejectButton.setEnabled(false);
            
            }
            else if(request.getSender().getRole().equals("Replacingdriver")){
            AccounterProcessRdrRq processWorkRequestJPanel = new AccounterProcessRdrRq(userProcessContainer, request);
            userProcessContainer.add("processWorkRequestJPanel", processWorkRequestJPanel);
            CardLayout layout = (CardLayout) userProcessContainer.getLayout();
            layout.next(userProcessContainer);
            populate();
            saveInsBtn.setEnabled(false);
            RejectButton.setEnabled(false);
            
            }
            

            

           // c.setActionMoney(Balance+Double.valueOf(request.getMessage()));
            
//            c.setTakerBalance(Balance+Double.valueOf(request.getMoney()));
//           // c.setDiscount(discount);
//                 
//            
//            JOptionPane.showMessageDialog(null, "Operate Successfully!");
//            System.out.println(e.getUserAccounterInfoDirectory().getUserAccounterInfoDirectory().size());

        

        
        
    }//GEN-LAST:event_saveInsBtnActionPerformed

    private void refreshBtnActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_refreshBtnActionPerformed
        // TODO add your handling code here:
              populate();
            //double Balance = Double.valueOf(balanceTf.getText());
            //double actionMoney = Double.valueOf(actionTf.getText());
            //double discount = Double.valueOf(discountTf.getText());
            
           

    }//GEN-LAST:event_refreshBtnActionPerformed


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel ActionLabel;
    private javax.swing.JButton RejectButton;
    private javax.swing.JLabel amountLabel;
    private javax.swing.JButton backJButton;
    private javax.swing.JLabel balanceLabel;
    private javax.swing.JLabel discountLabel;
    private javax.swing.JTextField eTf;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel12;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel20;
    private javax.swing.JLabel jLabel21;
    private javax.swing.JLabel jLabel22;
    private javax.swing.JLabel jLabel23;
    private javax.swing.JLabel jLabel28;
    private javax.swing.JLabel jLabel29;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel30;
    private javax.swing.JLabel jLabel31;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JTextField nTf;
    private javax.swing.JButton refreshBtn;
    private javax.swing.JTextField sTf;
    private javax.swing.JLabel sactionLabel;
    private javax.swing.JButton saveInsBtn;
    // End of variables declaration//GEN-END:variables
}