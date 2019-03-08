package group3.csye6200.order.ViewHolder;

import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import java.util.List;

import group3.csye6200.order.R;
import group3.csye6200.order.model.Order;


class OrderDetailHolder extends RecyclerView.ViewHolder implements View.OnClickListener{

    public TextView txtFood,txtFoodQuantity,txtFoodPrice,txtDiscount;
    public OrderDetailHolder(View itemView) {
        super(itemView);
        txtFood=(TextView)itemView.findViewById(R.id.vorder_food);
        txtFoodQuantity=(TextView)itemView.findViewById(R.id.vorder_quantity);
        txtFoodPrice=(TextView)itemView.findViewById(R.id.vorder_price);
        txtDiscount=(TextView)itemView.findViewById(R.id.vorder_discount);

        itemView.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {

    }
}

public class OrderDetailAdapter extends RecyclerView.Adapter<OrderDetailHolder>{

    List<Order> myOrders;

    public OrderDetailAdapter(List<Order> myOrders) {
        this.myOrders = myOrders;
    }

    @Override
    public OrderDetailHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View itemView= LayoutInflater.from(parent.getContext()).inflate(R.layout.vieworder_layout,parent,false);
        return new OrderDetailHolder(itemView);
    }

    @Override
    public void onBindViewHolder(OrderDetailHolder holder, int position) {
        Order order=myOrders.get(position);
        holder.txtFood.setText(String.format("Name: %s",order.getProductName()));
        holder.txtFoodQuantity.setText(String.format("Quantity: %s",order.getQuantity()));
        holder.txtFoodPrice.setText(String.format("Price: %s",Double.parseDouble(order.getPrice())*Double.parseDouble(order.getQuantity())));
        holder.txtDiscount.setText(String.format("Discount: %s",order.getDiscount()));
    }

    @Override
    public int getItemCount() {
        return myOrders.size();
    }
}
