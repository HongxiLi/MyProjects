package group3.csye6200.order;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;

import group3.csye6200.order.ViewHolder.OrderDetailAdapter;
import group3.csye6200.order.model.Common;

/**
 * Created by hongxili on 4/3/18.
 */


public class ViewOrderDetails extends AppCompatActivity {

    public RecyclerView recyclerView;
    public RecyclerView.LayoutManager layoutManager;

    String orderId="";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_view_order_details);

        recyclerView=(RecyclerView)findViewById(R.id.listOrderDetails);
        recyclerView.setHasFixedSize(true);
        layoutManager=new LinearLayoutManager(this);
        recyclerView.setLayoutManager(layoutManager);
        orderId=getIntent().getStringExtra("orderId");

        if(getIntent()!=null)
        {
            orderId=getIntent().getStringExtra("orderId");
        }
        OrderDetailAdapter adapter=new OrderDetailAdapter(Common.currentRequest.getFoods());
        adapter.notifyDataSetChanged();
        recyclerView.setAdapter(adapter);

    }

    @Override
    public void onBackPressed() {
        //super.onBackPressed();
        Intent viewOrdersIntent=new Intent(ViewOrderDetails.this,OrderStatus.class);
        startActivity(viewOrdersIntent);
    }
}

