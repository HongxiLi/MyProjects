package group3.csye6200.order;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import group3.csye6200.order.model.*;


/**
 * Created by hongxili on 4/3/18.
 */


public class SignInActivity extends AppCompatActivity {
    private Button btnLogin;
    private Button btnRegister;
    private EditText editPhone;
    private EditText editPassword;
    private TextView textView;
    private FirebaseDatabase database;


    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.signin);

        btnLogin = (Button) findViewById(R.id.btnLogin);
        btnRegister = (Button) findViewById(R.id.btnRegister);
        editPhone = (EditText) findViewById(R.id.editPhone);
        editPassword = (EditText) findViewById(R.id.editPassword);
        textView = (TextView) findViewById(R.id.textView);

        database = FirebaseDatabase.getInstance();
        final DatabaseReference table_user = database.getReference("User");

        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                final ProgressDialog mDialog = new ProgressDialog(SignInActivity.this);
                mDialog.setMessage("Please waiting...");
                mDialog.show();

                table_user.addValueEventListener(new ValueEventListener() {
                    @Override
                    public void onDataChange(DataSnapshot dataSnapshot) {
                        // check if user does not in database
                        if (dataSnapshot.child(editPhone.getText().toString()).exists()) {
                            mDialog.dismiss();if(editPhone.getText().toString().equals("111") && editPassword.getText().toString().equals("aaa"))
                            {
                                Intent serverOrderIntent=new Intent(SignInActivity.this,OrderStatusServer.class);
                                startActivity(serverOrderIntent);
                            }else{
                                User user = dataSnapshot.child(editPhone.getText().toString()).getValue(User.class);
                                user.setPhone(editPhone.getText().toString());
                                if (user.getPassword().equals(editPassword.getText().toString())) {
                                    Intent homeIntent=new Intent(SignInActivity.this,Home.class);
                                    Common.currentUser=user;
                                    startActivity(homeIntent);
                                    finish();
                                } else {
                                    Toast.makeText(SignInActivity.this, "Wrong password!", Toast.LENGTH_SHORT).show();
                                }}
                        } else {
                            mDialog.dismiss();
                            Toast.makeText(SignInActivity.this, "User not exist in Databse", Toast.LENGTH_SHORT).show();
                        }
                    }

                    @Override
                    public void onCancelled(DatabaseError databaseError) {

                    }

                });
            }
        });


    }
}
