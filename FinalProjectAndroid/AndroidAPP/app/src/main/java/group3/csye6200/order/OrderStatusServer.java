package group3.csye6200.order;

import android.content.DialogInterface;
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
import android.widget.TextView;

import com.firebase.ui.database.FirebaseRecyclerAdapter;
import com.firebase.ui.database.FirebaseRecyclerOptions;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;
import com.jaredrummler.materialspinner.MaterialSpinner;

import java.util.List;

import group3.csye6200.order.ViewHolder.*;
import group3.csye6200.order.model.*;

/**
 * Created by hongxili on 4/3/18.
 */


public class OrderStatusServer extends AppCompatActivity {

    public RecyclerView recyclerView;
    public RecyclerView.LayoutManager layoutManager;
    Double Tax=0.0,Gratuity=0.0,Total=0.0,Quantity=0.0,Price=0.0;
    String sb="";
    FirebaseRecyclerAdapter<Request,ServerOrdersViewHolder> adapter;
    FirebaseDatabase database;
    DatabaseReference requests;
    List<Order> myOrders;
    TextView orders_title;
    MaterialSpinner spinner;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_order_status_server);
        database= FirebaseDatabase.getInstance();
        requests=database.getReference("Requests");
        orders_title=(TextView)findViewById(R.id.order_title);
        orders_title.setText("ALL ORDERS");
        recyclerView=(RecyclerView)findViewById(R.id.viewServerOrderDetails);
        recyclerView.setHasFixedSize(true);
        layoutManager=new LinearLayoutManager(this);
        recyclerView.setLayoutManager(layoutManager);

        loadAllOrders();

    }

    private void loadAllOrders() {
        Query searchByRequest=requests.orderByKey();
        FirebaseRecyclerOptions<Request> options=new FirebaseRecyclerOptions.Builder<Request>().setQuery(searchByRequest,Request.class).build();
        adapter=new FirebaseRecyclerAdapter<Request, ServerOrdersViewHolder>(options) {
            @Override
            protected void onBindViewHolder(@NonNull ServerOrdersViewHolder holder, int position, @NonNull final Request model) {
                myOrders=model.getFoods();
                sb="Item Name"+"  "+"Quantity"+"  "+"Price"+"\n";
                for(Order o:myOrders)
                {
                    Quantity=Double.parseDouble(o.getQuantity());
                    Price=Double.parseDouble(o.getPrice());
                    Total=Total+Double.parseDouble(o.getQuantity())*Double.parseDouble(o.getPrice());
                    sb=sb+o.getProductName()+"           "+o.getQuantity()+"          "+Double.toString(Quantity*Price)+"\n";
                }
                Tax=0.05*Total;
                Gratuity=0.25*Total;
                holder.txtOrderId.setText("Order ID:    "+adapter.getRef(position).getKey());
                holder.txtOrderStatus.setText("Current Status: "+ Common.convertCodeToStatus(model.getStatus()));
                holder.txtOrderAddress.setText("Address:    "+model.getAddress()+"\n");
                holder.txtOrderPhone.setText("Phone:    "+model.getPhone());
                holder.txtOrderPrice.setText("Total Price:  "+model.getTotal());
                holder.txtFood.setText(sb);
                holder.txtTax.setText("Tax: "+Double.toString(Tax));
                holder.txtGratuity.setText("Gratuity:   "+Double.toString(Gratuity));
                holder.txtOrderAvail.setText(convertCode(model.getAvailable()));
            }

            @Override
            public ServerOrdersViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
                View itemView= LayoutInflater.from(parent.getContext()).inflate(R.layout.server_orders,parent,false);
                return new ServerOrdersViewHolder(itemView);
            }
        };
        adapter.startListening();
        adapter.notifyDataSetChanged();
        recyclerView.setAdapter(adapter);
    }

    public String convertCode(String code)
    {
        if(code.equals("0"))
        {
            return "unavailable";
        }
        else
        {
            return "available";
        }
    }
    @Override
    protected void onStop() {
        super.onStop();
        adapter.stopListening();
    }

    @Override
    public boolean onContextItemSelected(MenuItem item) {
        if(item.getTitle().equals("Update Status"))
        {
            showUpdateDialog(adapter.getRef(item.getOrder()).getKey(),adapter.getItem(item.getOrder()));
        }
        return super.onContextItemSelected(item);
    }

    private void showUpdateDialog(String key, final Request item) {
        final AlertDialog.Builder alertDialog=new AlertDialog.Builder(OrderStatusServer.this);
        alertDialog.setTitle("Update Order");
        alertDialog.setMessage("Please choose status");

        LayoutInflater inflater=this.getLayoutInflater();

        final View view=inflater.inflate(R.layout.update_order_layout,null);

        spinner=(MaterialSpinner)view.findViewById(R.id.statusSpinner);
        spinner.setItems("Placed","Preparing","Cancel","Ready to pickup","Partial Availability","Preparing Partial Order");

        alertDialog.setView(view);

        final String localKey=key;

        alertDialog.setPositiveButton("YES", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                dialog.dismiss();
                item.setStatus(String.valueOf(spinner.getSelectedIndex()));
                requests.child(localKey).setValue(item);
            }
        });
        alertDialog.setNegativeButton("NO", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                dialog.dismiss();
            }
        });
        alertDialog.show();
    }


}
