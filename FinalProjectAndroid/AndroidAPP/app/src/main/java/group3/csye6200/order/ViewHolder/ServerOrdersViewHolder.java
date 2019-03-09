package group3.csye6200.order.ViewHolder;

import android.support.v7.widget.RecyclerView;
import android.view.ContextMenu;
import android.view.View;
import android.widget.TextView;

import group3.csye6200.order.R;


public class ServerOrdersViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener,View.OnCreateContextMenuListener{

    public TextView txtOrderId,txtOrderStatus,txtOrderPhone,txtOrderAddress,txtFood,txtTax,txtGratuity,txtOrderPrice,txtOrderAvail;

    public ServerOrdersViewHolder(View itemView) {
        super(itemView);
        txtOrderAddress=(TextView)itemView.findViewById(R.id.order_address);
        txtOrderAvail=(TextView)itemView.findViewById(R.id.order_availability);
        txtOrderStatus=(TextView)itemView.findViewById(R.id.order_status);
        txtOrderId=(TextView)itemView.findViewById(R.id.order_id);
        txtOrderPhone=(TextView)itemView.findViewById(R.id.order_phone);
        txtOrderPrice=(TextView)itemView.findViewById(R.id.order_total_price);
        txtFood=(TextView)itemView.findViewById(R.id.order_food);
        txtTax=(TextView)itemView.findViewById(R.id.tax_amount);
        txtGratuity=(TextView)itemView.findViewById(R.id.gratuity_amount);
        itemView.setOnCreateContextMenuListener(this);
        itemView.setOnClickListener(this);
    }

    @Override
    public void onClick(View v) {

    }

    @Override
    public void onCreateContextMenu(ContextMenu menu, View v, ContextMenu.ContextMenuInfo menuInfo) {
        menu.setHeaderTitle("Select an option:");
        menu.add(0,1,getAdapterPosition(),"Update Status");
        menu.add(0,2,getAdapterPosition(),"Check Inventory");
    }
}
