package group3.csye6200.order.Database;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteQueryBuilder;

import com.readystatesoftware.sqliteasset.SQLiteAssetHelper;

import java.util.ArrayList;
import java.util.List;

import group3.csye6200.order.model.Order;

/**
 * Created by hongxili on 4/9/18.
 */


public class Database extends SQLiteAssetHelper{

    private static final String DB_NAME="Order.db";
    private static final int DB_VER=1;
    SQLiteDatabase db;


    public Database(Context context) {
        super(context, DB_NAME, null, DB_VER);
//        super(context)

    }




    public List<Order> getCarts()
    {
        String sqlTable="OrderDetail";
        db=getReadableDatabase();
        SQLiteQueryBuilder qb=new SQLiteQueryBuilder();

        String sqlSelect[]={"ProductName","ProductId","Quantity","Price","Discount"};


        qb.setTables(sqlTable);

        Cursor c=qb.query(db,sqlSelect,null,null,null,null,null);

        final List<Order> result=new ArrayList<>();

        if(c.moveToFirst())
        {
            do{
                result.add(new Order(c.getString(c.getColumnIndex("ProductId")),
                        c.getString(c.getColumnIndex("ProductName")),
                        c.getString(c.getColumnIndex("Quantity")),
                        c.getString(c.getColumnIndex("Price")),
                        c.getString(c.getColumnIndex("Discount"))));
            }while(c.moveToNext());
        }
        return result;
    }

    public void addToCart(Order order)
    {
        db=getWritableDatabase();
        String query= String.format("INSERT INTO OrderDetail(ProductId,ProductName,Quantity,Price,Discount) VALUES('%s','%s','%s','%s','%s');",
                order.getProductId(),
                order.getProductName(),
                order.getQuantity(),
                order.getPrice(),
                order.getDiscount());
        db.execSQL(query);
        CloseDB();
    }

    public void cleanCart()
    {
        db=getReadableDatabase();
        String query= String.format("DELETE FROM OrderDetail");
        db.execSQL(query);
        CloseDB();
    }

    public void CloseDB()
    {
        db.close();
    }

}
