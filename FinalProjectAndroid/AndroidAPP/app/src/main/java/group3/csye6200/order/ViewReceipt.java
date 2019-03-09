package group3.csye6200.order;

import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.firebase.ui.database.FirebaseRecyclerAdapter;
import com.firebase.ui.database.FirebaseRecyclerOptions;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.Query;

import java.util.List;

import group3.csye6200.order.ViewHolder.ReceiptViewHolder;
import group3.csye6200.order.model.Order;
import group3.csye6200.order.model.Request;

/**
 * Created by hongxili on 4/3/18.
 */


public class ViewReceipt extends AppCompatActivity {

    public RecyclerView recyclerView;
    public RecyclerView.LayoutManager layoutManager;
    Double Tax=0.0,Gratuity=0.0,Total=0.0,Quantity=0.0,Price=0.0;
    String sb="";
    FirebaseRecyclerAdapter<Request,ReceiptViewHolder> adapter;
    FirebaseDatabase database;
    DatabaseReference requests;
    List<Order> myOrders;
    String requestId="";
    TextView receipt_title;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_view_receipt);
        database= FirebaseDatabase.getInstance();
        requests=database.getReference("Requests");
        receipt_title=(TextView)findViewById(R.id.receipt_title);
        receipt_title.setText("RESTAURANT RECEIPT");
        recyclerView=(RecyclerView)findViewById(R.id.viewReceiptDetails);
        recyclerView.setHasFixedSize(true);
        layoutManager=new LinearLayoutManager(this);
        recyclerView.setLayoutManager(layoutManager);

        if(getIntent()!=null)
        {
            requestId=getIntent().getStringExtra("receiptId");
            loadReceipt(requestId);
        }

    }

    private void loadReceipt(String requestId) {
        Query searchByRequest=requests.orderByKey().equalTo(requestId);
        FirebaseRecyclerOptions<Request> options=new FirebaseRecyclerOptions.Builder<Request>().setQuery(searchByRequest,Request.class).build();
        adapter=new FirebaseRecyclerAdapter<Request, ReceiptViewHolder>(options) {
            @Override
            protected void onBindViewHolder(@NonNull ReceiptViewHolder holder, int position, @NonNull final Request model) {
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
                holder.txtOrderAddress.setText("Address:    "+model.getAddress()+"\n");
                holder.txtOrderPhone.setText("Phone:    "+model.getPhone());
                holder.txtOrderPrice.setText("Total Price:  "+model.getTotal());
                holder.txtFood.setText(sb);
                holder.txtTax.setText("Tax: "+Double.toString(Tax));
                holder.txtGratuity.setText("Gratuity:   "+Double.toString(Gratuity));
            }

            @Override
            public ReceiptViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
                View itemView= LayoutInflater.from(parent.getContext()).inflate(R.layout.receipt_layout,parent,false);
                return new ReceiptViewHolder(itemView);
            }
        };
        adapter.startListening();
        adapter.notifyDataSetChanged();
        recyclerView.setAdapter(adapter);
    }

    @Override
    public void onBackPressed() {
        //super.onBackPressed();
        Intent viewOrderIntent=new Intent(ViewReceipt.this,OrderStatus.class);
        startActivity(viewOrderIntent);
    }
}
