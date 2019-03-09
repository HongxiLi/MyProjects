package group3.csye6200.order;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.Toast;

import com.firebase.ui.database.FirebaseRecyclerAdapter;
import com.firebase.ui.database.FirebaseRecyclerOptions;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;

import group3.csye6200.order.Interface.ItemClickListener;
import group3.csye6200.order.ViewHolder.OrderViewHolder;
import group3.csye6200.order.model.Common;
import group3.csye6200.order.model.Request;

/**
 * Created by hongxili on 4/3/18.
 */


public class OrderStatus extends AppCompatActivity {

    public RecyclerView recyclerView;
    public RecyclerView.LayoutManager layoutManager;

    FirebaseRecyclerAdapter<Request,OrderViewHolder> adapter;

    FirebaseDatabase database;
    DatabaseReference requests;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_order_status);

        database= FirebaseDatabase.getInstance();
        requests=database.getReference("Requests");

        recyclerView=(RecyclerView)findViewById(R.id.listOrders);
        recyclerView.setHasFixedSize(true);
        layoutManager=new LinearLayoutManager(this);
        recyclerView.setLayoutManager(layoutManager);

            loadOrders(Common.currentUser.getPhone());
    }

    private void loadOrders(String phone) {
        Query searchByPhone=requests.orderByChild("phone").equalTo(phone);
        FirebaseRecyclerOptions<Request> options=new FirebaseRecyclerOptions.Builder<Request>().setQuery(searchByPhone,Request.class).build();
        adapter=new FirebaseRecyclerAdapter<Request, OrderViewHolder>(options) {
            @Override
            protected void onBindViewHolder(@NonNull OrderViewHolder holder, int position, @NonNull final Request model) {
                holder.txtOrderId.setText(adapter.getRef(position).getKey());
                holder.txtOrderStatus.setText(convertCodetoStatus(model.getStatus()));
                holder.txtOrderAddress.setText(model.getAddress());
                holder.txtOrderPhone.setText(model.getPhone());
                holder.txtOrderPrice.setText(model.getTotal());
                holder.setItemClickListener(new ItemClickListener() {
                    @Override
                    public void onClick(View view, int position, boolean isLongClick) {
                            Common.currentRequest=model;
                            Intent orderViewDetail=new Intent(OrderStatus.this,ViewOrderDetails.class).putExtra("orderId",adapter.getRef(position).getKey());
                            startActivity(orderViewDetail);
                    }
                });
            }

            @Override
            public OrderViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
                View itemView= LayoutInflater.from(parent.getContext()).inflate(R.layout.order_layout,parent,false);
                return new OrderViewHolder(itemView);
            }
        };
        adapter.startListening();
        adapter.notifyDataSetChanged();
        recyclerView.setAdapter(adapter);
    }

    private String convertCodetoStatus(String status) {
        if(status.equals("0"))
            return "Placed";
        else if(status.equals("1"))
            return "Preparing";
        else if(status.equals("2"))
            return "Cancelled";
        else if(status.equals("3"))
            return "Ready to pickup";
        else if(status.equals("4"))
            return "Partial Availability";
        else if(status.equals("5"))
            return "Placed Partial Order";
        else
            return "Shipped";
    }

    @Override
    protected void onStop() {
        super.onStop();
        adapter.stopListening();
    }

    @Override
    public void onBackPressed() {
        //super.onBackPressed();
        Intent viewHomeIntent=new Intent(OrderStatus.this,Home.class);
        startActivity(viewHomeIntent);
    }

    @Override
    public boolean onContextItemSelected(MenuItem item) {
        if(item.getTitle().equals(Common.VIEWORDERDETAIL))
        {
            //ViewDetail(adapter.getRef(item.getOrder()).getKey());
        }
        if(item.getTitle().equals(Common.CANCEL))
        {
            Request req=adapter.getItem(item.getOrder());
            if(req.getStatus().equals("2"))
            {
                Toast.makeText(OrderStatus.this,"Order already cancelled",Toast.LENGTH_SHORT).show();
                //finish();
            }
            else if(req.getStatus().equals("3"))
            {
                Toast.makeText(OrderStatus.this,"Sorry, cannot be cancelled, Order is ready!",Toast.LENGTH_SHORT).show();
                //finish();
            }
            else {
                CancelOrder(item.getOrder());
            }
        }
        if(item.getTitle().equals(Common.EMAIL))
        {
            Intent receiptViewDetail=new Intent(OrderStatus.this,ViewReceipt.class).putExtra("receiptId",adapter.getRef(item.getOrder()).getKey());
            startActivity(receiptViewDetail);
        }
        if(item.getTitle().equals(Common.ACCEPT))
        {
            Request req1=adapter.getItem(item.getOrder());
            if(req1.getStatus().equals("4"))
            {
                acceptPartial(item.getOrder());
            }
            else if(req1.getStatus().equals("2"))
            {
                Toast.makeText(OrderStatus.this,"Order already cancelled",Toast.LENGTH_SHORT).show();
                //finish();
            }
            else
            {
                Toast.makeText(OrderStatus.this,"This is a complete order, can't accept partial",Toast.LENGTH_SHORT).show();
            }

        }
        return true;
    }

    private void acceptPartial(final int accept_order) {
        AlertDialog.Builder alertDialog2 = new AlertDialog.Builder(OrderStatus.this);
        alertDialog2.setTitle("Do you accept partial order?");

        alertDialog2.setIcon(R.drawable.ic_adjust_black_24dp);

        alertDialog2.setPositiveButton("YES", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                requests.child(adapter.getRef(accept_order).getKey()).child("status").setValue("5");
                Toast.makeText(OrderStatus.this, "Order has been cancelled", Toast.LENGTH_SHORT).show();
                //finish();
            }
        });

        alertDialog2.setNegativeButton("NO", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                dialog.dismiss();
            }
        });

        alertDialog2.show();
    }

    private void CancelOrder(final int key) {
            AlertDialog.Builder alertDialog1 = new AlertDialog.Builder(OrderStatus.this);
            alertDialog1.setTitle("Are you sure?");
            alertDialog1.setMessage("Reason: ");

            final EditText edtReason = new EditText(OrderStatus.this);
            LinearLayout.LayoutParams lp1 = new LinearLayout.LayoutParams(
                    LinearLayout.LayoutParams.MATCH_PARENT,
                    LinearLayout.LayoutParams.MATCH_PARENT
            );

            edtReason.setLayoutParams(lp1);
            alertDialog1.setView(edtReason);
            alertDialog1.setIcon(R.drawable.ic_adjust_black_24dp);

            alertDialog1.setPositiveButton("YES", new DialogInterface.OnClickListener() {
                @Override
                public void onClick(DialogInterface dialog, int which) {
                    requests.child(adapter.getRef(key).getKey()).child("status").setValue("2");
                    requests.child(adapter.getRef(key).getKey()).child("total").setValue("$0");
                    Toast.makeText(OrderStatus.this, "Order has been cancelled", Toast.LENGTH_SHORT).show();
                    //finish();
                }
            });

            alertDialog1.setNegativeButton("NO", new DialogInterface.OnClickListener() {
                @Override
                public void onClick(DialogInterface dialog, int which) {
                    dialog.dismiss();
                }
            });

            alertDialog1.show();
    }

}
