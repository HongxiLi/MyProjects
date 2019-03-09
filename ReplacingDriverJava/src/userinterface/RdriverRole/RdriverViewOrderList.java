/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package userinterface.RdriverRole;

import userinterface.CheckerRole.*;
import Business.EcoSystem;
import Business.Employee.User.UserInfo;
import Business.Employee.UserCarOwner.CarOwnerInfo;
import Business.Organization.CheckerOrganization;
import Business.Organization.CustomerOrganization;
import Business.Organization.Organization;
import Business.Organization.ReplacingDriverOrganization;
import Business.UserAccount.UserAccount;
import Business.WorkQueue.LabTestWorkRequest;
import Business.WorkQueue.WorkRequest;
import java.awt.CardLayout;
import java.awt.Component;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.table.DefaultTableModel;
import userinterface.CheckerRole.CheckerProcessCusRq;

/**
 *
 * @author raunak
 */
public class RdriverViewOrderList extends javax.swing.JPanel {

    private JPanel userProcessContainer;
    private EcoSystem business;
    private UserAccount userAccount;
    private ReplacingDriverOrganization labOrganization;
    
    /**
     * Creates new form LabAssistantWorkAreaJPanel
     */
    public RdriverViewOrderList(JPanel userProcessContainer, UserAccount account, Organization organization, EcoSystem business) {
        initComponents();
        
        this.userProcessContainer = userProcessContainer;
        this.userAccount = account;
        this.business = business;
        this.labOrganization = (ReplacingDriverOrganization)organization;
        
        populateTable1();
        populateTable2();
    }
    
    public void populateTable1(){
        DefaultTableModel model = (DefaultTableModel)workRequestJTable1.getModel();
        
        model.setRowCount(0);
        
        for(WorkRequest request : labOrganization.getWorkQueue().getWorkRequestList()){
           System.out.println(request.getStatus());
        
           if(request.getStatus().equals("Pending")){
            Object[] row = new Object[7];
            
            row[0] = request.getSender().getEmployee().getName();
            row[1] = userAccount.getEmployee().getName();
            row[2] = request.getFrom();
            row[3] = request.getTo();
            row[4] = request.getFrom_time();  
            
            row[5] = request;
            
            row[6] = request.getNumber();
            
            model.addRow(row);
            jTextField1.setText(String.valueOf(model.getRowCount()));
           } 
          
        }
    }
    public void populateTable2(){
        DefaultTableModel model = (DefaultTableModel)workRequestJTable.getModel();
        
        model.setRowCount(0);
        
        for(WorkRequest request : labOrganization.getWorkQueue().getWorkRequestList()){
           System.out.println(request.getStatus());
        
           if(request.getStatus().equals("Completed")){
            Object[] row = new Object[7];
            
            row[0] = request.getSender().getEmployee().getName();
            row[1] = userAccount.getEmployee().getName();
            row[2] = request.getFrom();
            row[3] = request.getTo();
            row[4] = request.getFrom_time();  
            
            row[5] = request;
            
            row[6] = request.getNumber();
            
            model.addRow(row);
            jTextField2.setText(String.valueOf(model.getRowCount()));
           } 
          
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

        jScrollPane1 = new javax.swing.JScrollPane();
        workRequestJTable = new javax.swing.JTable();
        refreshJButton = new javax.swing.JButton();
        backJButton = new javax.swing.JButton();
        ViewButton1 = new javax.swing.JButton();
        jScrollPane2 = new javax.swing.JScrollPane();
        workRequestJTable1 = new javax.swing.JTable();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        ViewButton2 = new javax.swing.JButton();
        jLabel3 = new javax.swing.JLabel();
        jTextField1 = new javax.swing.JTextField();
        jLabel4 = new javax.swing.JLabel();
        jTextField2 = new javax.swing.JTextField();
        jLabel14 = new javax.swing.JLabel();

        setBackground(new java.awt.Color(65, 192, 110));
        setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        workRequestJTable.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null}
            },
            new String [] {
                "Customer", "Driver", "From", "To", "Start Time", "End Time ", "Number of people"
            }
        ) {
            Class[] types = new Class [] {
                java.lang.String.class, java.lang.String.class, java.lang.String.class, java.lang.String.class, java.lang.String.class, java.lang.String.class, java.lang.String.class
            };

            public Class getColumnClass(int columnIndex) {
                return types [columnIndex];
            }
        });
        jScrollPane1.setViewportView(workRequestJTable);
        if (workRequestJTable.getColumnModel().getColumnCount() > 0) {
            workRequestJTable.getColumnModel().getColumn(1).setResizable(false);
        }

        add(jScrollPane1, new org.netbeans.lib.awtextra.AbsoluteConstraints(80, 270, 430, 96));

        refreshJButton.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        refreshJButton.setText("Refresh");
        refreshJButton.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                refreshJButtonActionPerformed(evt);
            }
        });
        add(refreshJButton, new org.netbeans.lib.awtextra.AbsoluteConstraints(410, 10, 100, 40));

        backJButton.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        backJButton.setText("Back");
        backJButton.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                backJButtonActionPerformed(evt);
            }
        });
        add(backJButton, new org.netbeans.lib.awtextra.AbsoluteConstraints(50, 0, 90, 40));

        ViewButton1.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        ViewButton1.setText("View Order");
        ViewButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                ViewButton1ActionPerformed(evt);
            }
        });
        add(ViewButton1, new org.netbeans.lib.awtextra.AbsoluteConstraints(380, 180, 130, 40));

        workRequestJTable1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null},
                {null, null, null, null, null, null, null}
            },
            new String [] {
                "Customer", "Driver", "From", "To", "Start Time", "End Time ", "Number of people"
            }
        ) {
            Class[] types = new Class [] {
                java.lang.String.class, java.lang.String.class, java.lang.String.class, java.lang.String.class, java.lang.String.class, java.lang.String.class, java.lang.String.class
            };

            public Class getColumnClass(int columnIndex) {
                return types [columnIndex];
            }
        });
        jScrollPane2.setViewportView(workRequestJTable1);
        if (workRequestJTable1.getColumnModel().getColumnCount() > 0) {
            workRequestJTable1.getColumnModel().getColumn(1).setResizable(false);
        }

        add(jScrollPane2, new org.netbeans.lib.awtextra.AbsoluteConstraints(80, 80, 430, 96));

        jLabel1.setText("Completed Order ");
        add(jLabel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(90, 220, -1, -1));

        jLabel2.setText("Processing Order");
        add(jLabel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(80, 50, -1, -1));

        ViewButton2.setFont(new java.awt.Font("Lucida Grande", 0, 18)); // NOI18N
        ViewButton2.setText("View Order");
        ViewButton2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                ViewButton2ActionPerformed(evt);
            }
        });
        add(ViewButton2, new org.netbeans.lib.awtextra.AbsoluteConstraints(380, 380, 130, 50));

        jLabel3.setText("Total Number:");
        add(jLabel3, new org.netbeans.lib.awtextra.AbsoluteConstraints(320, 50, -1, 20));

        jTextField1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jTextField1ActionPerformed(evt);
            }
        });
        add(jTextField1, new org.netbeans.lib.awtextra.AbsoluteConstraints(420, 50, 90, -1));

        jLabel4.setText("Total Number:");
        add(jLabel4, new org.netbeans.lib.awtextra.AbsoluteConstraints(320, 220, -1, 20));
        add(jTextField2, new org.netbeans.lib.awtextra.AbsoluteConstraints(420, 240, 90, -1));

        jLabel14.setBackground(new java.awt.Color(51, 51, 255));
        jLabel14.setForeground(new java.awt.Color(255, 255, 255));
        jLabel14.setIcon(new javax.swing.ImageIcon(getClass().getResource("/userinterface/AccounterRole/7.png"))); // NOI18N
        add(jLabel14, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, -1, -1));
    }// </editor-fold>//GEN-END:initComponents

    private void refreshJButtonActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_refreshJButtonActionPerformed
        populateTable1();
        populateTable2();
    }//GEN-LAST:event_refreshJButtonActionPerformed

    private void backJButtonActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_backJButtonActionPerformed

//        userProcessContainer.remove(this);
//        Component[] componentArray = userProcessContainer.getComponents();
//        Component component = componentArray[componentArray.length - 1];
//        MessageWorkAreaJPanel dwjp = (MessageWorkAreaJPanel) component;
//        dwjp.populateTable();
//        CardLayout layout = (CardLayout) userProcessContainer.getLayout();
//        layout.previous(userProcessContainer);
        userProcessContainer.remove(this);
        CardLayout layout = (CardLayout) userProcessContainer.getLayout();
        layout.previous(userProcessContainer);
    }//GEN-LAST:event_backJButtonActionPerformed

    private void ViewButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_ViewButton1ActionPerformed
        // TODO add your handling code here:
        int selectedRow = workRequestJTable1.getSelectedRow();
        
        if (selectedRow < 0){
            return;
        }
        
        LabTestWorkRequest request = (LabTestWorkRequest)workRequestJTable1.getValueAt(selectedRow, 5);
        RdriverViewOrderDetail processWorkRequestJPanel = new RdriverViewOrderDetail(userProcessContainer,userAccount,request);
        userProcessContainer.add("processWorkRequestJPanel", processWorkRequestJPanel);
        CardLayout layout = (CardLayout) userProcessContainer.getLayout();
        layout.next(userProcessContainer);
    }//GEN-LAST:event_ViewButton1ActionPerformed

    private void ViewButton2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_ViewButton2ActionPerformed
        // TODO add your handling code here:
        int selectedRow = workRequestJTable.getSelectedRow();
        
        if (selectedRow < 0){
            return;
        }
        
        LabTestWorkRequest request = (LabTestWorkRequest)workRequestJTable.getValueAt(selectedRow, 5);
        RdriverViewOrderDetail processWorkRequestJPanel = new RdriverViewOrderDetail(userProcessContainer,userAccount,request);
        userProcessContainer.add("processWorkRequestJPanel", processWorkRequestJPanel);
        CardLayout layout = (CardLayout) userProcessContainer.getLayout();
        layout.next(userProcessContainer);
    }//GEN-LAST:event_ViewButton2ActionPerformed

    private void jTextField1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jTextField1ActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jTextField1ActionPerformed

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton ViewButton1;
    private javax.swing.JButton ViewButton2;
    private javax.swing.JButton backJButton;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel14;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JTextField jTextField1;
    private javax.swing.JTextField jTextField2;
    private javax.swing.JButton refreshJButton;
    private javax.swing.JTable workRequestJTable;
    private javax.swing.JTable workRequestJTable1;
    // End of variables declaration//GEN-END:variables
}